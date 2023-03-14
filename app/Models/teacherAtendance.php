<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacherAtendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'present',
    ];
}
