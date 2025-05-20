<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'media_url',
        'media_type',
        'category',
        'created_by',
    ];

    /**
     * Get the user who created the gallery item.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
