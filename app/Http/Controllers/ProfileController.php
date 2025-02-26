<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function seller_profile()
    {
        $user = AuthHelper::auth();
        $products = $user->products()->paginate(12);

        return view('profile_seller', compact('user', 'products'));
    }

    public function user_profile()
    {
        $user = AuthHelper::auth();
        return view('profile_user', compact('user'));
    }

    public function update_basic_profile(Request $request)
    {
        $messages = [
            'username.min' => 'The username must be at least 4 characters.',
            'username.max' => 'The username may not be greater than 20 characters.',
            'username.unique' => 'The username has already been taken.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'avatar.image' => 'The avatar must be an image.',
            'avatar.mimes' => 'The avatar must be a JPEG, JPG, or PNG image.',
            'avatar.max' => 'The avatar must be less than 2MB.',
        ];

        $validator = Validator::make($request->all(), [
            'username' => 'sometimes|min:4|max:20|unique:users,username,' . AuthHelper::id(),
            'email' => 'sometimes|email|unique:users,email,' . AuthHelper::id(),
            'avatar' => 'sometimes|image|mimes:jpeg,jpg,png|max:2048',
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }

        $user = AuthHelper::user();

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '_' . $avatar->getClientOriginalName();


            \Storage::disk('public')->putFile('avatars', $avatar, $avatarName);


            if ($user->avatar) {
                \Storage::disk('public')->delete('avatars/' . $user->avatar);
            }

            $user->avatar = $avatarName;
            $user->save();
        }

        $user->update([
            'username' => $request->username ?? $user->username,
            'email' => $request->email ?? $user->email,
            'first_org_name' => $request->first_org_name ?? $user->first_org_name,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Profile updated successfully.');

        return response()->json(['status' => true, 'message' => 'Profile updated successfully.']);
    }


    public function update_contact_details(Request $request)
    {
        $messages = [
            'address.max' => 'The address may not be greater than 255 characters.',
            'address.string' => 'The address must be text.',
            'first_phone.regex' => 'The first phone number must be a valid phone number.',
            'second_phone.regex' => 'The second phone number must be a valid phone number.',
        ];

        $validator = Validator::make($request->all(), [
            'address' => 'sometimes|string|max:255',
            'first_phone' => 'sometimes|nullable|string|min:10|max:15',
            'second_phone' => 'sometimes|nullable|string|min:10|max:15',
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }

        $user = AuthHelper::user();

        $user->update([
            'address' => $request->address ?? $user->address,
            'first_phone' => $request->first_phone ?? $user->first_phone,
            'second_phone' => $request->second_phone ?? $user->second_phone,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Contact details updated successfully.'); // More specific message

        return response()->json(['status' => true, 'message' => 'Contact details updated successfully.']);
    }
}
