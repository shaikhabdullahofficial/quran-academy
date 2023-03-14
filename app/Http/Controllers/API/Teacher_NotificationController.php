<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Favourite_Teacher;
use App\Models\Teacher_Follower;
use Validator;

use Illuminate\Http\Request;

class Teacher_NotificationController extends Controller
{
    public function favouriteTeacher(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'student_id' => 'required',
            'teacher_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([ 'error' => $validator->errors()->all()]);
        }

        $fvr_teacher = Favourite_Teacher::where('student_id' , $request->student_id)->first();

        if(!empty($fvr_teacher))
        {
            $fvr_teacher->student_id = $request->student_id;
            $fvr_teacher->teacher_id = $request->teacher_id;
            $fvr_teacher->status = 0;
            $fvr_teacher->update();
        }else{
            $favourite_teacher = new Favourite_Teacher();
            $favourite_teacher->student_id = $request->student_id;
            $favourite_teacher->teacher_id = $request->teacher_id;
            $favourite_teacher->status = $request->status;
            $favourite_teacher->save();
        }

        return response()->json(200);
    }

    public function teacherFollower(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'student_id' => 'required',
            'teacher_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([ 'error' => $validator->errors()->all()]);
        }

        $teacher_flr = Teacher_Follower::where('student_id' , $request->student_id)->first();

        if(!empty($teacher_flr))
        {
            $teacher_flr->student_id = $request->student_id;
            $teacher_flr->teacher_id = $request->teacher_id;
            $teacher_flr->status = 0;
            $teacher_flr->update();
        }
        else
        {
            $teacher_follower = new Teacher_Follower();
            $teacher_follower->student_id = $request->student_id;
            $teacher_follower->teacher_id = $request->teacher_id;
            $teacher_follower->status = $request->status;
            $teacher_follower->save();
        }

        return response()->json(200);
    }
}
