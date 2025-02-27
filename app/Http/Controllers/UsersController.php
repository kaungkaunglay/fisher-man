<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\forgot_password;
use App\Mail\ForgotPasswordMail;
use App\Mail\ThankYouMail;
use App\Mail\ThankYouMailforWishList;
use App\Models\Contact;
use App\Models\FAQs;
use App\Models\Users;
use App\Models\wishList;
use App\Rules\ReCaptcha;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
{
    //
}
