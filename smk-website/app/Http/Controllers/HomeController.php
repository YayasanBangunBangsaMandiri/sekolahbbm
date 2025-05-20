<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Post;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda
     */
    public function index()
    {
        // Ambil berita terbaru
        $latestPosts = Post::latest()->take(3)->get();
        
        // Ambil daftar jurusan
        $majors = Major::all();
        
        // Ambil staff untuk highlight (misalnya kepala sekolah)
        $featuredStaff = Staff::where('type', 'management')->first();
        
        return view('home', compact('latestPosts', 'majors', 'featuredStaff'));
    }
    
    /**
     * Menampilkan halaman tentang sekolah
     */
    public function about()
    {
        // Ambil data staff untuk halaman about
        $managementStaff = Staff::where('type', 'management')->get();
        
        return view('about', compact('managementStaff'));
    }
    
    /**
     * Menampilkan halaman kontak
     */
    public function contact()
    {
        return view('contact');
    }
    
    /**
     * Mengirim pesan dari form kontak
     */
    public function sendContact(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        
        // Dalam versi lengkap, di sini bisa ditambahkan kode untuk mengirim email
        // atau menyimpan pesan ke database
        
        return back()->with('success', 'Pesan Anda berhasil dikirim. Terima kasih telah menghubungi kami.');
    }
}
