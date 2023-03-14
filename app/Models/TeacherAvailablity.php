<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherAvailablity extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function hasCourse()
    {
        return $this->hasOne(course::class, 'id' , 'course_id');
    }
}
