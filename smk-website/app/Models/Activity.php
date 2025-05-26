<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'content',
        'featured_image',
        'program_id',
        'is_extracurricular',
        'schedule',
        'location',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_extracurricular' => 'boolean',
    ];

    /**
     * Get the program that owns the activity.
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Get the images associated with this activity.
     */
    public function images()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
} 