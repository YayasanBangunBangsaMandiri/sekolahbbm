<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of activities.
     */
    public function index()
    {
        // Get all activities, optionally filtered by type
        $isExtracurricular = request()->has('extracurricular');
        
        $query = Activity::with('program');
        
        if ($isExtracurricular) {
            $query->where('is_extracurricular', true);
        } else {
            $query->where('is_extracurricular', false);
        }
        
        $activities = $query->orderBy('name')->paginate(12);
        
        return view('activities.index', [
            'activities' => $activities,
            'isExtracurricular' => $isExtracurricular
        ]);
    }

    /**
     * Display the specified activity.
     */
    public function show($id)
    {
        $activity = Activity::with(['program', 'images'])->findOrFail($id);
        
        // Get related activities from the same program
        $relatedActivities = Activity::where('program_id', $activity->program_id)
            ->where('id', '!=', $activity->id)
            ->where('is_extracurricular', $activity->is_extracurricular)
            ->limit(3)
            ->get();
        
        return view('activities.show', compact('activity', 'relatedActivities'));
    }
} 