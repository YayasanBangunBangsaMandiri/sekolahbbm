<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'category', // news, events, achievements, sustainability
        'slug',
        'excerpt',
        'featured_image',
        'author_id',
        'published_at',
        'is_featured',
        'meta_description',
        'meta_keywords',
        'status', // draft, published
        'event_date', // for event posts
        'event_location', // for event posts
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'published_at' => 'datetime',
        'event_date' => 'datetime',
        'is_featured' => 'boolean',
    ];

    /**
     * Get the author of the post.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the associated tags for this post.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get the associated media for this post.
     */
    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
