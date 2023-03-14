<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Review;
use App\Models\Teacher_review;
use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ReviewController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id' , 'DESC')->role('Teacher')->get();
        if(isset($data)){
            foreach($data as $req){
                $review = Review::where('teacher_id',$req['id'])->with('student')->get();
                $req->review = $review;
            }
        }
        return $this->sendResponse($data, 'Review Comments.');

    }
    public function studentReview($id){

        $data = User::where('id',$id)->get();
        if(isset($data)){
            foreach($data as $req){
                $review = Review::where('teacher_id',$req['id'])->with('student')->get();
                $req->review = $review;
            }
        }
        return $this->sendResponse($data, 'Teacher Review Comments.');

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'teacher_id' => 'required|numeric',
            'rating' => 'required|numeric',
            'comment' => 'required',
            'student_id' => 'required|numeric',
            'description' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $Review = Review::create($input);
        return $this->sendResponse($Review, 'Review added successfully.');
    }

    public function teacherReview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'teacher_id' => 'required|numeric',
            'rating' => 'required|numeric',
            'comment' => 'required',
            'student_id' => 'required|numeric',
            'description' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $teacher_review = Teacher_review::create($input);

        return response()->json($teacher_review , 'Teacher Review added successfully.');
    }

    public function teacherReviewGet($id)
    {
        $teacher_review = Teacher_review::where('student_id',$id)->with('hasTeacher','hasStudent')->first();
        return response()->json($teacher_review , 200);
    }
}
