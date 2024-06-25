<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher_rec extends Model
{
    use HasFactory;
    protected $table  = "teacher_rec";
    protected $fillable = [
        'student_id',
        'student_name',
        'teacher_id',
        'lesson_date',
        'teacher_name',
        'teacher_comment',
        'video',
        'duration',
    ];
    protected $timestamp = true;
}
