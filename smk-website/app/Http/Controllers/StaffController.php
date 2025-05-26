<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the staff members.
     */
    public function index()
    {
        $leadership = Staff::where('type', 'leadership')
            ->orderBy('order')
            ->orderBy('name')
            ->get();
            
        $teachers = Staff::where('type', 'teacher')
            ->orderBy('order')
            ->orderBy('name')
            ->get();
            
        $staff = Staff::where('type', 'staff')
            ->orderBy('order')
            ->orderBy('name')
            ->get();
            
        return view('staff.index', compact('leadership', 'teachers', 'staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified staff member.
     */
    public function show(Staff $staff)
    {
        return view('staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
