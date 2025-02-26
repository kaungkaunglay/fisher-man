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
            'name.required' => 'The name field is required.',
            'phone.required' => 'The phone field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'description.required' => 'The description field is required.',
            'g-recaptcha-response.required' => 'The reCAPTCHA field is required.',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'description' => 'required',
            'g-recaptcha-response' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }


        $contact = Contact::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'description' => $request->description,
        ]);


        Mail::to($request->email)->send(new ThankYouMail($contact));

        return response()->json(['status' => true, 'message' => 'Your message has been sent successfully!']);
    }
}
