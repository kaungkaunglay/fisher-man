<?php

namespace App\Http\Controllers;

use App\Models\FAQs;
use App\Models\Role;
use App\Models\User;
use App\Models\Users;
use App\Models\Contact;
use App\Models\wishList;
use App\Rules\ReCaptcha;
use App\Mail\ThankYouMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\forgot_password;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThankYouMailforWishList;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
{
    public function support(){
        $faqs = FAQs::all();
        return view('support', compact('faqs'));

    }


}
