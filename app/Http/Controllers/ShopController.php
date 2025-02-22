<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ShopController extends Controller
{
    public function requestShop(Request $request)
    {
        logger($request->all());
        // // Validate request
        // $validator = Validator::make($request->all(), [
        //     'shop_name' => 'required|string|max:255',
        //     'trans_management' => 'required|string',
        //     'email' => 'required|email|unique:shops,email',
        //     'phone' => 'required|string|min:10',
        //     'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()], 422);
        // }

        // // Upload Avatar if exists
        // $avatarPath = null;
        // if ($request->hasFile('avatar')) {
        //     $avatarPath = $request->file('avatar')->store('shop_avatars', 'public');
        // }

        // // Store shop data
        // $shop = Shop::create([
        //     'name' => $request->shop_name,
        //     'trans_management' => $request->trans_management,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'avatar' => $avatarPath,
        //     'status' => 'pending', // Default status as pending
        // ]);

        // return response()->json(['success' => true, 'message' => 'Shop request submitted successfully!']);
    }
}
