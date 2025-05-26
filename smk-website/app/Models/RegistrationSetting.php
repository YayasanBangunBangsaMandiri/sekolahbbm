<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_start',
        'registration_end',
        'is_registration_open',
        'registration_closed_message',
    ];

    protected $casts = [
        'registration_start' => 'datetime',
        'registration_end' => 'datetime',
        'is_registration_open' => 'boolean',
    ];

    public function isRegistrationOpen(): bool
    {
        if (!$this->is_registration_open) {
            return false;
        }

        $now = now();
        
        if ($this->registration_start && $now->lt($this->registration_start)) {
            return false;
        }

        if ($this->registration_end && $now->gt($this->registration_end)) {
            return false;
        }

        return true;
    }
} 