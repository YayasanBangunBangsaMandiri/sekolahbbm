<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::orderBy('type')
            ->orderBy('order')
            ->orderBy('name')
            ->get()
            ->groupBy('type');
            
        return view('admin.staff.index', compact('staff'));
    }

    public function create()
    {
        return view('admin.staff.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'type' => 'required|in:leadership,teacher,staff',
            'order' => 'nullable|integer|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('staff-photos', 'public');
            $validated['photo_url'] = $photoPath;
        }

        Staff::create($validated);

        return redirect()->route('admin.staff.index')
            ->with('success', 'Staff berhasil ditambahkan.');
    }

    public function edit(Staff $staff)
    {
        return view('admin.staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'type' => 'required|in:leadership,teacher,staff',
            'order' => 'nullable|integer|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($staff->photo_url) {
                Storage::disk('public')->delete($staff->photo_url);
            }
            
            $photoPath = $request->file('photo')->store('staff-photos', 'public');
            $validated['photo_url'] = $photoPath;
        }

        $staff->update($validated);

        return redirect()->route('admin.staff.index')
            ->with('success', 'Data staff berhasil diperbarui.');
    }

    public function destroy(Staff $staff)
    {
        if ($staff->photo_url) {
            Storage::disk('public')->delete($staff->photo_url);
        }
        
        $staff->delete();

        return redirect()->route('admin.staff.index')
            ->with('success', 'Staff berhasil dihapus.');
    }
} 