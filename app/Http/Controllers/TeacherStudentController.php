<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher_review;
use App\Models\user;
use Auth;
use DB;
class TeacherStudentController extends Controller
{
    // public function create()
    // {

    // }

    public function index($id)
    {
        $student_id = $id;
        return View('backend.teacher_student_review.index',compact('student_id'));
    }

    public function store(Request $req, $id)
    {
        $course_name = DB::table('student_profiles')->where('id',$id)->first();
        $review = new Teacher_review();
        $review->course_id = $course_name->course;
        $review->student_id	 = $id;
        $teacher_id = Auth::user()->id;
        $review->teacher_id = $teacher_id;
        $review->comment = $req->comment;
        $review->description = $req->description;
        $review->rating = $req->rating;
        $review->save();
        return redirect()->route('students')->with('success', 'Review has been submitted');
    }

    public function show()
    {
        $all_review = Teacher_review::all();
        return View('backend.teacher_student_review.show', compact('all_review'));
    }

    public function edit($id)
    {

        //$editreview = Teacher_review::find($id);
        $editreview = Teacher_review::where('id',$id)->first();
        return view('backend.teacher_student_review.edit', compact('editreview'));
    }

    public function update($id,Request $req)
    {
        $update_review = Teacher_review::find($id);
        $update_review->comment = $req->editcomment;
        $update_review->description = $req->editdescription;
        if($req->editrating!="")
         {
          $update_review->rating = $req->editrating;
         }

        $update_review->update();
        return redirect()->route('all.reviews')->with('success', 'Review has been updated');
    }

    public function destroy($id)
    {
        $delete_review = Teacher_review::find($id);
        $delete_review->delete();
        return redirect()->route('all.reviews')->with('success', 'Review has been deleted');
    }

}
