<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Project;
use App\Models\Activity;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the programs.
     */
    public function index()
    {
        // Get all programs ordered by grade level
        $programs = Program::orderBy('grade_level')->orderBy('order')->get();
        
        // Group programs by grade level for easier display
        $elementaryPrograms = $programs->where('grade_level', 'elementary');
        $middlePrograms = $programs->where('grade_level', 'middle');
        $highPrograms = $programs->where('grade_level', 'high');
        $allPrograms = $programs->where('grade_level', 'all');
        
        return view('programs.index', compact(
            'elementaryPrograms', 
            'middlePrograms', 
            'highPrograms', 
            'allPrograms'
        ));
    }

    /**
     * Display the specified program.
     */
    public function show($slug)
    {
        // Find the program by slug
        $program = Program::where('slug', $slug)->firstOrFail();
        
        // Get related projects
        $projects = $program->projects()->orderBy('created_at', 'desc')->get();
        
        // Get related activities, separate extracurricular and regular
        $extracurriculars = $program->activities()
            ->where('is_extracurricular', true)
            ->orderBy('name')
            ->get();
            
        $activities = $program->activities()
            ->where('is_extracurricular', false)
            ->orderBy('name')
            ->get();
        
        return view('programs.show', compact('program', 'projects', 'extracurriculars', 'activities'));
    }
} 