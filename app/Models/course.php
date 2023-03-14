<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TeacherAvailablity;
class course extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function hasCourse()
    {
        return $this->hasOne(TeacherAvailablity::class, 'course_id','id');
    }

}
