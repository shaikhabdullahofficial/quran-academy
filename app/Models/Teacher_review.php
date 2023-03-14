<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\StudentProfile;

class Teacher_review extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function hasTeacher() {
        return $this->hasMany(User::class, 'id', 'teacher_id');
    }

    public function hasStudent() {
        return $this->hasMany(StudentProfile::class, 'id', 'student_id');
    }

}
    