<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RegistrationSetting;
use Illuminate\Http\Request;

class RegistrationSettingController extends Controller
{
    public function edit()
    {
        $setting = RegistrationSetting::first() ?? new RegistrationSetting();
        return view('admin.registration-settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'registration_start' => 'nullable|date',
            'registration_end' => 'nullable|date|after:registration_start',
            'is_registration_open' => 'boolean',
            'registration_closed_message' => 'nullable|string',
        ]);

        $setting = RegistrationSetting::first() ?? new RegistrationSetting();
        
        $setting->fill($request->only([
            'registration_start',
            'registration_end',
            'is_registration_open',
            'registration_closed_message',
        ]));

        $setting->save();

        return redirect()->route('admin.registration-settings.edit')
            ->with('success', 'Pengaturan pendaftaran berhasil disimpan.');
    }
} 