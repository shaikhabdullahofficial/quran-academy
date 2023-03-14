<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentProfile;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Student_Course;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Student_Package;
use Exception;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController{

    public function register(Request $request)
    {
        if($request->registration_type == 'email'){

            $validator = Validator::make($request->all(), [
                'registration_type' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = StudentProfile::create($input);
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;
            $user->remember_token = $success['token'];
            $user->save();
            $user->assignRole('Student');
            if(isset($user)){
                $this->send_eamil($user['email'] , $user['registration_type']);
            }

        }elseif($request->registration_type == 'phone'){

            $validator = Validator::make($request->all(),[
                'registration_type' => 'required',
                'phone' => 'required',
                'password' => 'required',
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = StudentProfile::create($input);
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['phone'] =  $user->phone;
            $user->remember_token = $success['token'];
            $user->save();

            $user->assignRole('Student');
            if(isset($user)){
                $this->send_eamil($user['phone'] , $user['registration_type']);
            }

        }elseif($request->registration_type == 'google'){

            $validator = Validator::make($request->all(), [
                'registration_type' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = StudentProfile::create($input);
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;
            $user->remember_token = $success['token'];
            $user->save();
            $user->assignRole('Student');
            if(isset($user)){
                $this->send_eamil($user['email'] , $user['registration_type']);
            }

        }elseif($request->registration_type == 'facebook'){

            $validator = Validator::make($request->all(), [
                'registration_type' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = StudentProfile::create($input);
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;
            $user->remember_token = $success['token'];
            $user->save();
            $user->assignRole('Student');
            if(isset($user)){
                $this->send_eamil($user['email'] , $user['registration_type']);
            }

        }elseif($request->registration_type == 'apple'){

            $validator = Validator::make($request->all(), [
                'registration_type' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = StudentProfile::create($input);
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;
            $user->remember_token = $success['token'];
            $user->save();
            $user->assignRole('Student');
            if(isset($user)){
                $this->send_eamil($user['email'] , $user['registration_type']);
            }

        }

        return response()->json(['success', 'Student register successfully.']);
    }
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if($request->registration_type == 'email'){

            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required',
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = Auth::user();

                $success['token'] =  $user->createToken('MyApp')->plainTextToken;
                $success['user'] =  $user;
                if($user->email_verified == 0){
                    $success['email_verified'] = false;
                }else{
                    $success['email_verified'] = true;
                }
                return $this->sendResponse($success, 'User login successfully.');
            }
            else{
                return $this->sendError('Unauthorised.', ['error'=>'Email Or Password Invalid.']);
            }

        }elseif($request->registration_type == 'phone'){

            $validator = Validator::make($request->all(), [
                'phone' => 'required',
                'password' => 'required',
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            if(Auth::attempt(['phone' => $request->phone, 'password' => $request->password])){
                $user = Auth::user();

                $success['token'] =  $user->createToken('MyApp')->plainTextToken;
                $success['user'] =  $user;
                if($user->email_verified == 0){
                    $success['email_verified'] = false;
                }else{
                    $success['email_verified'] = true;
                }
                return $this->sendResponse($success, 'User login successfully');
            }
            else{
                return $this->sendError('Unauthorised.', ['error'=>'Email Or Password Invalid.']);
            }

        }elseif($request->registration_type == 'google'){
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required',
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = Auth::user();

                $success['token'] =  $user->createToken('MyApp')->plainTextToken;
                $success['user'] =  $user;
                if($user->email_verified == 0){
                    $success['email_verified'] = false;
                }else{
                    $success['email_verified'] = true;
                }
                return $this->sendResponse($success, 'User login successfully.');
            }
            else{
                return $this->sendError('Unauthorised.', ['error'=>'Email Or Password Invalid.']);
            }
        }elseif($request->registration_type == 'facebook'){
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required',
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = Auth::user();

                $success['token'] =  $user->createToken('MyApp')->plainTextToken;
                $success['user'] =  $user;
                if($user->email_verified == 0){
                    $success['email_verified'] = false;
                }else{
                    $success['email_verified'] = true;
                }
                return $this->sendResponse($success, 'User login successfully.');
            }
            else{
                return $this->sendError('Unauthorised.', ['error'=>'Email Or Password Invalid.']);
            }
        }elseif($request->registration_type == 'apple'){
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required',
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = Auth::user();

                $success['token'] =  $user->createToken('MyApp')->plainTextToken;
                $success['user'] =  $user;
                if($user->email_verified == 0){
                    $success['email_verified'] = false;
                }else{
                    $success['email_verified'] = true;
                }
                return $this->sendResponse($success, 'User login successfully.');
            }
            else{
                return $this->sendError('Unauthorised.', ['error'=>'Email Or Password Invalid.']);
            }
        }

    }

    public function email_verified(Request $request)
    {
        if($request->email){
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'email_otp' => 'required',
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $data = StudentProfile::where('email',$request->email)->first();
            if($data){
                if($data->email_otp == $request->email_otp){
                    $data->email_verified = 1;
                    $data->save();
                    return $this->sendResponse('Email', 'Email OTP Verified successfully.');
                }else{
                    return $this->sendResponse($data, 'Invalid OTP');
                }
            }else{
                return $this->sendResponse('Email', 'Invalid Email');
            }
        }elseif($request->phone){
            $validator = Validator::make($request->all(), [
                'phone' => 'required',
                'phone_otp' => 'required',
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $data = StudentProfile::where('phone',$request->phone)->first();
            if($data){
                if($data->phone_otp == $request->phone_otp){
                    $data->email_verified = 1;
                    $data->save();
                    return response()->json(["Phone", "Phone OTP Verified successfully"]);
                }else{
                    return response()->json([$data, 'Invalid OTP']);
                }
            }else{
                return response()->json(['Phone', 'Invalid Phone Number']);
            }
        }
    }

    public function send_eamil($detail , $type)
    {

        if($type == 'phone'){
            $user = StudentProfile::where('phone',$detail)->first();
            try {
                $data = array();
                $receiverNumber = $detail;

                $account_sid = getenv("TWILIO_SID");
                $auth_token = getenv("TWILIO_TOKEN");
                $twilio_number = getenv("TWILIO_FROM");

                $data = [
                    'conform_id' => date("is"),
                ];

                $client = new Client($account_sid, $auth_token);
                $client->messages->create($receiverNumber, [
                    'from' => $twilio_number,
                    'body' => $data]);

            } catch (Exception $e) {
                info("Error: ". $e->getMessage());
            }
            $user->phone_otp = $data['conform_id'];
            $user->save();

        }elseif($type == 'email'){

            $user = StudentProfile::where('email',$detail)->first();
            $data = array();

            $data = [
                    'conform_id' => date("is"),
                ];
            if(isset($user)){
                    Mail::send('email.email', $data, function($message) use ($user, $data) {
                        $message->to($user['email'], $user['name'])->subject
                        ('Your OTP is' .$data['conform_id']. '. ');
                });
            }
            $user->email_otp = $data['conform_id'];
            $user->save();
        }

    }

    public function resendOtp(Request $request)
    {
        if($request->phone){

            $user = StudentProfile::where('phone',$request->phone)->first();
            if(! $user)
            {
                return response()->json(["message"=>false,"data"=>"User Not Found"]);
            }
            try {
                $data = array();
                $receiverNumber = $user->phone;

                $account_sid = getenv("TWILIO_SID");
                $auth_token = getenv("TWILIO_TOKEN");
                $twilio_number = getenv("TWILIO_FROM");

                $data = [
                    'conform_id' => date("is"),
                ];

                $client = new Client($account_sid, $auth_token);
                $client->messages->create($receiverNumber, [
                    'from' => $twilio_number,
                    'body' => $data]);

            } catch (Exception $e) {
                info("Error: ". $e->getMessage());
            }
            $user->phone_otp = $data['conform_id'];
            $user->save();

        }elseif($request->email){

            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'email_otp' => 'required',
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }


            $user = StudentProfile::where('email',$request->email)->first();
            if(!$user)
            {
                return response()->json(["message"=>false,"data" =>"user Not Found"]);
            }
            $data = array();


            $data = [
                    'conform_id' => date("is"),
                ];
            if(isset($user)){
                    Mail::send('email.email', $data, function($message) use ($user, $data) {
                        $message->to($user['email'], $user['name'])->subject
                        ('Your OTP is' .$data['conform_id']. '. ');
                });
                if (Mail::failures()) {
                    print_r(Mail::failures());
                  }
            }
            $user->email_otp = $data['conform_id'];
            $user->save();
        }
        return response()->json(['success', 'OTP Resend successfully.']);

    }

    public function changePassword(Request $request)
    {
        if($request->email){
            
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required',
                // 'c_password' => 'required|same:password',
            ]);

            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $user = StudentProfiles::where('email',$request->email)->first();
            $old_password = $user->password;
            $new_password = $request['password'];


            if(Hash::check($new_password, $old_password)){
                $user->password =  bcrypt($request['password']);
                $user->save();
                return response()->json([$user, 'Password Changed Successfully']);

            }else{
                return response()->json(['Email', 'Invalid Email']);
            }
        }else{
            $validator = Validator::make($request->all(), [
                'email' => 'required',
            ]);
            
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());
            }
    
            $user = StudentProfiles::where('phone',$request->phone)->first();
            $old_password = $user->password;
            $new_password = $request['password'];
    
    
            if(Hash::check($new_password, $old_password)){
                $user->password =  bcrypt($request['password']);
                $user->save();
                return response()->json([$user, 'Password Changed Successfully']);
            }else{
                return response()->json(['Phone', 'Invalid Phone Number']);
            }
        }
        

    }

    public function user_update(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'last_name' => 'required',
        //     'first_name' => 'required',
        //     'teacher_id' => 'required',
        //     'user_type' => 'required',
        //     'course' => 'required',
        //     'age' => 'required',
        //     'language' => 'required',
        //     'gender' => 'required',
        //     'class_type' => 'required',
        //     'price_type' => 'required',
        //     'price' => 'required',
        //     'available_times' => 'required',
        //     'package_type' => 'required',
        // ]);

        // if($validator->fails()){
        //     return $this->sendError('Validation Error.', $validator->errors());
        // }

        $user = StudentProfile::where('id', '=' , $request->id)->first();
        
        if(isset($user)){
            if($request->first_name){
                $user->first_name = $request->first_name;
            }
            if($request->last_name){
                $user->last_name = $request->last_name;
            }
            if($request->language){
                $user->language = $request->language;
            }
            if($request->email){
                $user->email = $request->email;
            }
            if($request->phone){
                $user->phone = $request->phone;
            }
            if($request->teacher_id){
                $user->teacher_id = $request->teacher_id;
            }
            if($request->user_type){
                $user->user_type = $request->user_type;
            }
            if($request->gender){
                $user->gender = $request->gender;
            }
            if($request->course){
                $user->course = implode(',' , $request->course);
            }
            if($request->class_type){
                $user->class_type = $request->class_type;
            }
            if($request->age){
                $user->age = $request->age;
            }
            if($request->price_type){
                $user->price_type = $request->price_type;
            }
            if($request->price){
                $user->price = $request->price;
            }
            if($request->available_times){
                $user->available_times = json_encode($request->available_times);
            }
            if($request->package_type){
                $user->package_type = $request->package_type;
            }
            if($request->student_id){
                $user->student_id = $request->student_id;
            }
            if($request->address){
                $user->address = $request->address;
            }
            if($request->country_name){
                $user->country_name = $request->country_name;
            }
            if($request->level){
                $user->level = $request->level;
            }
            if($request->total_male){
                $user->total_male = $request->total_male;
            }
            if($request->total_female){
                $user->total_female = $request->total_female;
            }
            if($request->total_child){
                $user->total_child = $request->total_child;
            }
            if($request->individual_child){
                $user->individual_child = implode(',' , $request->individual_child);
            }
            if($request->group_child){
                $user->group_child = implode(',' , $request->group_child);
            }
            if($request->profile){

                $files = $request->file('profile');
                $ext = '.'.$files->getClientOriginalExtension();
                $fileName = str_replace($ext, time() . $ext, $request->profile->getClientOriginalName());
                $destinationPath= public_path().'/images' ;
                $files->move($destinationPath,$fileName);
                $user->profile = $fileName;
            }
            $user->save();
            return response()->json(['success', 'User Updated successfully']);
        }else{
            return response()->json(['danger', 'Invalid User']);
        }
    }

    // public function studentChild(Request $request)
    // {
    //     // return $request;
    //     // $validator = Validator::make($request->all(), [
    //     //     'last_name' => 'required',
    //     //     'first_name' => 'required',
    //     //     'email' => 'required|email|unique:users',
    //     //     'password' => 'required',
    //     //     'teacher_id' => 'required',
    //     //     'user_type' => 'required',
    //     //     'course' => 'required',
    //     //     'age' => 'required',
    //     //     'language' => 'required',
    //     //     'gender' => 'required',
    //     //     'class_type' => 'required',
    //     //     'price_type' => 'required',
    //     //     'price' => 'required',
    //     //     'available_times' => 'required',
    //     //     'package_type' => 'required',
    //     // ]);

    //     // if($validator->fails()){
    //     //     return $this->sendError('Validation Error.', $validator->errors());
    //     // }
        
    //     foreach($request as $key=>$req){
    //         $child_student = new StudentProfile();
    //         $child_student->first_name = $req->first_name;
    //         $child_student->last_name = $req->last_name;
    //         $child_student->language = $req->language;
    //         if($req->phone){
    //             $child_student->phone = $req->phone;
    //         }
    //         if($req->email){
    //             $child_student->email = $req->email;
    //         }
    //         $child_student->password = bcrypt($req['password']);
    //         $child_student->teacher_id = $req->teacher_id;
    //         $child_student->user_type = $req->user_type;
    //         $child_student->gender = $req->gender;
    //         $child_student->course = implode(',' , $req->course);
    //         $child_student->class_type = $req->class_type;
    //         $child_student->age = $req->age;
    //         $child_student->price_type = $req->price_type;
    //         $child_student->price = $req->price;
    //         $child_student->available_times = json_encode($req->available_times);
    //         $child_student->package_type = $req->package_type;
    //         $child_student->student_id = $req->student_id;
    //         $child_student->address = $req->address;
    //         $child_student->country_name = $req->country_name;
    //         $child_student->level = $req->level;
    //         $child_student->total_male = $req->total_male;
    //         $child_student->total_female = $req->total_female;
    //         $child_student->total_child = $req->total_child;
    //         $child_student->individual_child = implode(',' , $req->individual_child);
    //         $child_student->group_child = implode(',' , $req->group_child);

    //         $files = $req->file('profile');
    //         $ext = '.'.$files->getClientOriginalExtension();
    //         $fileName = str_replace($ext, time() . $ext, $req->profile->getClientOriginalName());
    //         $destinationPath= public_path().'/images' ;
    //         $files->move($destinationPath,$fileName);
    //         $child_student->profile = $fileName;

    //         $child_student->save();
    //     }
    //     return response()->json(['success', 'Child User Register successfully']);
    // }

    public function studentProfile($id)
    {
        $student_profiles=StudentProfile::where('id' , '=' , $id )->first();
        return response()->json($student_profiles , 200);
    }

    public function forgetPassword(Request $request)
    {
        if($request->email)
        {
            $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            ]);

            if($validator->fails())
            {
                return $this->sendError("Validation Error",$validator->errors());
            }
            $user = StudentProfile::where('email', $request->email)->first();
            if(!empty($user)){
                $this->send_eamil($user->email,'email');
            }else{
                return response()->json(["message"=>"Not Found email"]);
            }
            return response()->json(["message"=>false, "data"=>"User Not Found"]);
        }
        else if($request->phone)
        {
            $validator = Validator::make($request->all(), [
            'phone' => 'required|email',
            ]);

            if($validator->fails())
            {
            return $this->sendError("Validation Error",$validator->errors());
            }
            $user = StudentProfile::where('phone',$request->phone)->first();
            if(!empty($user)){
                $this->send_eamil($user->phone ,'phone');
            }else{
                return response()->json(["message"=>false, "data"=>"User Not Found"]);
            }
            return response()->json(["message"=>false, "data"=>"User Not Found"]);
        }
    }
        public function getStudentPackages()
        {
            $student_packages = Student_Package::all();
            if(!$student_packages)
            {
                return response()->json(['data'=>false , 'message'=>'User Not Found'],404);
            }
            return response()->json(['data'=> $student_packages],200);
        }

}
