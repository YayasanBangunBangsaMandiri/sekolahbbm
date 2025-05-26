<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'media';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'filename',
        'path',
        'type', // image, video, document
        'size',
        'mime_type',
        'title',
        'caption',
        'alt_text',
        'mediable_id',
        'mediable_type',
        'order',
    ];

    /**
     * Get the parent mediable model (Post, Program, Project, etc).
     */
    public function mediable()
    {
        return $this->morphTo();
    }

    /**
     * Get the URL for this media.
     */
    public function getUrlAttribute()
    {
        return asset('storage/' . $this->path);
    }

    /**
     * Get the thumbnail URL for this media.
     */
    public function getThumbnailUrlAttribute()
    {
        $pathInfo = pathinfo($this->path);
        $thumbnailPath = $pathInfo['dirname'] . '/' . $pathInfo['filename'] . '_thumbnail.' . $pathInfo['extension'];
        
        return asset('storage/' . $thumbnailPath);
    }
} 