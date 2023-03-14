<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zoommeeting extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'zoom_link',
        'student',
        'class_time',
    ];
}
