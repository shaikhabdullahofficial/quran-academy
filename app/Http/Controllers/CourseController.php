<?php

namespace App\Http\Controllers;

use App\Models\TeacherAvailablity;
use App\Models\course;
use App\Models\Teacher_selected;
use App\Models\teacherselect;
use Illuminate\Http\Request;
use App\Models\User;
use Faker\Factory;
use Illuminate\Container\Container;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = course::orderby('id','DESC')->get();
        return view('backend.course.index' , compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'course_name' => 'required',
            'course_fee' => 'required',
        ]);

        $course = new course();
        $course->course_name = $request->course_name;
        $course->student_fee = $request->student_fee;
        $course->teacher_fee = $request->teacher_fee;
        $course->save();

        return redirect()->route('course.index')->with('success' , 'Course Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(course $course)
    {
        return view('backend.course.show')->with('course',$course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = course::find($id);
        return view('backend.course.edit' , compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request ,[
            'course_name' => 'required',
            'student_fee' => 'required',
            'teacher_fee' => 'required',
        ]);

        $course = course::find($id);

        $course->course_name = $request->course_name;
        $course->student_fee = $request->student_fee;
        $course->teacher_fee = $request->teacher_fee;
        $course->update();

        return redirect()->route('course.index')->with('success' , 'Course Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course=course::find($id)->delete();
        return redirect()->route('course.index')->with('success' , 'Course Deleted Successfully');
    }

    public function classSchedule(Request $request)
    {
        $teacher_packages = TeacherAvailablity::where('availablity_name','1 times per Week')->orderby('id', 'ASC')->get();
        $teacher_packages2 = TeacherAvailablity::where('availablity_name','=' ,'2 times per Week')->orderby('id', 'ASC')->get();
        $teacher_packages3 = TeacherAvailablity::where('availablity_name','=' ,'3 times per Week')->orderby('id', 'ASC')->get();
        return view('backend.teacher_package.index')->with(['teacher_packages' => $teacher_packages,'teacher_packages2' => $teacher_packages2,'teacher_packages3' => $teacher_packages3]);

    }

    public function classSingle(Request $request){
        $class_scheduling = TeacherAvailablity::where('availablity_name' , $request->class_scheduling)->get();
        return response()->json($class_scheduling);
    }

    public function teacherPackagesStore($id)
    {
        $teacher_package = TeacherAvailablity::find($id);
        return view('backend.teacher_package.show' , compact('teacher_package'));
    }

    public function storeTeacherSelect(Request $request)
    {
        $user = new teacherselect();
        $user->selected_teacher = $request->selected_teacher;
        $user->save();
        return redirect()->back();
    }
}
