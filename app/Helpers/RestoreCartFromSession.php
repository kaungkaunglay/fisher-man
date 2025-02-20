<?php

namespace App\Helpers;

use App\Models\Cart;
use App\Helpers\AuthHelper;
use Illuminate\Support\Facades\Log;

class RestoreCartFromSession
{
    /**
     * Restore the cart from session to database.
     *
     * @param  int  $user_id
     * @return void
     */
    public static function restore()
    {
        try {
            // Check if the user is authenticated and the cart exists in the session
            if (session()->has('cart') && AuthHelper::check()) {
                $user_id = AuthHelper::id();
                $carts = session()->get('cart');

                // Loop through each cart item and restore it in the database
                foreach ($carts as $item) {
                    // Ensure the cart item is valid
                    if (!isset($item['id']) || !isset($item['quantity'])) {
                        Log::warning("Invalid cart item encountered for user $user_id. Skipping item.");
                        continue;
                    }

                    // Use updateOrCreate to avoid duplicates and update the existing cart item
                    Cart::updateOrCreate(
                        [
                            'user_id' => $user_id,
                            'product_id' => $item['id']
                        ],
                        [
                            'quantity' => \DB::raw('quantity + ' . (int)$item['quantity']) // Update quantity if item already exists
                        ]
                    );
                }

                session()->forget('cart');

                Log::info("Successfully restored cart from session to database for user: $user_id");
            } else {
                Log::info("No cart found in session or user not authenticated.");
            }
        } catch (\Exception $e) {
            // Log the exception with detailed message
            Log::error("Error while restoring cart from session to database: " . $e->getMessage(), ['user_id' => $user_id]);
        }
    }
}
