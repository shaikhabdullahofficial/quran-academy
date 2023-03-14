<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Favourite_Teacher;
use App\Models\Teacher_Follower;
use App\Models\TeacherProfile;
use App\Models\Student;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function getFollowerCount($teacher_id)
    {
        $teacher = Teacher_Follower::findOrFail($teacher_id)->get();
        $followerCount = count( $teacher );

        return response()->json([
           'follower_count' => $followerCount,
      ]);
    }
    
    public function teachersList()
    {
        $teachers_list = TeacherProfile::orderby('id' ,  'DESC')->with('hasreview','hasTeacher')->get();
        return response()->json($teachers_list , 200);
    }

    public function teacherDetail($id)
    {
        $teacher_detail = TeacherProfile::where('teacher_id' , '=' , $id)->with('hasreview','hasTeacher')->first();
        return response()->json($teacher_detail , 200);
    }

    public function getLikeCount($id)
    {
        $teacher = Favourite_Teacher::where('id',$id)->where('status',"=",1)->count();
        return response()->json([
          'teacher_like'=> $teacher,
      ]);
    }

}
