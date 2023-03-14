<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\Teacher_Follower;
use App\Models\User;

class TeacherProfile extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function hasCourse()
    {
        return $this->hasOne(course::class, 'id' , 'teacher_expertise');
    }
    public function hasreview()
    {
        return $this->hasMany(Review::class, 'teacher_id' , 'teacher_id');
    }
    public function hasTeacher()
    {
        return $this->hasMany(User::class, 'id' , 'teacher_id');
    }
    public function hasfollower()
    {
        return $this->hasMany(Teacher_Follower::class, 'teacher_id' , 'teacher_id');
    }

    public function teacherget()
    {
        return $this->hasMany(StudentProfile::class);
    }
}
