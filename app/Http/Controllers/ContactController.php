<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ThankYouMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function contactDetail($contactID)
    {
        $contact = Contact::findOrFail($contactID);
        // dd($contact);
        return view('admin.contact-detail', compact('contact'));
    }

    public function contact(Request $request){
        $messages = [
            'name.required' => '名前は必須です。',
            'phone.required' => '電話番号は必須です。',
            'email.required' => 'メールアドレスは必須です。',
            'email.email' => '有効なメールアドレスを入力してください。',
            'description.required' => '説明は必須です。',
            'g-recaptcha-response.required' => 'reCAPTCHAは必須です。',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'description' => 'required',
            'g-recaptcha-response' => 'required'
        ], $messages);

        $errors = [];

        if($request->input('phone') != null ){
            // $request->merge([
            //     'phone' => $request->input('phone_extension') . $request->input('phone'),
            // ]);
            $phone = "+81" . $request->input('phone');
            $phoneRegexJapan = '/^\+81[789]0\d{4}\d{4}$/';
            // $phoneRegexMyanmar = '/^\+95[6-9]\d{6,9}$/';
                // Validate first phone number
            // if ($request->input('phone_extension') === '+81' && !preg_match($phoneRegexJapan, $request->input('phone'))) {
            //         $errors['phone'] = 'Invalid phone number.';
            //  } elseif ($request->input('phone_extension') === '+95' && !preg_match($phoneRegexMyanmar, $request->input('phone'))) {
            //         $errors['phone'] = 'Invalid phone number.';
            // }
            if (!preg_match($phoneRegexJapan, $phone)) {
                $errors['phone'] = 'Invalid phone number.';
             }
        }

        if($validator->fails() || !empty($errors)){
            $allErrors = array_merge($validator->errors()->toArray(), $errors);
            return response()->json(['status' => false, 'errors' => $allErrors]);
        }


        $contact = Contact::create([
        'name' => $request->name,
        'phone' => "+81" . $request->phone,
        'email' => $request->email,
        'description' => $request->description,
        ]);


        Mail::to($request->email)->send(new ThankYouMail($contact));

        return response()->json(['status' => true, 'message' => 'Your message has been sent successfully!']);
    }
}
