<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class words extends Model
{
    use HasFactory;

    protected $table = "words";
    protected $fillable = [
        'course_id',
        'course_name',
        'level',
        'lesson',
        'word',
        'audio_1',
        'audio_2',
        'audio_3',

    ];
    protected $timestamp = true;
}
