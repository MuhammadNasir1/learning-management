<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recent_teaching extends Model
{
    use HasFactory;

    protected $table = "recent_teaching";
    protected  $fillable = [

        'teacher_id',
        'student_id',
        'student_name',
        'teacher_name',
        'word',
    ];
    protected  $timeStamp  = true;
}
