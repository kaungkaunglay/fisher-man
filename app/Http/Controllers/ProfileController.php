<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Helpers\AuthHelper;
use Illuminate\Http\Request;
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function seller_profile()
    {
        $user = AuthHelper::auth();
        $products = $user->products()->paginate(12);

        [$user->firstExtension, $user->firstNumber] = $this->splitPhoneNumber($user->first_phone ?? '');
        [$user->secondExtension, $user->secondNumber] = $this->splitPhoneNumber($user->second_phone ?? '');

        return view('profile_seller', compact('user', 'products'));
    }

    public function user_profile()
    {
        $user = AuthHelper::auth();
        $hasShopRequest = $user->shop()->exists();

        [$user->firstExtension, $user->firstNumber] = $this->splitPhoneNumber($user->first_phone ?? '');
        [$user->secondExtension, $user->secondNumber] = $this->splitPhoneNumber($user->second_phone ?? '');



        return view('profile_user', compact('user','hasShopRequest'));
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

            $existing_avatar = 'assets/avatars/'.$user->avatar;

            $avatar = $request->file('avatar');
            $avatarName = time() . '_' . $avatar->getClientOriginalName();


            if ($user->avatar && file_exists(public_path($existing_avatar))) {

                unlink(public_path($existing_avatar));

            }

            $avatar = $request->file('avatar');

            $destinationPath = public_path('assets/avatars');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $avatarName = time() . '_' . $avatar->getClientOriginalName();

            $avatar->move($destinationPath, $avatarName);

            $user->avatar = $avatarName;
            $user->save();

        }

        $verification = EmailVerification::where('user_id', $user->id)->latest()->first();

        if ($user->email !== $request->email && $verification) {
            $verification->update([
                'verified_at' => null,
                'token' => null,
                'token_expire_at' => null,
            ]);
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


    // public function update_contact_details(Request $request)
    // {

    //     $user = AuthHelper::user();

    //     if($user->address === $request->address && $user->first_phone === $request->first_phone && $user->second_phone === $request->second_phone ){
    //         return response()->json(['status' => false, 'message' => 'Nothing to change']);
    //     }

    //     $messages = [
    //         'address.max' => 'The address may not be greater than 255 characters.',
    //         'address.string' => 'The address must be text.',
    //         'first_phone.regex' => 'The first phone number must be a valid phone number.',
    //         'second_phone.regex' => 'The second phone number must be a valid phone number.',
    //     ];

    //     $errors = [];

    //     if($request->input('first_phone') != null ){
    //         // $request->merge([
    //         //     'first_phone' => $request->input('first_phone_extension') . $request->input('first_phone'),
    //         // ]);
    //         $first_phone = "+81". $request->input('first_phone');
    //         $phoneRegexJapan = '/^\+81[789]0\d{4}\d{4}$/';
    //         // $phoneRegexMyanmar = '/^\+95[6-9]\d{6,9}$/';
    //             // Validate first phone number
    //         // if ($request->input('first_phone_extension') === '+81' && !preg_match($phoneRegexJapan, $request->input('first_phone'))) {
    //         //     $errors['first_phone'] = 'Invalid phone number.';
    //         //  } elseif ($request->input('first_phone_extension') === '+95' && !preg_match($phoneRegexMyanmar, $request->input('first_phone'))) {
    //         //     $errors['first_phone'] = 'Invalid phone number.';
    //         // }

    //         if (!preg_match($phoneRegexJapan, $first_phone)) {
    //             $errors['first_phone'] = 'Invalid phone number.';
    //          }
    //     }

    //     if($request->input('second_phone') != null ){
    //         // $request->merge([
    //         //     'second_phone' => $request->input('second_phone_extension') . $request->input('second_phone'),
    //         // ]);


    //         $phoneRegexJapan = '/^\+81[789]0\d{4}\d{4}$/';
    //         $phoneRegexMyanmar = '/^\+95[6-9]\d{6,9}$/';
    //             // Validate second phone number
    //         if ($request->input('second_phone_extension') === '+81' && !preg_match($phoneRegexJapan, $request->input('second_phone'))) {
    //             $errors['second_phone'] = 'Invalid phone number.';
    //         } elseif ($request->input('second_phone_extension') === '+95' && !preg_match($phoneRegexMyanmar, $request->input('second_phone'))) {
    //             $errors['second_phone'] = 'Invalid phone number.';
    //         }
    //     }

    //     $validator = Validator::make($request->all(), [
    //         'address' => 'sometimes|string|max:255',
    //         'first_phone' => 'sometimes|nullable|string|min:10|max:15',
    //         'second_phone' => 'sometimes|nullable|string|min:10|max:15',
    //     ], $messages);

    //     if($validator->fails() || !empty($errors)){
    //         $allErrors = array_merge($validator->errors()->toArray(), $errors);
    //         return response()->json(['status' => false, 'errors' => $allErrors]);
    //     }


    //     $user->update([
    //         'address' => $request->address ?? $user->address,
    //         'first_phone' => $request->first_phone ?? $user->first_phone,
    //         'second_phone' => $request->second_phone ?? $user->second_phone,
    //     ]);

    //     session()->flash('status', 'success');
    //     session()->flash('message', 'Contact details updated successfully.'); // More specific message

    //     return response()->json(['status' => true, 'message' => '連絡先の詳細が正常に更新されました。.']);
    // }

    public function update_contact_details(Request $request)
    {
        logger($request->all());
        try {
            $user = AuthHelper::user();

            if ($this->hasNoChanges($user, $request)) {
                return response()->json([
                    'status' => true,
                    'message' => 'No change',
                ]);
    
            }

            $validationRules = [
                'address' => 'sometimes|string|max:255',
                'postalCode' => 'nullable|regex:/^\d{3}-?\d{4}$/',
                // ^\d{3}-\d{4}$
                // 'first_phone' => 'sometimes|nullable|numeric|min:10',
                // 'first_phone_extension' => 'sometimes|in:+81,+95',
                // 'second_phone' => 'sometimes|nullable|numeric|min:10|different:first_phone',
                // 'second_phone_extension' => 'sometimes|in:+81,+95',
            ];

            $validationMessages = [
                'address.max' => '住所は255文字を超えることはできません。',
                'address.string' => '住所はテキストでなければなりません。',
                'postalCode.regex' => '郵便番号は123-4567または1234567の形式でなければなりません。',
                // 'postalCode.regex' => 'postal code must be in the format 123-4567 or 1234567.',
                // 'postalCode.'
                // 'first_phone_extension.in' => '最初の電話番号の国コードが無効です。',
                // 'second_phone_extension.in' => '2番目の電話番号の国コードが無効です。'
            ];

            // $request->merge([
            //     'postalCode' => str_replace('-', '', $request->postal_code),
            // ]);

            // logger($request->postalCode);

            // $processedData = $this->processPhoneNumbers($request);
            // $request->merge($processedData);

            $validator = Validator::make($request->all(), $validationRules, $validationMessages);

            // $phoneErrors = $this->validatePhoneNumbers($request);

            // if ($validator->fails() || !empty($phoneErrors)) {
            //     return response()->json([
            //         'status' => false,
            //         'errors' => array_merge($validator->errors()->toArray(), $phoneErrors),
            //     ]);
            // }
            if ($validator->fails()) {
                logger($validator->errors());
                return response()->json([
                    'status' => false,
                    'errors' => array_merge($validator->errors()->toArray()),
                ]);
            }

            // Update user
            $this->updateUser($user, $request);

            return response()->json([
                'status' => true,
                'message' => '連絡先の詳細が正常に更新されました。'
            ]);

        } catch (\Exception $e) {
            Log::error('Contact update failed: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => '連絡先の詳細の更新中にエラーが発生しました',
            ]);
        }
    }

    private function hasNoChanges($user, Request $request)
    {
        // $current = [
        //     $user->address,
        //     $user->first_phone,
        //     $user->second_phone
        // ];

        // $new = [
        //     $request->address,
        //     $request->input('first_phone') ? true: '',
        //     $request->input('second_phone') ?  true : ''
        // ];

        // return array_diff($current, $new) === [];

        $firstPhone = $request->input('first_phone') != null ?'+81' .  $request->input('first_phone') : null;
        $secondPhone = $request->input('second_phone') != null ? '+81' . $request->input('second_phone') : null;

        // return $user->address === $request->address && $user->first_phone === $firstPhone && $user->second_phone === $secondPhone ;
        return $user->address === $request->address && $user->postal_code === $request->postalCode;
    }

    private function processPhoneNumbers(Request $request)
    {
        $data = [];

        foreach (['first', 'second'] as $type) {
            $phone = $request->input("{$type}_phone");
            $extension = $request->input("{$type}_phone_extension");

            if ($phone !== null) {
                [$ext, $num] = $this->splitPhoneNumber($extension . $phone);
                $data["{$type}_phone"] = $ext . $num;
            }
        }

        return $data;
    }

    private function validatePhoneNumbers(Request $request)
    {
        $errors = [];
        // $phoneRules = [
        //     '+81' => '/^\+81[789]0\d{8}$/',
        //     '+95' => '/^\+95[6-9]\d{6,9}$/'
        // ];

        $phoneRegexJapan = '/^\+81[789]0\d{4}\d{4}$/';

        foreach (['first_phone', 'second_phone'] as $field) {
            $phone =  $request->input($field);
            // $extension = $request->input("{$field}_extension");

            if ($phone ) {

                if (!preg_match($phoneRegexJapan, $phone)) {
                    $errors[$field] = ['Invalid phone number'];
                }
            }
        }

        return $errors;
    }

    private function updateUser($user, Request $request)
    {
        $user->update([
            'address' => $request->address ?? $user->address,
            'postal_code' => $request->postalCode ?? $user->postal_code,
            // 'first_phone' => $request->first_phone ?? null,
            // 'second_phone' => $request->second_phone ?? null,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', '連絡先の詳細が正常に更新されました。');
    }

    private function splitPhoneNumber(string $phone)
    {
        if (empty($phone)) {
            return ['', ''];
        }

        $countryCodes = ['+81', '+95'];
        $extension = '';
        $number = $phone;

        foreach ($countryCodes as $code) {
            if (strncmp($phone, $code, strlen($code)) === 0) {
                $extension = $code;
                $number = substr($phone, strlen($code));
                break;
            }
        }

        $number = preg_replace('/[^0-9]/', '', $number);
        return [$extension, $number];
    }
}
