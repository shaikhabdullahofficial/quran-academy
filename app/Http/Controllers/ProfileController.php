<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function editProfile(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $countries = Country::all();
        return view('backend.user_profile.edit',compact('user','countries'));
    }

    public function updateProfile(Request $request)
    {
    $id = Auth::user()->id;
    $user = User::findOrFail($id);
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    $user->dob = $request->input('dob');
    $user->country_name = $request->input('country_name');
    $user->address = $request->input('address');
    if($request->hasFile('profile'))
    {
        $file = $request->file('profile');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move('public/images/',$filename);
        $user->profile = $filename;
    }
    $user->save();
    return redirect()->route('users.index', $id)
                     ->with('success','User updated successfully');
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
