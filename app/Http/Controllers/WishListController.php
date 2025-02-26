<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ThankYouMailforWishList;
use App\Models\wishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class WishListController extends Controller
{
    public function wishList(Request $request){
        logger($request);
        $messages = [
            'wish_name.required' => 'The name field is required.',
            'wish_phone.required' => 'The phone field is required.',
            'wish_email.required' => 'The email field is required.',
            'wish_email.email' => 'The email must be a valid email address.',
            'wish_description.required' => 'The description field is required.',
            'g-recaptcha-response.required' => 'The reCAPTCHA field is required.',
        ];

        $validator = Validator::make($request->all(), [
            'wish_name' => 'required',
            'wish_phone' => 'required',
            'wish_email' => 'required|email',
            'wish_description' => 'required',
            'g-recaptcha-response' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        
        $wishList = wishList::create([
            'name' => $request->wish_name,
            'phone' => $request->wish_phone,
            'email' => $request->wish_email,
            'description' => $request->wish_description,
        ]);
        
        Mail::to($request->wish_email)->send(new ThankYouMailforWishList($wishList));
        
        return response()->json(['status' => true, 'message' => 'Your message has been sent successfully!']);
    }
}
