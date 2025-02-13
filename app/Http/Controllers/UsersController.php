<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\forgot_password;
use App\Mail\ForgotPasswordMail;
use App\Mail\ThankYouMail;
use App\Models\Contact;
use App\Models\FAQs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
{
    public function register() {
        return view('register');
    }
    public function register_seller(){
        return view('sellers.register');
    }
    public function login_seller(){
        return view('sellers.login');
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
            'line_id.required' => 'The line ID field is required.',
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
            'second_phone' => ['nullable', 'regex:/^(\+95[6-9]\d{6,9}|\+81[789]0\d{4}\d{4})?$/'],
            'line_id' => 'required|min:4|max:20'
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
            $user = new User();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->first_phone = $request->first_phone;
            $user->second_phone = $request->second_phone;
            $user->line_id = $request->line_id;
            $user->remember_token = Str::random(60);

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
        $user = User::where('id', $request->userid)->first();
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
            $user = User::where('username', $request->username)
            ->orWhere('email', $request->username)
            ->first();

            if($user && Hash::check($request->password, $user->password)){

                session()->put('user_id', $user->id);
                return response()->json(['status' => true, 'message' => 'Login success', 'errors'=> '']);
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
            $user = User::where('email', $request->email)->first();

            // dd($user);
            if($user){
                $user->remember_token = Str::random(60);
                // $user->save();
                Mail::to($user->email)->send(new ForgotPasswordMail($user));
                return response()->json(['status' => true, 'message' => 'Reset Link Sent']);
            }
            return response()->json(['status' => false, 'message' => 'Email is not found']);
        }
    }

    public function showResetForm(Request $request) {
        $token = $request->query('token');
        $user_forgot_password = forgot_password::where('token', $token)->first();
        if(!$user_forgot_password){
            return abort(404);
        }
        if($user_forgot_password->is_used == 0){
            $user_forgot_password->is_used = 1;
            $user_forgot_password->save();
            //delete token after reset passwordk
            return view('reset_password', ['user_id' => $user_forgot_password->user_id]);
        }
    }

    // public function showResetForm($token){
    //     $user = User::where('remember_token', $token)->first();
    //     if($user){
    //         return view('reset_password', ['token' => $token]);
    //     }
    //     return redirect()->route('login');
    // }

    public function reset(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => [
                'required',
                'min:6',
                'max:16',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{6,16}$/'
            ],
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }else{
            $user = User::where('remember_token', $request->token)->first();
            if($user){
                $user->password = Hash::make($request->password);
                $user->remember_token = Str::random(60);
                $user->save();
                return response()->json(['status' => true, 'message' => 'Password Reset Success']);
            }
            return response()->json(['status' => false, 'message' => 'Token is not found']);
        }
    }

    public function support(){
        $faqs = FAQs::all();
        return view('support', compact('faqs'));
    }

    public function contact(Request $request){
        $request->validate([
            'name' => 'required',
            'line_id' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'description' => 'required'
        ]);

        // dd($request->all());

        $contact = Contact::create([
        'name' => $request->name,
        'line_id' => $request->line_id,
        'phone' => $request->phone,
        'email' => $request->email,
        'description' => $request->description,
    ]);

    Mail::to($request->email)->send(new ThankYouMail($contact));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function logout(){
        session()->forget('user_id');
        return redirect()->route('login');
    }

    public function is_seller($request)
    {
        return $request->has('ship_name') && $request->has('first_org_name') && $request->has('trans_management');
    }
}
