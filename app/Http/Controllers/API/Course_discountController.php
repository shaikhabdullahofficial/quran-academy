<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Course_discount;
use Validator;

class Course_discountController extends Controller
{
    public function discountGenerate(Request $request)
    {
        $validate = Validator::make($request->all() ,[
            'student_id' => 'required',
            'referel_code' => 'required',
        ]);

        if($validate->fails()){
            return $this->sendError('Validator Error' , $validator->errors());
        }

        $course_discount = new Course_discount();
        $course_discount->student_id = $request->student_id;
        $course_discount->referel_code = $request->referel_code;
        $course_discount->save();

        return response()->json(['success' , 'CourseDiscount Generated Successfully']);
    }

    public function usedDiscount($id)
    {
        $course_discount = Course_discount::where('student_id' , $id)->first();

        if($course_discount){
            $course_discount->status = 1;
            $course_discount->update();
        }

        return response()->json(200);
    }

}
