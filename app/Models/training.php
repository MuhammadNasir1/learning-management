<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class training extends Model
{
    use HasFactory;
    protected $table = 'training';
    protected $timestamp = true;
    protected $fillable = [
        'title',
        'description',
        'video',
        'duration',
        'date',
    ];
}
