<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
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
        'grade_level', // elementary, middle, high
        'featured_image',
        'is_featured',
        'content',
        'order',
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
     * Get related student projects for this program.
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get related activities for this program.
     */
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
} 