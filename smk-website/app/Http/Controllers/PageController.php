<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the specified page.
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->with('sections')->firstOrFail();
        
        // Check if page has a custom template
        $template = 'pages.' . ($page->template ?? 'default');
        
        // Fall back to default template if custom one doesn't exist
        if (!view()->exists($template)) {
            $template = 'pages.default';
        }
        
        return view($template, compact('page'));
    }
} 