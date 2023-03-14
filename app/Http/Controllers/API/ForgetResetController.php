<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Mail\PasswordReset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ForgetResetController extends Controller
{
//     public function  forgetPassword(Request $request)
//     {

//         $user = Validator::make($request->all(), [
//             'email' => 'required|email',
//         ]);

//         try {
//             $user = User::where('email', $request->email)->first();

//             if (!$user) {
//                 return response()->json(["success" => false, "message" => "User not found"]);
//             }

//             $token = Str::random(40);
//             $resetLink = URL::to('/reset-password?token=' . $token);

//             $data = [
//                 'url' => $resetLink,
//                 'title' => 'Password Reset',
//                 'body' => 'Reset Your Password',
//             ];
//         if(isset($user)){
//                 Mail::send('email.password_reset', $data, function($message) use ($user) {
//                     $message->to($user['email'], $user['name'])->subject('Forget Password');
//                 });
//                 return response()->json(['Email SuccessFull']);
//             }
//         } catch (Exception $ex) {
//             return response()->json(["success" => false, "message" => $ex->getMessage()]);
//         }
// }
}
