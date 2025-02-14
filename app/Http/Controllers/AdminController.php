<?php

namespace App\Http\Controllers;

use App\Models\FAQs;
use App\Models\Setting;
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

    //settings

    public function settings(){
        // dd(Setting::where('key', 'contact_email'));
        $settings = [
            'contact_email' => Setting::where('key', 'contact_email')->value('value') ?? '',
            'contact_phone' => Setting::where('key', 'contact_phone')->value('value') ?? '',
            'contact_address' => Setting::where('key', 'contact_address')->value('value') ?? '',
            'logo' => Setting::where('key', 'logo')->value('value') ?? '',
        ];
        return view('admin.settings',compact('settings'));
    }

    public function save(Request $request){
        // dd($request->all());
        $request->validate([
            'contact_email' => 'required|email',
            'contact_phone' => 'required',
            'contact_address' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $settings = [
            'contact_email' => request('contact_email'),
            'contact_phone' => request('contact_phone'),
            'contact_address' => request('contact_address'),
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // Handle Logo Upload
        if ($request->hasFile('logo')) {
         
            $file = $request->file('logo');
            $imageName = time() . '.' . $file->getClientOriginalExtension(); // Generate unique name
            $file->storeAs('images', $imageName, 'public'); // Store in storage/app/public/logos
       
            Setting::updateOrCreate(['key' => 'logo'], ['value' => $imageName]);
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
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
