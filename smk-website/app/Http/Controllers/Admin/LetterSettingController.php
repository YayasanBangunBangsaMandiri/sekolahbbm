<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LetterSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LetterSettingController extends Controller
{
    public function edit()
    {
        $setting = LetterSetting::first() ?? new LetterSetting();
        return view('admin.letter-settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'school_name' => 'required',
            'school_address' => 'required',
            'school_phone' => 'required',
            'school_email' => 'required|email',
            'principal_name' => 'required',
            'principal_nip' => 'required',
            'letter_margin_top' => 'required|numeric|min:0|max:100',
            'letter_margin_right' => 'required|numeric|min:0|max:100',
            'letter_margin_bottom' => 'required|numeric|min:0|max:100',
            'letter_margin_left' => 'required|numeric|min:0|max:100',
            'paper_size' => 'required|in:A4,Letter,Legal',
            'paper_orientation' => 'required|in:portrait,landscape',
            'foundation_name' => 'required',
            'school_name_kop' => 'required',
            'school_tagline' => 'required',
            'school_website' => 'required',
            'school_decree' => 'required',
            'letter_header_color' => 'required|regex:/^#[a-fA-F0-9]{6}$/',
            'header_text_color' => 'required|regex:/^#[a-fA-F0-9]{6}$/',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $setting = LetterSetting::first() ?? new LetterSetting();
        
        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($setting->logo_path) {
                Storage::disk('public')->delete($setting->logo_path);
            }
            
            // Store new logo
            $logoPath = $request->file('logo')->store('letter-settings', 'public');
            $setting->logo_path = $logoPath;
        }
        
        $setting->fill($request->only([
            'school_name',
            'school_address',
            'school_phone',
            'school_email',
            'principal_name',
            'principal_nip',
            'letter_margin_top',
            'letter_margin_right',
            'letter_margin_bottom',
            'letter_margin_left',
            'paper_size',
            'paper_orientation',
            'foundation_name',
            'school_name_kop',
            'school_tagline',
            'school_website',
            'school_decree',
            'letter_header_color',
            'header_text_color',
        ]));

        $setting->save();

        return redirect()->route('admin.letter-settings.edit')
            ->with('success', 'Pengaturan surat berhasil disimpan');
    }
}
