<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_name',
        'birthdate',
        'place_of_birth',
        'gender',
        'address',
        'parent_name',
        'parent_phone',
        'previous_school',
        'major_id',
        'status',
        'nisn',
        'email',
        'phone',
    ];

    /**
     * Get the major that the student is registering for.
     */
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
