<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Registration;
use App\Models\LetterSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Middleware cek akses admin dilakukan di route
        $query = Registration::with('major')->latest();
        
        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        // Filter berdasarkan pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('student_name', 'like', "%{$search}%")
                  ->orWhere('nisn', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }
        
        $registrations = $query->paginate(10)
                               ->appends($request->except('page'));
        
        return view('admin.registrations.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua jurusan untuk dropdown
        $majors = Major::all();
        
        return view('registration', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'nisn' => 'required|string|max:20|unique:registrations,nisn',
            'place_of_birth' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'required|string',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'parent_name' => 'required|string|max:255',
            'parent_phone' => 'required|string|max:20',
            'previous_school' => 'required|string|max:255',
            'major_id' => 'required|exists:majors,id',
            'agreement' => 'required',
        ]);
        
        // Hapus field agreement dari data yang akan disimpan
        unset($validated['agreement']);
        
        // Tambahkan status pendaftaran default
        $validated['status'] = 'pending';
        
        // Simpan data pendaftaran
        DB::beginTransaction();
        try {
            Registration::create($validated);
            DB::commit();
            
            return redirect()->route('registration')
                            ->with('success', 'Pendaftaran berhasil dikirim. Kami akan meninjau pendaftaran Anda dan menghubungi melalui email.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Terjadi kesalahan saat memproses pendaftaran. Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Middleware cek akses admin dilakukan di route
        $registration = Registration::with('major')->findOrFail($id);
        
        return view('admin.registrations.show', compact('registration'));
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

    /**
     * Update status pendaftaran
     */
    public function updateStatus(Request $request, string $id)
    {
        // Middleware cek akses admin dilakukan di route
        $validated = $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);
        
        $registration = Registration::findOrFail($id);
        $registration->update([
            'status' => $validated['status'],
        ]);
        
        return redirect()->route('admin.registrations.show', $registration->id)
                        ->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    /**
     * Download acceptance letter
     */
    public function downloadAcceptanceLetter(string $id)
    {
        $registration = Registration::with('major')->findOrFail($id);
        
        // Check if registration is accepted
        if ($registration->status !== 'accepted') {
            return back()->with('error', 'Surat penerimaan hanya tersedia untuk pendaftaran yang telah diterima.');
        }

        // Get letter settings
        $setting = LetterSetting::first();
        if (!$setting) {
            return back()->with('error', 'Pengaturan surat belum dikonfigurasi. Silakan hubungi administrator.');
        }

        try {
            // Generate PDF
            $pdf = Pdf::loadView('pdf.acceptance-letter', [
                'registration' => $registration,
                'setting' => $setting,
                'registrationNumber' => 'REG-' . str_pad($registration->id, 5, '0', STR_PAD_LEFT),
                'date' => now()->isoFormat('D MMMM Y')
            ]);

            // Set paper size and orientation from settings
            $pdf->setPaper($setting->paper_size ?? 'A4', $setting->paper_orientation ?? 'portrait');

            // Download PDF
            return $pdf->download('surat-penerimaan-' . $registration->student_name . '.pdf');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat mengunduh surat penerimaan. Silakan coba lagi.');
        }
    }
}
