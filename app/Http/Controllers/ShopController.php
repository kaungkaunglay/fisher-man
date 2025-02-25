<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ShopController extends Controller
{
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
            ''
        ];

        // Validate request
        $validator = Validator::make($request->all(), [
            'shopName' => 'required|string|max:255',
            'transManagement' => 'required|string',
            'transEmail' => 'required|email|unique:shops,email',
            'phoneNumber' => 'required|string|min:10',
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
            'avatar' => $imageName,
            'status' => 'pending', // Default status as pending
        ]);

        return response()->json(['status' => true, 'message' => 'Shop request submitted successfully!']);
    }
}
