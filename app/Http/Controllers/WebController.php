<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Auth;

class WebController extends Controller
{
    public function dashboard()
    {
        if(Auth::check() || Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Teacher')){
            return view('backend.dashboard.dashboard');
        }else{
            return redirect()->route('logIn');
        }
    }

    public function login()
    {
        if(Auth::check() && Auth::user()->hasRole('Teacher')){
            return view('backend.dashboard.dashboard');
        }else{
            return view('register');
        }
    }

    public function teacherRegister(Request $request)
    {
        $this->validate($request ,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $role = Role::where('name','=','Teacher')->first();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole([$role->id]);

        return redirect()->back();
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect()->route('logIn');
    }


}
