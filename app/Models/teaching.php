<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teaching extends Model
{
    use HasFactory;
    protected $table = 'teaching';
    protected $fillable = [
        'teacher_id',
        'student_id',
        'course_id',
        'word_id',
        'student_name',
        'teacher_name',
        'lesson_date',
        'course',
        'word',
        'audio_1',
        'audio_2',
        'audio_3',
    ];
    protected $timestamp = true;
}
