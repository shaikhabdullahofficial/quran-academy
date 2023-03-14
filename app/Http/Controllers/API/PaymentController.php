<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Payment_Detail;

class PaymentController extends Controller
{
    
    public function paymentDetail(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'student_id' => 'required',
            'payment_method' => 'required',
            'name_on_card' => 'required',
            'card_number' => 'required',
            'valid_date' => 'required',
            'CVV_code' => 'required',
        ]);

        if($validate->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $payment_detail = new Payment_Detail();
        $payment_detail->student_id = $request->student_id;
        $payment_detail->payment_method = $request->payment_method;
        $payment_detail->stripe_id = $request->stripe_id;
        $payment_detail->name_on_card = $request->name_on_card;
        $payment_detail->card_number = $request->card_number;
        $payment_detail->valid_date = $request->valid_date;
        $payment_detail->CVV_code = $request->CVV_code;
        $payment_detail->save();

        return response()->json(['success' , 'Payment Detail Submitted Successfully']);
    }

    public function paymentSummary($id)
    {
        $payment_detail = Payment_Detail::where('student_id' , '=' , $id)->with('hasStudent')->first();
        return $payment_detail;
        return response()->json($payment_detail , 200);
    }
}
