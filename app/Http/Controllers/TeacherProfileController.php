<?php

namespace App\Http\Controllers;

use App\Models\TeacherProfile;
use App\Models\Country;
use App\Models\course;
use App\Models\Review;
use Illuminate\Http\Request;
use Auth;

class TeacherProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        $courses = course::all();
        $teacher_profile = TeacherProfile::where('teacher_id' , '=' , Auth::user()->id)->first();
        $teacher_avail = $teacher_profile->teacher_expertise;
        $array = explode(',', $teacher_avail);
        return view('backend.teacher_profile.Create' , compact('teacher_profile','countries','courses','array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teacher_profile = TeacherProfile::where('teacher_id' , '=' , Auth::user()->id)->first();

        if(!empty($teacher_profile)){

            $this->validate($request ,[
                'name' => 'required',
                'description' => 'required|string|min:10|max:500',
                'teacher_fee' => 'required',
                'country' => 'required',
                'teacher_expertise' => 'required',
                'about' => 'required|string|min:10|max:500',
                'experience' => 'required|string|min:10|max:500',
            ]);

            $teacher_expertise = implode(',' , $request->input['teacher_expertise']);
            $teacher_fee = implode(',' , $request->input['teacher_fee']);

            if (isset($request->flag)) {
                $photo = date('d-m-Y-His').'.'.$request->file('flag')->getClientOriginalExtension();
                $request->flag->move(public_path('/assets/media/country_flag'), $photo);
                $teacher_profile->country_flag = $photo;
            }

            if (isset($request->video)) {
                $video = date('d-m-Y-His').'.'.$request->file('video')->getClientOriginalExtension();
                $request->video->move(public_path('/assets/media/profile_video'), $video);
                $teacher_profile->video = $photo;
            }

            $teacher_profile->teacher_id = Auth::user()->id;
            $teacher_profile->name = $request->name;
            $teacher_profile->teacher_expertise = $teacher_expertise;
            $teacher_profile->teacher_fee = $teacher_fee;
            $teacher_profile->description = $request->description;
            $teacher_profile->about = $request->about;
            $teacher_profile->experience = $request->experience;
            $teacher_profile->country_name = $request->country;
            $teacher_profile->update();

            return redirect()->back()->with('success' , 'Teacher Profile Updated Successfully');

        }else{

            $this->validate($request ,[
                'name' => 'required',
                'description' => 'required|string|min:10|max:500',
                'country' => 'required',
                'teacher_expertise' => 'required',
                'about' => 'required|string|min:10|max:500',
                'experience' => 'required|string|min:10|max:500',
                'video' => 'required|mimetypes:video/mp4,video/avi,video/mpeg|max:51200',
            ]);

            $teacher_profile = new TeacherProfile();

            if (isset($request->flag)) {
                $photo = date('d-m-Y-His').'.'.$request->file('flag')->getClientOriginalExtension();
                $request->flag->move(public_path('/assets/media/country_flag'), $photo);
                $teacher_profile->country_flag = $photo;
            }

            if (isset($request->video)) {
                $video = date('d-m-Y-His').'.'.$request->file('video')->getClientOriginalExtension();
                $request->video->move(public_path('/assets/media/profile_video'), $video);
                $teacher_profile->video = $photo;
            }

            $teacher_profile->teacher_id = Auth::user()->id;
            $teacher_profile->name = $request->name;
            $teacher_profile->teacher_expertise = $request->teacher_expertise;
            $teacher_profile->description = $request->description;
            $teacher_profile->about = $request->about;
            $teacher_profile->experience = $request->experience;
            $teacher_profile->country_name = $request->country;
            $teacher_profile->save();
        }

        return redirect()->back()->with('success' , 'Teacher Profile Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherProfile $teacherProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherProfile $teacherProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeacherProfile  $teacherProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherProfile $teacherProfile)
    {
        //
    }
}
