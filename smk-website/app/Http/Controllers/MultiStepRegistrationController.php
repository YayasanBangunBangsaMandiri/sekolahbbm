<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class MultiStepRegistrationController extends Controller
{
    /**
     * Show the first step of registration form.
     */
    public function createStep1()
    {
        // Check if old input exists in session
        $registration = Session::get('registration') ?? [];
        
        return view('registration.step1', compact('registration'));
    }
    
    /**
     * Store the first step data in session.
     */
    public function storeStep1(Request $request)
    {
        // Validate input for step 1
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required|in:male,female',
            'nisn' => 'required|string|max:20',
        ]);
        
        // Check if NISN already exists
        $existingRegistration = Registration::where('nisn', $validated['nisn'])->first();
        if ($existingRegistration) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['nisn' => 'This NISN is already registered.']);
        }
        
        // Store the validated input in session
        $registration = Session::get('registration') ?? [];
        $registration = array_merge($registration, $validated);
        Session::put('registration', $registration);
        
        return redirect()->route('registration.step2');
    }
    
    /**
     * Show the second step of registration form.
     */
    public function createStep2()
    {
        // Check if step 1 is completed
        $registration = Session::get('registration') ?? [];
        
        if (empty($registration) || !isset($registration['student_name'])) {
            return redirect()->route('registration.step1');
        }
        
        return view('registration.step2', compact('registration'));
    }
    
    /**
     * Store the second step data in session.
     */
    public function storeStep2(Request $request)
    {
        // Validate input for step 2
        $validated = $request->validate([
            'address' => 'required|string',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'parent_name' => 'required|string|max:255',
            'parent_phone' => 'required|string|max:20',
        ]);
        
        // Store the validated input in session
        $registration = Session::get('registration') ?? [];
        $registration = array_merge($registration, $validated);
        Session::put('registration', $registration);
        
        return redirect()->route('registration.step3');
    }
    
    /**
     * Show the third step of registration form.
     */
    public function createStep3()
    {
        // Check if step 2 is completed
        $registration = Session::get('registration') ?? [];
        
        if (empty($registration) || !isset($registration['email'])) {
            return redirect()->route('registration.step2');
        }
        
        // Get all majors for the dropdown
        $majors = Major::all();
        
        return view('registration.step3', compact('registration', 'majors'));
    }
    
    /**
     * Store the third step data in session and complete the registration.
     */
    public function storeStep3(Request $request)
    {
        // Validate input for step 3
        $validated = $request->validate([
            'previous_school' => 'required|string|max:255',
            'major_id' => 'required|exists:majors,id',
            'agreement' => 'required',
        ]);
        
        // Remove agreement field from data to be stored
        unset($validated['agreement']);
        
        // Store the validated input in session
        $registration = Session::get('registration') ?? [];
        $registration = array_merge($registration, $validated);
        
        // Add default status
        $registration['status'] = 'pending';
        
        // Save the registration to database
        DB::beginTransaction();
        try {
            Registration::create($registration);
            DB::commit();
            
            // Store registration data in session for the confirmation page
            Session::put('completed_registration', $registration);
            
            // Clear the session registration data
            Session::forget('registration');
            
            return redirect()->route('registration.completed');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'An error occurred while processing your registration. Please try again.');
        }
    }
    
    /**
     * Show registration confirmation page.
     */
    public function completed()
    {
        // Check if registration is completed
        $registration = Session::get('completed_registration') ?? [];
        
        if (empty($registration)) {
            return redirect()->route('registration.step1');
        }
        
        // Get major details
        $major = Major::find($registration['major_id']);
        
        return view('registration.completed', compact('registration', 'major'));
    }
}
