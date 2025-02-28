<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class ShopController extends Controller
{

     //Manage Shop
     public function approvedShopList()
     {
         $approvedShops = Shop::select('shops.*', 'users.username')
             ->join('users', 'shops.user_id', '=', 'users.id')
             ->where('status', 'approved')
             ->paginate(10);
         return view('admin.approved-shops', compact('approvedShops'));
     }
     public function pendingShopList()
     {
         $pendingShops = Shop::select('shops.*', 'users.username')
             ->join('users', 'shops.user_id', '=', 'users.id')
             ->where('status', 'pending')
             ->paginate(10);
         return view('admin.pending-shops', compact('pendingShops'));
     }
     public function rejectedShopList()
     {
         $rejectedShops = Shop::select('shops.*', 'users.username')
             ->join('users', 'shops.user_id', '=', 'users.id')
             ->where('status', 'rejected')
             ->paginate(10);
         return view('admin.rejected-shops', compact('rejectedShops'));
     }

     public function updateStatus(Request $request)
     {
         $shop = Shop::findOrFail($request->shop_id);
         $shop->status = $request->status;
         $shop->save();
         $user = Users::select('users.*')
             ->join('shops', 'users.id', '=', 'shops.user_id')
             ->where('shops.id', $request->shop_id)
             ->first();

         $user->assignRole(2);

         return response()->json(['status' => true, 'message' => 'Shop status updated successfully']);
     }

     public function shopDetail($shopID)
     {
         $shop = Shop::select('shops.*', 'users.username', 'users.email')
             ->join('users', 'shops.user_id', '=', 'users.id')
             ->where('shops.id', $shopID)
             ->firstOrFail();

         return view('admin.seller-shop-detail', compact('shop'));
     }

     public function deleteShop(Request $request)
     {

         $user = Users::select('users.*')
             ->join('shops', 'users.id', '=', 'shops.user_id')
             ->where('shops.id', $request->shop_id)
             ->first();

         $user->assignRole(3);
         $shop = Shop::find($request->shop_id);
         $shop->delete();


         return response()->json(['success' => true, 'message' => 'Shop deleted successfully.']);
     }


    public function shop_details($id){
        $shop = Shop::select('shops.*', 'users.username', 'users.address')
        ->join('users', 'shops.user_id',  'users.id')
        ->where('shops.id','=',$id)
        ->first();

        $products = Product::select('products.*', 'sub_categories.name as sub_categories_name')
                ->join('users', 'users.id', 'products.user_id')
                ->join('shops', 'shops.user_id', 'users.id')
                ->join('sub_categories', 'sub_categories.id', 'products.sub_category_id')
                ->where('shops.id', '=', $id)
                ->orderBy('products.created_at', 'desc')
                ->get();

        return view('shop_detail',compact('shop','products'));
    }

    public function requestShop(Request $request)
    {
        $messages = [
            'shopName.required' => 'Shop Name field is required.',
            'ShopName.string' => 'Shop Name must be string.',
            'shopName.max' => 'Shop name may not be greater than 255 characters.',
            'transManagement.required' => 'Trans management field is required.',
            'transManagement.string' => 'Trans management must be string.',
            'transEmail.required' => 'Trans email field is required.',
            'transEmail.email' => 'Trans email must be a valid email address.',
            'transEmail.unique' => 'Trans email already exists.',
            'phoneNumber.required' => 'Phone number field is required',
            'phoneNumber.string' => 'Phone number must be string',
            'shopDescription.required' => 'Shop Description field is required',
            'shopDescription.string' => 'Shop Description must be string',
        ];

        // Validate request
        $validator = Validator::make($request->all(), [
            'shopName' => 'required|string|max:255',
            'transManagement' => 'required|string',
            'transEmail' => 'required|email|unique:shops,email',
            'phoneNumber' => 'required|string|min:10',
            'shopDescription' => 'required|string|min:10',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ]);


        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }


        // Upload Avatar if exists
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $imageName = time() . '.' . $file->getClientOriginalExtension(); // Generate unique name
            $file->move(public_path('assets/images/avatars'),$imageName);
        }


        // Store shop data
        $shop = Shop::create([
            'user_id' => auth_helper()->id(),
            'shop_name' => $request->shopName,
            'trans_management' => $request->transManagement,
            'email' => $request->transEmail,
            'phone_number' => $request->phoneNumber,
            'description' => $request->shopDescription,
            'avatar' => $imageName,
            'status' => 'pending', // Default status as pending
        ]);

        return response()->json(['status' => true, 'message' => 'Shop request submitted successfully!']);
    }
}
