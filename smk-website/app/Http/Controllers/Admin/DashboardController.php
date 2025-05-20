<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Major;
use App\Models\Post;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard admin dengan berbagai statistik
     */
    public function index()
    {
        // Data statistik untuk kartu ringkasan
        $totalRegistrations = Registration::count();
        $totalPosts = Post::count();
        $totalGalleries = Gallery::count();
        $totalMajors = Major::count();
        
        // Pendaftaran terbaru
        $latestRegistrations = Registration::with('major')
                                ->latest()
                                ->take(5)
                                ->get();
                                
        // Postingan terbaru
        $latestPosts = Post::with('author')
                        ->latest()
                        ->take(5)
                        ->get();
                        
        // Statistik pendaftaran per jurusan
        $registrationsByMajor = Registration::select('major_id', DB::raw('count(*) as count'))
                                ->with('major')
                                ->groupBy('major_id')
                                ->get();
        
        return view('admin.dashboard', compact(
            'totalRegistrations',
            'totalPosts',
            'totalGalleries',
            'totalMajors',
            'latestRegistrations',
            'latestPosts',
            'registrationsByMajor'
        ));
    }
}
