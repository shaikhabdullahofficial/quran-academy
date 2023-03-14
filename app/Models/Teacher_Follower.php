<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher_Follower extends Model
{
    use HasFactory;
    protected $guarded = [];


     public function follower()
    {
        return $this->belongsToMany(StudentProfile::class ,'id','teacher_id');
    }
}
