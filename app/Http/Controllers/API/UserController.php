<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\OtpModel;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function send_otp(Request $request)
    {
        $request->validate([
            'number'=>"required|max:10"
        ]);

        try{
            $otp = rand(1000,9999);
            $check = OtpModel::updateOrCreate(
                    ['number'=>$request->number],
                    [
                        'otp'=>$otp,
                        'expries_at'=>now()->addMinutes(5)
                    ]
                );
            if($check){
                return response()->json([
                    'message'=>"OTP sent Successfully",
                ],200);
            }
        }catch(Exception $e){
            return response()->json([
                'message'=>$e->getMessage()
            ],500);
        }   
    }
}
