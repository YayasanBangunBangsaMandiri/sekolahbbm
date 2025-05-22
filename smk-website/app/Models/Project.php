<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'featured_image',
        'program_id',
        'is_featured',
        'created_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_featured' => 'boolean',
    ];

    /**
     * Get the program that owns the project.
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Get the user who created the project.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the images associated with this project.
     */
    public function images()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
} 