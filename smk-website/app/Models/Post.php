<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'category_id',
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
        'type'
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
     * Get the category of the post.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
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

    /**
     * Sync tags for this post.
     * 
     * @param array $tagNames Array of tag names
     * @return void
     */
    public function syncTags(array $tagNames)
    {
        $tagIds = [];
        foreach ($tagNames as $tagName) {
            $tag = Tag::firstOrCreate([
                'name' => ucwords($tagName),
                'slug' => Str::slug($tagName)
            ]);
            $tagIds[] = $tag->id;
        }
        $this->tags()->sync($tagIds);
    }
}
