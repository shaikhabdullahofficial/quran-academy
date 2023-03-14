<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;
use App\Models\course;
class StudentProfile extends Model
{
    use HasFactory;
    use HasApiTokens , HasRoles, Notifiable;
    protected $guarded=[];
    protected $guard_name = 'web';


    public function csourse()
    {
        return $this->hasOne(course::class, 'id' , 'course_id');
    }
    public function student(){
        return $this->hasOne(User::class, 'id' , 'student_id');
    }
    public function teacher(){
        return $this->hasOne(User::class, 'id' , 'teacher_id');
    }

    public function teacherFollowers()
    {
        return $this->belongsToMany(Teacher_Follower::class,  'student_id','id');
    }

    public function students()
    {
        return $this->belongsTo(TeacherProfile::class);
    }

}
