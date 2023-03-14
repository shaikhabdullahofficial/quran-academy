<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentProfile;

class Payment_Detail extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function hasStudent(){
        return $this->hasMany(StudentProfile::class, 'id' , 'student_id')->with('teacher');
    }
}
