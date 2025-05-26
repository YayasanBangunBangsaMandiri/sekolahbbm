<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'page_id',
        'title',
        'content',
        'background_color',
        'type', // text, image-text, gallery, video, call-to-action, etc.
        'order',
        'settings', // JSON field for section-specific settings
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'settings' => 'array',
    ];

    /**
     * Get the page that owns the section.
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * Get the images associated with this section.
     */
    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
} 