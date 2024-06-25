<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;

    protected  $table = 'teacher';
    protected  $timestamp = true;
    protected  $fillable = [
        'first_name',
        'last_name',
        'dob',
        'gender',
        'phone_no',
        'email',
        'subject',
        'skill',
        'join_date',
        'address',
        'teacher_cv',

    ];
}
