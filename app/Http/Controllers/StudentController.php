<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\StudentProfile;
use App\Models\TeacherProfile;
use Spatie\Permission\Models\Role;
use DB;
use Auth;
use Hash;
use Illuminate\Support\Arr;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::orderBy('id' , 'DESC')->Role('Student')->get();
        return view('backend.student.index' , compact('students'));
    }

    // public function create(){
    //     $roles = Role::where('name', '=' , 'Student')->first();
    //     return view('backend.student.create' , compact('roles'));
    // }

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|same:confirm-password',
    //         'roles' => 'required'
    //     ]);

    //     $input = $request->all();
    //     $input['password'] = Hash::make($input['password']);

    //     $student = User::create($input);
    //     $student->assignRole($request->input('roles'));

    //     return redirect()->route('students.index')
    //                     ->with('success','Student created successfully');
    // }

    public function show($id)
    {
        $user = auth()->user();
        $student = User::find($id);
        if(isset($student)){
            $select = StudentProfile::where('student_id',$student->id)->with('csourse','teacher')->get();
        }
        return view('backend.student.show',compact('student','select'));
    }

    // public function edit($id)
    // {
    //     $student = User::find($id);
    //     $roles = Role::where('name','Student')->first();

    //     return view('backend.student.edit',compact('student','roles'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users,email,'.$id,
    //         'password' => 'same:confirm-password',
    //         'roles' => 'required'
    //     ]);

    //     $input = $request->all();
    //     if(!empty($input['password'])){
    //         $input['password'] = Hash::make($input['password']);
    //     }else{
    //         $input = Arr::except($input,array('password'));
    //     }

    //     $student = User::find($id);
    //     $student->update($input);
    //     DB::table('model_has_roles')->where('model_id',$id)->delete();

    //     $student->assignRole($request->input('roles'));

    //     return redirect()->route('students.index')
    //                     ->with('success','Student updated successfully');
    // }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('students.index')
                        ->with('success','Student deleted successfully');
    }


    // public function studentTeacherSelecte()
    // {

    // }


    public function studentTeacherSelecte(TeacherProfile $teacher)
    {

        // $students = TeacherProfile::with('teacherget');
        // if ($teacher) {
        //     $students = TeacherProfile::where('teacher_id', $teacher->id);
        //     // dd($teacher);
        // }
        // $students = $students->get();
        $teachers = StudentProfile::all();

        return view('backend.student_teacher_selecte.show', [
            'students' => $students,
            'teachers' => $teachers,
            'selectedTeacher' => $teacher,
        ]);
    }
}
