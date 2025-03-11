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

    public function wishListDetail($wishListID)
    {
        $wishList = wishList::findOrFail($wishListID);
        // dd($contact);
        return view('admin.wishList-detail', compact('wishList'));
    }

    public function wishList(Request $request){
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

        $errors = [];

        if($request->input('wish_phone') != null ){
            $request->merge([
                'wish_phone' => $request->input('wish_phone_extension') . $request->input('wish_phone'),
            ]);
            $phoneRegexJapan = '/^\+81[789]0\d{4}\d{4}$/';
            $phoneRegexMyanmar = '/^\+95[6-9]\d{6,9}$/';
                // Validate first phone number
            if ($request->input('wish_phone_extension') === '+81' && !preg_match($phoneRegexJapan, $request->input('wish_phone'))) {
                    $errors['wish_phone'] = 'Invalid phone number.';
             } elseif ($request->input('wish_phone_extension') === '+95' && !preg_match($phoneRegexMyanmar, $request->input('wish_phone'))) {
                    $errors['wish_phone'] = 'Invalid phone number.';
            }
        }


        if($validator->fails() || !empty($errors)){
            $allErrors = array_merge($validator->errors()->toArray(), $errors);
            return response()->json(['status' => false, 'errors' => $allErrors]);
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
