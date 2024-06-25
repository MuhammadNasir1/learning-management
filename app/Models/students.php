<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable =  [
        'full_name',
        'parent_id',
        'chinese_name',
        'gender',
        'dob',
        'phone_no',
        'adress',
        'em_person',
        'em_relation',
        'em_phone',
        'campus',
        'School_attending',
        'student_no',
        'grade',
    ];

    public $timestamps = true;
}
