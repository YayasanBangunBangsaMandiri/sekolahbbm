<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\LetterSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ApplicantDashboardController extends Controller
{
    /**
     * Show the applicant login form.
     */
    public function login()
    {
        return view('applicant.login');
    }
    
    /**
     * Authenticate the applicant.
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nisn' => 'required|string',
            'email' => 'required|email',
        ]);
        
        // Find the registration with matching credentials
        $registration = Registration::where('nisn', $credentials['nisn'])
                                  ->where('email', $credentials['email'])
                                  ->first();
        
        if (!$registration) {
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'The provided credentials do not match our records.');
        }
        
        // Store the registration ID in the session
        session(['applicant_id' => $registration->id]);
        
        return redirect()->route('applicant.dashboard');
    }
    
    /**
     * Display the applicant dashboard.
     */
    public function dashboard()
    {
        // Check if applicant is logged in
        if (!session('applicant_id')) {
            return redirect()->route('applicant.login');
        }
        
        // Get the registration details
        $registration = Registration::with('major')->find(session('applicant_id'));
        
        if (!$registration) {
            // Clear the invalid session and redirect to login
            session()->forget('applicant_id');
            return redirect()->route('applicant.login')
                            ->with('error', 'Registration not found. Please login again.');
        }
        
        return view('applicant.dashboard', compact('registration'));
    }
    
    /**
     * Logout the applicant.
     */
    public function logout()
    {
        // Clear the applicant session
        session()->forget('applicant_id');
        
        return redirect()->route('applicant.login')
                        ->with('success', 'You have been successfully logged out.');
    }
    
    /**
     * Update applicant profile information.
     */
    public function updateProfile(Request $request)
    {
        // Check if applicant is logged in
        if (!session('applicant_id')) {
            return redirect()->route('applicant.login');
        }
        
        $registration = Registration::find(session('applicant_id'));
        
        if (!$registration) {
            session()->forget('applicant_id');
            return redirect()->route('applicant.login');
        }
        
        // Validate request
        $validated = $request->validate([
            'phone' => 'required|string|max:20',
            'parent_phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);
        
        // Update the registration
        $registration->update($validated);
        
        return redirect()->route('applicant.dashboard')
                        ->with('success', 'Your profile has been successfully updated.');
    }

    /**
     * Download the acceptance letter for accepted applicants.
     */
    public function downloadAcceptanceLetter()
    {
        // Check if applicant is logged in
        if (!session('applicant_id')) {
            return redirect()->route('applicant.login');
        }
        
        $registration = Registration::with('major')->find(session('applicant_id'));
        
        if (!$registration || $registration->status !== 'accepted') {
            return redirect()->route('applicant.dashboard')
                           ->with('error', 'Surat penerimaan tidak tersedia.');
        }

        // Get letter settings
        $setting = LetterSetting::first();
        if (!$setting) {
            return redirect()->route('applicant.dashboard')
                           ->with('error', 'Pengaturan surat belum dikonfigurasi.');
        }

        try {
            // Generate PDF using view
            $pdf = Pdf::loadView('pdf.acceptance-letter', [
                'registration' => $registration,
                'setting' => $setting,
                'registrationNumber' => 'REG-' . str_pad($registration->id, 5, '0', STR_PAD_LEFT),
                'date' => now()->isoFormat('D MMMM Y')
            ]);

            // Set paper size and orientation
            $pdf->setPaper($setting->paper_size ?? 'A4', $setting->paper_orientation ?? 'portrait');

            // Return the PDF for download
            return $pdf->download('surat-penerimaan-' . $registration->student_name . '.pdf');
        } catch (\Exception $e) {
            return redirect()->route('applicant.dashboard')
                           ->with('error', 'Terjadi kesalahan saat mengunduh surat penerimaan. Silakan coba lagi.');
        }
    }
}
