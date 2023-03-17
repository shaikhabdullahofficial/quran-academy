<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\StudentProfile;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Auth;
use Illuminate\Support\Arr;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::orderBy('id' , 'DESC')->role('Teacher')->get();
        return view('backend.teacher.index' , compact('teachers'));
    }

    public function create()
    {
        $roles = Role::where('name', '=' , 'Teacher')->first();
        return view('backend.teacher.create' , compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $teacher = User::create($input);
        $teacher->assignRole($request->input('roles'));

        return redirect()->route('teachers.index')->with('success','Teacher created successfully');
    }

    public function show($id)
    {
        $teacher = User::find($id);
        return view('backend.teacher.show',compact('teacher'));
    }

    public function edit($id)
    {
        $teacher = User::find($id);
        $roles = Role::where('name','Teacher')->first();

        return view('backend.teacher.edit',compact('teacher','roles'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $teacher = User::find($id);
        $teacher->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $teacher->assignRole($request->input('roles'));

        return redirect()->route('teachers.index')
                        ->with('success','Teacher updated successfully');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('teachers.index')
                        ->with('success','Teacher deleted successfully');
    }

    //Students on teacter dastboard start
    public function all_students()
    {
        $id = Auth::id();
        $students_detail = DB::table('student_profiles')->where('teacher_id', $id)->get();
        return View('backend.teacher_student.index', compact('students_detail'));
    }

    public function show_details($id)
    {
        $student_details = StudentProfile::where('id', $id)->get();
        return View('backend.teacher_student.show', compact('student_details'));
    }
    //Students on teacter dastboard end
}
