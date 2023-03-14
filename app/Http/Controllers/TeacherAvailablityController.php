<?php

namespace App\Http\Controllers;

use App\Models\TeacherAvailablity;
use App\Models\course;
use Illuminate\Http\Request;

class TeacherAvailablityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher_availablities =  TeacherAvailablity::orderby('id' , 'DESC')->get();
        return view('backend.teacher_availablity.index' , compact('teacher_availablities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = course::orderby('id' , 'DESC')->get();
        return view('backend.teacher_availablity.create' , compact('courses'));
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
            'availablity_name' => 'required',
            'class_type' => 'required',
            'class_day' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $class_day = implode(',', $request->input('class_day'));

        $teacher_availablity = new TeacherAvailablity();

        $teacher_availablity->availablity_name = $request->availablity_name;
        $teacher_availablity->class_type = $request->class_type;
        $teacher_availablity->class_days = $class_day;
        $teacher_availablity->start_date = $request->start_date;
        $teacher_availablity->end_date = $request->end_date;
        $teacher_availablity->start_time = $request->start_time;
        $teacher_availablity->end_time = $request->end_time;
        $teacher_availablity->save();
        return redirect()->route('teacher_availablity.index')->with('success' , 'Availablity Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeacherAvailablity  $teacherAvailablity
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher_availablity = TeacherAvailablity::where('id' , $id)->first();
        return view('backend.teacher_availablity.show' , compact('teacher_availablity'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeacherAvailablity  $teacherAvailablity
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = course::orderby('id' , 'DESC')->get();
        $teacher_availablity = TeacherAvailablity::find($id);
        $teacher_avail = $teacher_availablity->class_days;
        $array = explode(',', $teacher_avail);
        return view('backend.teacher_availablity.edit' , compact('teacher_availablity','courses' , 'array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeacherAvailablity  $teacherAvailablity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request ,[
            'availablity_name' => 'required',
            'class_type' => 'required',
            'class_day' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $class_day = implode(',', $request->input('class_day'));

        $teacher_availablity =TeacherAvailablity::find($id);

        $teacher_availablity->availablity_name = $request->availablity_name;
        $teacher_availablity->class_type = $request->class_type;
        $teacher_availablity->class_days = $class_day;
        $teacher_availablity->start_date = $request->start_date;
        $teacher_availablity->end_date = $request->end_date;
        $teacher_availablity->start_time = $request->start_time;
        $teacher_availablity->end_time = $request->end_time;
        $teacher_availablity->update();

        return redirect()->route('teacher_availablity.index')->with('success' , 'Availablity Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeacherAvailablity  $teacherAvailablity
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher_availablity =TeacherAvailablity::find($id)->delete();
        return redirect()->route('teacher_availablity.index')->with('success' , 'Availablity Deleted Successfully');
    }

    public function getPrice(Request $request)
    {
        $courseId = $request->course_id;
        $courseIds=[];

        foreach ($courseId as $crs) {
            $course = course::where('id' , '=' , $crs)->first();
            if ($course) {
                $courseIds[] = $course->teacher_fee;
            }
        }
        return response()->json([
          'teacher_fee' => $courseIds
        ]);
    }
}
