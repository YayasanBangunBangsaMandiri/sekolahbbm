<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo_path',
        'school_name',
        'school_address',
        'school_phone',
        'school_email',
        'principal_name',
        'principal_nip',
        'letter_margin_top',
        'letter_margin_right',
        'letter_margin_bottom',
        'letter_margin_left',
        'paper_size',
        'paper_orientation',
        'foundation_name',
        'school_name_kop',
        'school_tagline',
        'school_website',
        'school_decree',
        'letter_header_color',
        'header_text_color'
    ];

    protected $casts = [
        'letter_margin_top' => 'integer',
        'letter_margin_right' => 'integer',
        'letter_margin_bottom' => 'integer',
        'letter_margin_left' => 'integer',
    ];
}
