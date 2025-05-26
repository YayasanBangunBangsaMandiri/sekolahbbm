<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of student projects.
     */
    public function index()
    {
        // Get all projects, optionally filtered by program
        $programId = request('program');
        
        $query = Project::with('program');
        
        if ($programId) {
            $query->where('program_id', $programId);
        }
        
        $projects = $query->orderBy('created_at', 'desc')->paginate(12);
        
        return view('projects.index', compact('projects'));
    }

    /**
     * Display the specified project.
     */
    public function show($id)
    {
        $project = Project::with(['program', 'images'])->findOrFail($id);
        
        // Get related projects from the same program
        $relatedProjects = Project::where('program_id', $project->program_id)
            ->where('id', '!=', $project->id)
            ->limit(3)
            ->get();
        
        return view('projects.show', compact('project', 'relatedProjects'));
    }
} 