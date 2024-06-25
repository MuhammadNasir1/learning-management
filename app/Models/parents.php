<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parents extends Model
{
    use HasFactory;

    public $table = 'parents';

    public $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'phone_no',
        'contact',
        'address',
        'child_ren',
    ];

    public $timestamps = 'create_time';
}
