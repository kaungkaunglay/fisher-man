<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
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
    public function register_seller(){
        return view('sellers.register');
    }

    public function login(){
        return view('login');
    }
    public function register_store(Request $request){
        $messages = [
            'username.required' => 'The username field is required.',
            'username.min' => 'The username must be at least 4 characters.',
            'username.max' => 'The username may not be greater than 12 characters.',
            'username.unique' => 'The username has already been taken.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 6 characters.',
            'password.max' => 'The password may not be greater than 16 characters.',
            'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
            'confirm_password.required' => 'The confirm password field is required.',
            'confirm_password.same' => 'The confirm password and password must match.',
            'first_phone.required' => 'The first phone field is required.',
            'first_phone.regex' => 'The first phone format is invalid.',
            'second_phone.regex' => 'The second phone format is invalid.',
            'line_id.min' => 'The line ID must be at least 4 characters.',
            'line_id.max' => 'The line ID may not be greater than 20 characters.',
            'ship_name.required' => 'The ship name field is required.',
            'ship_name.min' => 'The ship name must be at least 4 characters.',
            'ship_name.max' => 'The ship name may not be greater than 20 characters.',
            'first_org_name.required' => 'The first organization name field is required',
            'first_org_name.min' => 'The first organization name must be at least 4 characters.',
            'first_org_name.max' => 'The first organization name may not be greater than 20 characters.',
            'trans_management.required' => 'The transportation management field is required.',
            'trans_management.min' => 'The transportation management must be at least 4 characters',
            'trans_management.max' => 'The transportation management may not be greater than 20 characters.'
        ];

        $validator = Validator::make($request->all(), [
            'username' => 'required|min:4|max:12|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'min:6',
                'max:16',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{6,16}$/'
            ],
            'confirm_password' => 'required|same:password',
            'first_phone' => ['required', 'regex:/^(\+95[6-9]\d{6,9}|\+81[789]0\d{4}\d{4})?$/'],
            'second_phone' => ['nullable', 'regex:/^(\+95[6-9]\d{6,9}|\+81[789]0\d{4}\d{4})?$/']
        ], $messages);

        if($this->is_seller($request))
        {
            $validator->addRules([
                'ship_name' => 'required|min:4|max:20',
                'first_org_name' => 'required|min:4|max:20',
                'trans_management' => 'required|min:4|max:20'
            ]);
        }

        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }else{
            $user = new Users();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->first_phone = $request->first_phone;
            $user->second_phone = $request->second_phone;
            $user->line_id = $request->line_id;

            if($this->is_seller($request))
            {
                $user->ship_name = $request->ship_name;
                $user->first_org_name = $request->first_org_name;
                $user->trans_management = $request->trans_management;
            }

            $user->save();

            $this->is_seller($request) ? $user->roles()->attach(2) : $user->roles()->attach(3);

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
        ]);
        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }else{
            $user = Users::where('username', $request->username)
            ->orWhere('email', $request->username)
            ->first();



            if($user && Hash::check($request->password, $user->password)){
                $remember = $request->has('remember') && $request->remember == 1;

                Auth::login($user,$remember);

                return redirect()->intended('/');

                // return response()->json(['status' => true, 'message' => 'login successfull']);
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
                    return response()->json(['status' => false, 'message' => 'Reset Link Already Sent']);
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
            return response()->json(['status' => false, 'message' => 'Email is not found']);
        }
    }

    public function showEmailSuccess($email){
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
            return response()->json(['status' => false, 'message' => 'Email is not found']);
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
        Auth::logout();
        return redirect()->route('login');
    }

    public function is_seller($request)
    {
        return $request->has('ship_name') && $request->has('first_org_name') && $request->has('trans_management');
    }
}
