<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function seller_profile()
    {
        $user = AuthHelper::auth();


        return view('profile_seller', compact('user'));
    }


    public function user_profile()
    {
        $user = AuthHelper::auth();
        return view('profile_user', compact('user'));
    }

    public function update_basic_profile(Request $request)
    {
        // Define custom error messages
        $messages = [
            'username.required' => 'The username field is required.',
            'username.min' => 'The username must be at least 4 characters.',
            'username.max' => 'The username may not be greater than 12 characters.',
            'username.unique' => 'The username has already been taken.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
        ];

        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:4|max:20|unique:users,username,' . AuthHelper::id(),
            'email' => 'required|email|unique:users,email,' . AuthHelper::id(),
        ], $messages);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // Retrieve the authenticated user
        $user = AuthHelper::user();

        // Update user profile
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();

        // Return success response
        return response()->json([
            'status' => true,
            'message' => 'Profile updated successfully.',
        ]);
    }

    public function update_contact_details(Request $request)
    {
        // Define custom error messages for the new fields
        $messages = [
            'address.required' => 'The address field is required.',
            'address.max' => 'The address may not be greater than 3]255 characters.',
            'address.string' => 'The address must be text.',
            'first_phone.regex' => 'The first phone number must be a valid phone number.',
            'second_phone.regex' => 'The second phone number must be a valid phone number.',
        ];

        // Validate incoming request data for address and phone numbers
        $validator = Validator::make($request->all(), [
            'address' => 'required|string|max:255',
            'first_phone' => [
                'regex:/^(\+95[6-9]\d{6,9}|\+81[789]0\d{4}\d{4})?$/'
            ],
            'second_phone' => [
                'regex:/^(\+95[6-9]\d{6,9}|\+81[789]0\d{4}\d{4})?$/'
            ],
        ], $messages);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        // Retrieve the authenticated user
        $user = AuthHelper::user();

        // Update address and phone numbers
        $user->address = $request->address;
        $user->first_phone = $request->first_phone;
        $user->second_phone = $request->second_phone;
        $user->save();

        // Return success response
        return response()->json([
            'status' => true,
            'message' => 'Address and phone numbers updated successfully.',
        ]);
    }
}
