<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
