<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Mail\VerifyEmail;
use App\Helpers\AuthHelper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use App\Models\EmailVerification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register() {
        return view('register');
    }
    public function verified(){
        return view('messages/verified');
    }
    // public function register_seller(){
    //     return view('sellers.register');
    // }

    public function login(){
        return view('login');
    }
    public function register_store(Request $request){
        logger($request->all() );
        $messages = [
            'username.required' => 'ユーザー名は必須です。',
            'username.min' => 'ユーザー名は最低4文字以上で入力してください。',
            'username.max' => 'ユーザー名は12文字以内で入力してください。',
            'username.unique' => 'このユーザー名は既に使用されています。',
            'username.regex' => 'ユーザー名は英数字のみ使用できます。',
            
            'email.required' => 'メールアドレスは必須です。',
            'email.email' => '有効なメールアドレスを入力してください。',
            'email.unique' => 'このメールアドレスは既に使用されています。',
            
            'g-recaptcha-response.required' => 'reCAPTCHAの確認が必要です。',
            
            'password.required' => 'パスワードは必須です。',
            'password.min' => 'パスワードは最低6文字以上で入力してください。',
            'password.max' => 'パスワードは16文字以内で入力してください。',
            'password.regex' => 'パスワードは、大文字、小文字、数字、特殊文字をそれぞれ1つ以上含める必要があります。',
            
            'confirm_password.required' => '確認用パスワードは必須です。',
            'confirm_password.same' => '確認用パスワードが一致しません。',
            
            'first_phone.required' => '第一電話番号は必須です。',
            'first_phone.regex' => '第一電話番号の形式が無効です。',
            
            'second_phone.regex' => '第二電話番号の形式が無効です。',
            'second_phone.different' => '第二電話番号は第一電話番号と異なる必要があります。',
            // 'line_id.min' => 'The line ID must be at least 4 characters.',
            // 'line_id.max' => 'The line ID may not be greater than 20 characters.',
            // 'ship_name.required' => 'The ship name field is required.',
            // 'ship_name.min' => 'The ship name must be at least 4 characters.',
            // 'ship_name.max' => 'The ship name may not be greater than 20 characters.',
            // 'first_org_name.required' => 'The first organization name field is required',
            // 'first_org_name.min' => 'The first organization name must be at least 4 characters.',
            // 'first_org_name.max' => 'The first organization name may not be greater than 20 characters.',
            // 'trans_management.required' => 'The transportation management field is required.',
            // 'trans_management.min' => 'The transportation management must be at least 4 characters',
            // 'trans_management.max' => 'The transportation management may not be greater than 20 characters.'
        ];

        $validator = Validator::make($request->all(), [
           'username' => [
                'required',
                'min:4',
                'max:20',
                'unique:users,username',
                'regex:/^[a-zA-Z0-9\s]+$/'
            ],
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'min:6',
                'max:16',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{6,16}$/'
            ],
            'confirm_password' => 'required|same:password',
            'g-recaptcha-response' => 'required',
            'first_phone' => 'required|numeric',
            'second_phone' => 'nullable|numeric|different:first_phone',
        ], $messages);
        $errors = [];
        if($this->is_seller($request))
        {
            $validator->addRules([
                'ship_name' => 'required|min:4|max:20',
                'first_org_name' => 'required|min:4|max:20',
                'trans_management' => 'required|min:4|max:20'
            ]);
        }

        // Define regex patterns for phone numbers

        if($request->input('first_phone') != null ){
            // $request->merge([
            //     'first_phone' => $request->input('first_phone_extension') . $request->input('first_phone'),
            // ]);
            $phone = "+81" . $request->input('first_phone');

            if(Users::pluck('first_phone'))

            $phoneRegexJapan = '/^\+81[789]0\d{4}\d{4}$/';
            // $phoneRegexMyanmar = '/^\+95[6-9]\d{6,9}$/';
                // Validate first phone number
            // if ($request->input('first_phone_extension') === '+81' && !preg_match($phoneRegexJapan, $request->input('first_phone'))) {
            //         $errors['first_phone'] = 'Invalid phone number.';
            //  } elseif ($request->input('first_phone_extension') === '+95' && !preg_match($phoneRegexMyanmar, $request->input('first_phone'))) {
            //         $errors['first_phone'] = 'Invalid phone number.';
            // }

            if (!preg_match($phoneRegexJapan, $phone)) {
                $errors['first_phone'] = 'Invalid phone number.';
            }
        }

        if($request->input('second_phone') != null ){
            // $request->merge([
            //     'second_phone' => $request->input('second_phone_extension') . $request->input('second_phone'),
            // ]);

            $phone = "+81" . $request->input('second_phone');
            $phoneRegexJapan = '/^\+81[789]0\d{4}\d{4}$/';
            // $phoneRegexMyanmar = '/^\+95[6-9]\d{6,9}$/';
                // Validate second phone number
            // if ($request->input('second_phone_extension') === '+81' && !preg_match($phoneRegexJapan, $request->input('second_phone'))) {
            //     $errors['second_phone'] = 'Invalid phone number.';
            // } elseif ($request->input('second_phone_extension') === '+95' && !preg_match($phoneRegexMyanmar, $request->input('second_phone'))) {
            //     $errors['second_phone'] = 'Invalid phone number.';
            // }

            if (!preg_match($phoneRegexJapan, $phone)) {
                $errors['second_phone'] = 'Invalid phone number.';
            }
        }

        if($validator->fails() || !empty($errors)){
            $allErrors = array_merge($validator->errors()->toArray(), $errors);
            return response()->json(['status' => false, 'errors' => $allErrors]);
        }else{
            // need to start checking first phone number is valid for myanmar and japan.
            $user = new Users();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->first_phone = '+81'.$request->first_phone;
            $user->second_phone = '+81'. $request->second_phone;
            // $user->line_id = $request->line_id;

            // if($this->is_seller($request))
            // {
            //     $user->ship_name = $request->ship_name;
            //     $user->first_org_name = $request->first_org_name;
            //     $user->trans_management = $request->trans_management;
            // }

            $user->save();

            // $this->is_seller($request) ? $user->assignRole(2) : $user->assignRole(3);
            $user->assignRole(3);

            return response()->json(['status' => true, 'message' => 'Register Success']);
        }
    }
    public function  update_password(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => [
                'required',
                'min:6',
                'max:16',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{6,16}$/'
            ],
        ]);
        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        $user_password = $request->password;
        $user = Users::where('id', $request->userid)->first();
        if ($user) {
            $user->password = Hash::make($user_password);
            $user->save();
            return response()->json(['status' => true, 'message' => 'Password Updated']);
        }else{
            return response()->json(['status' => false, 'message' => 'User not found']);
        }
    }
    public function login_store(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required',
        ], [
            'g-recaptcha-response.required' => 'The recaptcha field is required.'
        ]);
        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }else{
            $user = Users::where('username', $request->username)
            ->orWhere('email', $request->username)
            ->first();

            if($user && Hash::check($request->password, $user->password )  && $user->roles()->first()->id != 1){
                $remember = $request->has('remember') && $request->remember == 1;

                Auth::login($user,$remember);

                // return redirect()->intended('/');

                $isSeller = $user->roles->first()->id == 2;

                return response()->json([
                    'status' => true,
                    'message' => 'login successfull',
                    'user' => $user ,
                    'redirect' =>redirect()-> intended(route( $isSeller ? 'add_product' : 'home'))->getTargetUrl()
                ]);
            }

            return response()->json(['status' => false, 'message' => 'Username or Password is Incorrect']);
        }
    }

    // forgotpassword for user
    public function forgot_password(){
        return view('forgot_password');
    }

    public function sendResetLinkEmail(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }else{
            $user = Users::where('email', $request->email)->first();

            // dd($user);
            if($user){

                if( DB::table('password_reset_tokens')->where('email', $user->email)->first() ){
                    return response()->json(['status' => false, 'message' => 'リセットリンクはすでに送信されています']);
                }


                $token = Str::random(60);

                DB::table('password_reset_tokens')->insert([
                    'email' => $user->email,
                    'token' => $token,
                    'created_at' => now(),
                ]);

                Mail::to($user->email)->send(new ForgotPasswordMail($user,$token));
                return response()->json(['status' => true, 'message' => 'Reset Link Sent', 'email' => $user->email]);
            }
            return response()->json(['status' => false, 'message' => 'メールが見つかりません']);
        }
    }

    public function showEmailSuccess($email){
        session()->flash('status', 'success');
        session()->flash('message', 'パスワードリセットのためのメールを送信しました。メールをご確認ください。');
        return view('email_success', ['email' => $email]);
    }

    public function resentResetLinkEmail(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }else{
            $user = Users::where('email', $request->email)->first();

            if($user){

                if( DB::table('password_reset_tokens')->where('email', $user->email)->first() ){
                    DB::table('password_reset_tokens')->where('email', $user->email)->delete();
                }

                $token = Str::random(60);

                DB::table('password_reset_tokens')->insert([
                    'email' => $user->email,
                    'token' => $token,
                    'created_at' => now(),
                ]);

                Mail::to($user->email)->send(new ForgotPasswordMail($user,$token));
                return response()->json(['status' => true, 'message' => 'Reset Link Sent', 'email' => $user->email]);
            }
            return response()->json(['status' => false, 'message' => 'メールが見つかりません']);
        }
    }


    // public function showResetForm(Request $request) {
    //     $token = $request->query('token');
    //     $user_forgot_password = forgot_password::where('token', $token)->first();
    //     if(!$user_forgot_password){
    //         return abort(404);
    //     }
    //     if($user_forgot_password->is_used == 0){
    //         $user_forgot_password->is_used = 1;
    //         $user_forgot_password->save();
    //         //delete token after reset passwordk
    //         return view('reset_password', ['user_id' => $user_forgot_password->user_id]);
    //     }
    // }

    // public function showResetForm($token){
    //     $user = Users::where('remember_token', $token)->first();
    //     if($user){
    //         return view('reset_password', ['token' => $token]);
    //     }
    //     return redirect()->route('login');
    // }

    public function showResetForm($token)
    {
        return view('reset_password', ['token' => $token]);
    }

    public function reset(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => [
            'required',
            'min:6',
            'max:16',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{6,16}$/'
            ],
            'confirm_password' => 'required|same:password',
            'token' => 'required'
        ], [
            'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.'
        ]);

        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }else{
            $resetRecord = DB::table('password_reset_tokens')
            ->where('token', $request->token)
            ->first();

            if (!$resetRecord) {
                return response()->json(['status' => false, 'message' => 'Invalid or expired reset token']);
            }

            $email = $resetRecord->email;

            $user = Users::where('email', $email)->first();

            $user->password = Hash::make($request->password);
            $user->save();

            // Delete the password reset token from the database
            DB::table('password_reset_tokens')->where('email', $email)->delete();

            return response()->json(['status' => true, 'message' => 'Password Reset Success']);
        }
    }


    public function logout(){
        AuthHelper::logout();
        return redirect()->route('home');
    }

    public function is_seller($request)
    {
        return $request->has('ship_name') && $request->has('first_org_name') && $request->has('trans_management');
    }

}
