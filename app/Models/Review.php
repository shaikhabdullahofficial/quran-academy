<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentProfile;
class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'rating',
        'comment',
        'student_id',
    ];
    public function student() {
        return $this->hasMany(StudentProfile::class, 'id', 'student_id');
    }


}
