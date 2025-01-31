<?php

namespace App\Http\Controllers;
use App\Mail\FishermanMail;
use App\Models\forgot_password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Users;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function sendmail(Request $request){
        // validate 
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
        ]);

        if($validator->fails()){ 
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }else{
            $user = Users::where('email', $request->email)->first();
            if(!$user){
                return response()->json(['status' => false, 'message' => 'Email is not found'], 404);
            }else{ 
                $forgot_password = new forgot_password(); 
                $forgot_password->user_id = $user->id;
                $one_time_password = Str::random(60);
                // if user email is registerd in the database, reset password is allowed
                $forgot_password->token = $one_time_password;
                $forgot_password->save(); 
                Mail::to($request->email)->send(new FishermanMail($one_time_password));
                return response()->json(['status' => true, 'message' => 'Mail Sent']);
            }
        }
    }
}
