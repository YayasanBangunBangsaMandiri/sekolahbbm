<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Major;
use App\Models\Post;
use App\Models\Registration;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard admin dengan berbagai statistik
     */
    public function index()
    {
        // Hitung data untuk dashboard
        $totalPosts = Post::count();
        $totalStaff = Staff::count();
        $totalRegistrations = Registration::count();
        $totalMajors = Major::count();
        $totalGalleries = Gallery::count();
        $totalUsers = User::count();
        
        // Ambil data pendaftaran terbaru
        $latestRegistrations = Registration::latest()->take(5)->get();
        
        // Ambil data postingan terbaru
        $latestPosts = Post::latest()->take(5)->get();
        
        // Statistik pendaftaran berdasarkan jurusan
        $registrationsByMajor = Registration::with('major')
            ->select('major_id')
            ->selectRaw('count(*) as count')
            ->groupBy('major_id')
            ->get();
        
        return view('admin.dashboard', compact(
            'totalPosts',
            'totalStaff',
            'totalRegistrations',
            'totalMajors',
            'totalGalleries',
            'totalUsers',
            'latestRegistrations',
            'latestPosts',
            'registrationsByMajor'
        ));
    }
}
