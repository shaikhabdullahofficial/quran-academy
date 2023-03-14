<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Student_Wallet;
use App\Models\Payment_Detail;


class StudentWalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $student_wallet = Student_Wallet::where('id' , $id)->with('hasWallet')->first();
        return response()->json($student_wallet , 200);
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
        
        $student_wallet = Student_Wallet::where('student_id' , $request->student_id)->first();

        if(isset($student_wallet)){
            $validate = Validator::make($request->all(), [
                'student_id' => 'required',
                'wallet_price' => 'required',
            ]);
    
            if($validate->fails()){
                return response()->sendError('validatorError' , $validator->errors());
            }

            if(isset($request->student_id)){
                $student_wallet->student_id = $request->student_id;
            }
            if(isset($request->payment_method)){
                $student_wallet->payment_method = $request->payment_method;
            }
            if(isset($request->wallet_price)){
                $student_wallet->wallet_price = $request->wallet_price;
            }
            $student_wallet->update();

            if(isset($student_wallet)){
                $payment_detail = Payment_Detail::where('wallet_id' , $student_wallet->id)->first();
                if(isset($request->student_id)){
                    $payment_detail->student_id = $request->student_id;
                }
                if(isset($student_wallet->id)){
                    $payment_detail->wallet_id = $student_wallet->id;
                }
                if(isset($request->payment_method)){
                    $payment_detail->payment_method = $request->payment_method;
                }
                if(isset($request->stripe_id)){
                    $payment_detail->stripe_id = $request->stripe_id;
                }
                if(isset($request->name_on_card)){
                    $payment_detail->name_on_card = $request->name_on_card;
                }
                if(isset($request->card_number)){
                    $payment_detail->card_number = $request->card_number;
                }
                if(isset($request->valid_date)){
                    $payment_detail->valid_date = $request->valid_date;
                }
                if(isset($request->CVV_code)){
                    $payment_detail->CVV_code = $request->CVV_code;
                }
                $payment_detail->update();
            }
        }else{
            $validate = Validator::make($request->all(), [
                'student_id' => 'required',
                'payment_method' => 'required',
                'wallet_price' => 'required',
                'name_on_card' => 'required',
                'card_number' => 'required',
                'valid_date' => 'required',
                'CVV_code' => 'required',
            ]);
    
            if($validate->fails()){
                return response()->sendError('validatorError' , $validator->errors());
            }

            $student_wallet = new Student_Wallet();
            $student_wallet->student_id = $request->student_id;
            $student_wallet->payment_method = $request->payment_method;
            $student_wallet->wallet_price = $request->wallet_price;
            $student_wallet->save();

            if(isset($student_wallet)){
                $payment_detail = new Payment_Detail();
                $payment_detail->student_id = $request->student_id;
                $payment_detail->wallet_id = $student_wallet->id;
                $payment_detail->payment_method = $request->payment_method;
                $payment_detail->stripe_id = $request->stripe_id;
                $payment_detail->name_on_card = $request->name_on_card;
                $payment_detail->card_number = $request->card_number;
                $payment_detail->valid_date = $request->valid_date;
                $payment_detail->CVV_code = $request->CVV_code;
                $payment_detail->save();
            }
        }

        return response()->json(['success' , 'Student Wallet Submitted Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student_Wallet  $student_Wallet
     * @return \Illuminate\Http\Response
     */
    public function show(Student_Wallet $student_Wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student_Wallet  $student_Wallet
     * @return \Illuminate\Http\Response
     */
    public function edit(Student_Wallet $student_Wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student_Wallet  $student_Wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student_Wallet $student_Wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student_Wallet  $student_Wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student_Wallet $student_Wallet)
    {
        //
    }
}
