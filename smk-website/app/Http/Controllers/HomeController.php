<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Media;
use App\Models\Page;
use App\Models\Program;
use App\Models\Project;
use App\Models\Staff;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index()
    {
        // Get featured content for homepage
        $featuredPosts = Post::where('is_featured', true)
            ->latest('published_at')
            ->take(3)
            ->get();
            
        // Get latest news articles if not enough featured posts
        if ($featuredPosts->count() < 3) {
            $additionalPosts = Post::where('is_featured', false)
                ->latest('published_at')
                ->take(3 - $featuredPosts->count())
                ->get();
            $featuredPosts = $featuredPosts->merge($additionalPosts);
        }
        
        // Get featured programs
        $featuredPrograms = Program::where('is_featured', true)
            ->orderBy('order')
            ->take(3)
            ->get();
            
        // Get featured projects
        $featuredProjects = Project::where('is_featured', true)
            ->latest()
            ->take(4)
            ->get();
            
        // Get promotional videos
        $promotionalVideos = Media::where('type', 'video')
            ->where('mediable_type', 'App\\Models\\Page')
            ->whereHas('mediable', function($query) {
                $query->where('slug', 'home');
            })
            ->orderBy('order')
            ->take(1)
            ->get();
            
        // Get featured gallery images
        $galleryImages = Media::where('type', 'image')
            ->where('mediable_type', 'App\\Models\\Page')
            ->whereHas('mediable', function($query) {
                $query->where('slug', 'home');
            })
            ->orderBy('order')
            ->take(6)
            ->get();
            
        // Get page content
        $page = Page::where('slug', 'home')->first();
            
        return view('home', compact(
            'featuredPosts', 
            'featuredPrograms', 
            'featuredProjects',
            'promotionalVideos',
            'galleryImages',
            'page'
        ));
    }
    
    /**
     * Display the about page.
     */
    public function about()
    {
        // Get the about page content
        $page = Page::where('slug', 'about-us')->first();
        
        // Get school leadership and management team
        $leadership = Staff::where('type', 'leadership')
            ->orderBy('order')
            ->orderBy('name')
            ->get();
            
        // Get teachers
        $teachers = Staff::where('type', 'teacher')
            ->orderBy('order')
            ->orderBy('name')
            ->get();
            
        // Get other staff members
        $staff = Staff::where('type', 'staff')
            ->orderBy('order')
            ->orderBy('name')
            ->get();
            
        return view('about', compact('page', 'leadership', 'teachers', 'staff'));
    }
    
    /**
     * Display the contact page.
     */
    public function contact()
    {
        // Get the contact page content
        $page = Page::where('slug', 'contact')->first();
        
        return view('contact', compact('page'));
    }
    
    /**
     * Handle the contact form submission.
     */
    public function sendContact(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        
        // Add additional data
        $validated['ip_address'] = $request->ip();
        $validated['user_agent'] = $request->userAgent();
        $validated['status'] = 'unread';
        
        try {
            // Save contact submission to database
            $submission = ContactSubmission::create($validated);
            
            // Send email notification to admin
            // Mail::to(config('mail.admin_email'))->send(new ContactFormSubmitted($submission));
            
            return back()->with('success', 'Your message has been sent. Thank you for contacting us.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'There was a problem sending your message. Please try again later.']);
        }
    }
}
