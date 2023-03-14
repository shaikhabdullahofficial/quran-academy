<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Zoommeeting;
class ZoomController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'teacher_id' => 'required',
    ]);
    if($validator->fails()){
        return $this->sendError('Validation Eroor',$validator->errors());
    }
    $data = Zoommeeting::where('teacher_id',$request->teacher_id)->get();

    return $this->sendResponse($data, 'Teacher All Zoom Links.');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'teacher_id' => 'required',
            'zoom_link' => 'required',
            'class_time' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $input = $request->all();
        $zoom = Zoommeeting::create($input);

        return $this->sendResponse($zoom, 'Zoom Class Added successfully.');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function zoom_link(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'zoom_id' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Eroor',$validator->errors());
        }

        $data = Zoommeeting::where('id',$request->zoom_id)->first();
        return $this->sendResponse($data, 'Teacher All Zoom Links.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'zoom_id' => 'required',
    ]);

    if($validator->fails()){
        return $this->sendError('Validation Eroor',$validator->errors());
    }
    $data = Zoommeeting::where('id',$request->zoom_id)->first();
   if(isset($data)){
        if($request->zoom_link){
            $data->zoom_link = $request->zoom_link;
        }
        if($request->class_time){
            $data->class_time = $request->class_time;
        }
        $data->save();
        return $this->sendResponse($data, 'Teacher All Zoom Links.');
   } else{
    $data = array('link'=> 'Data Not Found.');
    return $this->sendResponse($data, 'Data Not Found.');
   }


}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'zoom_id' => 'required',
    ]);
    if($validator->fails()){
        return $this->sendError('Validation Eroor',$validator->errors());
    }
       $data = Zoommeeting::where('id',$request->id)->delete();
       if($data == true){
        $user = array( 'data' => 'Zoom Meating Deleted.');
        return $this->sendResponse($user, 'Zoom Meating Deleted.');
       }else{
        $user = array( 'data' => 'Zoom Meating Not Deleted.');
        return $this->sendResponse($user, 'Zoom Meating Not Deleted.');
       }

    }
}
