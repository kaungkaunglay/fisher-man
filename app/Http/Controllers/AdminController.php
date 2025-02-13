<?php

namespace App\Http\Controllers;

use App\Models\FAQs;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function home(){
        return view('admin.index');
    }
    public function categoreis(){
        return view('admin.categories');
    }
    public function category() {
        return view('admin.category');
    }
    public function orders(){
        return view('admin.orders');
    }
    public function order(){
        return view('admin.order');
    }
    public function products(){
        return view('admin.products');
    }
    public function product(){
        return view('admin.product');
    }
    public function users(){
        return view('admin.users');
    }
    public function user(){
        return view('admin.user');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function login_store(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }else{
            $user = Users::where('email', $request->email)->first();

            if($user && Hash::check($request->password, $user->password)){
                session()->put('admin_user_id', $user->id);
                return response()->json(['status' => true, 'message' => 'Login success', 'errors'=> '']);
            }

            return response()->json(['status' => false, 'message' => 'email or Password is Incorrect']);
        }
    }

    //faq
    public function all_faqs(){
        $faqs = FAQs::all();
        return view('admin.faqs', compact('faqs'));
    }
    public function faq(){
        return view('admin.faq');
    }
     // Store new FAQ
    public function store(Request $request){
    $request->validate([
        'question' => 'required|string|max:255',
        'answer' => 'required|string',
    ]);

    FAQs::create($request->all());

    return redirect()->route('admin.faqs')->with('success', 'FAQ created successfully.');
}

    public function edit($id){
        // echo "edit";
        $faq = FAQs::findOrFail($id);
        return view('admin.faq', compact('faq'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq = FAQs::findOrFail($id);
        $faq->update($request->all());

        return redirect()->route('admin.faqs')->with('success', 'FAQ updated successfully.');
    }

    public function destroy($id){
        $faq = FAQs::findOrFail($id);
        $faq->delete();
        return response()->json(['success' => true, 'message' => 'FAQ deleted successfully']);
        // return redirect()->route('admin.faqs')->with('success', 'FAQ deleted successfully.');
    }


    public function logout(){
        session()->forget('admin_user_id');
        return redirect()->route('admin.login');
    }


}
