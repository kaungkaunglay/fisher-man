<?php

namespace App\Http\Controllers;

use App\Models\FAQs;
use App\Models\Shop;
use App\Models\Users;
use App\Models\Cart;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Setting;
use App\Models\wishList;
use App\Helpers\AuthHelper;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
        
    public function home(Request $request)
{
        $top_selling_products = Cart::join('products', 'carts.product_id', '=', 'products.id')
            ->select(
                'products.id',
                'products.name',
                'products.product_image', 
                DB::raw('SUM(carts.quantity) as total_quantity_sold')
            )
            ->groupBy('products.id', 'products.name', 'products.product_image')
            ->orderByDesc('total_quantity_sold')
            ->take(5)
            ->get();
        $top_products = Product::with('user:id,username')
            ->inRandomOrder()
            ->take(5)
            ->get();
        $all_products = Product::with('user:id,username')
            ->paginate(10);
        $total_product_count = Product::count();


    return view('admin.index', compact('top_selling_products', 'top_products', 'all_products', 'total_product_count'));
}

    public function categoreis()
    {
        return view('admin.categories');
    }
    public function deleteUser($id)
    {
        // Validate that the user exists
        $user = Users::find($id);
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found']);
        }
        // Delete the user
        $user->delete();
        return response()->json(['status' => true, 'message' => 'User deleted successfully']);
    }
    public function category()
    {
        return view('admin.category');
    }
    public function orders()
    {
        return view('admin.orders');
    }
    public function order(){
        return view('admin.order');
    }
    public function products()
    {
        return view('admin.products');
    }
    public function product()
    {
        return view('admin.product');
    }
    public function users()
    {
        $role = Role::where('id',  3)->first();
        $users = $role->users()->paginate(10);
        return view('admin.users', ['users' => $users]);
    }
    public function user()
    {
        return view('admin.user');
    }

    public function login()
    {
        return view('admin.login');
    }

    //settings

    public function settings(){
        // dd(Setting::where('key', 'contact_email'));

        $settings = Setting::pluck('value', 'key');

        $settings = [
            'contact_email' => $settings['contact_email'] ?? '',
            'contact_phone' => $settings['contact_phone'] ?? '',
            'contact_address' => $settings['contact_address'] ?? '',
            'slogan' => $settings['slogan'] ?? '',
            'policy' => $settings['policy'] ?? '',
            'logo' => $settings['logo'] ?? '',
        ];

        return view('admin.settings',compact('settings'));
    }

    public function save(Request $request){

        $request->validate([
            'contact_email' => 'required|email',
            'contact_phone' => 'required',
            'contact_address' => 'required',
            'slogan' => 'required',
            'policy' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $settings = [
            'contact_email' => request('contact_email'),
            'contact_phone' => request('contact_phone'),
            'contact_address' => request('contact_address'),
            'slogan' => request('slogan'),
            'policy' => request('policy'),
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // Handle Logo Upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $imageName = time() . '.' . $file->getClientOriginalExtension(); // Generate unique name

            // $resizedImage = Image::make($file)->resize(300, 300)->encode();
            $resizedImage = ImageIntervention::make($image)->resize(300, 300);
            $file->move(public_path('assets/logos'),$imageName);

            Setting::updateOrCreate(['key' => 'logo'], ['value' => $imageName]);
        }

        return back()->with('success', 'Settings updated successfully.');
    }

    public function login_store(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {
            $user = Users::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password) && $user->roles()->first()->id == 1) {
                Auth::login($user);
                return response()->json(['status' => true, 'message' => 'Login success', 'errors' => '']);
            }

            return response()->json(['status' => false, 'message' => 'email or Password is Incorrect']);
        }
    }

    //user request
    public function contact()
    {
        $contacts = Contact::paginate(10);
        return view('admin.contact-request', compact('contacts'));
    }

    public function wishList()
    {
        $wishLists = wishList::paginate(10);
        return view('admin.wishList-request', compact('wishLists'));
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


    //Manage Shop
    public function approvedShopList(){
        $approvedShops = Shop::with('user:id,username')
                            ->where('status', 'approved')
                            ->paginate(10);

        return view('admin.approved-shops',compact('approvedShops'));
    }
    public function pendingShopList(){
        $pendingShops = Shop::with('user:id,username')
                            ->where('status', 'approved')
                            ->paginate(10);
        return view('admin.pending-shops', compact('pendingShops'));
    }
    public function rejectedShopList(){
        $rejectedShops = Shop::with('user:id,username')
                        ->where('status', 'rejected')
                        ->paginate(10);
        return view('admin.rejected-shops', compact('rejectedShops'));
    }

    public function updateStatus(Request $request)
    {
        $shop = Shop::findOrFail($request->shop_id);
        $shop->status = $request->status;
        $shop->save();
        $user = $shop->user;
        $user->assignRole(2);

        return response()->json(['status' => true, 'message' => 'Shop status updated successfully']);
    }

    public function shopDetail($shopID){
        $shop = Shop::with('user:id,username,email')
                        ->findOrFail($shopID);

        return view('admin.seller-shop-detail', compact('shop'));
    }

    public function deleteShop(Request $request)
    {

        $shop = Shop::find($request->shop_id);
        $user = $shop->user;
        $user->assignRole(3);
        $shop->delete();


        return response()->json(['success' => true, 'message' => 'Shop deleted successfully.']);
    }

    public function logout()
    {
        AuthHelper::logout();
        return to_route('admin.login');
    }
}
