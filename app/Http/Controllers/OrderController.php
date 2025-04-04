<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with([
            'user',
            'payment',
            'products',
            'orderProducts' => function ($query) {
                $query->select('id', 'order_id', 'product_id', 'quantity');
            }
        ])
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        $orders->each(function ($order) {
            // Index orderProducts by product_id for quick lookup
            $orderProductMap = $order->orderProducts->keyBy('product_id');
            
            $order->products->each(function ($product) use ($orderProductMap) {
                $product->order_quantity = $orderProductMap[$product->id]->quantity ?? 0;
            });
        });

        // dd($orders);

        return view('admin.orders', compact('orders'));
    }

    public function seller_orders()
    {
        $orders = Order::where('user_id', auth()->user()->id)
            ->with([
                'user',
                'payment',
                'products',
                'orderProducts' => function ($query) {
                    $query->select('id', 'order_id', 'product_id', 'quantity');
                }
            ])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $orders->each(function ($order) {
            // Index orderProducts by product_id for quick lookup
            $orderProductMap = $order->orderProducts->keyBy('product_id');
            
            $order->products->each(function ($product) use ($orderProductMap) {
                $product->order_quantity = $orderProductMap[$product->id]->quantity ?? 0;
            });
        });

        return view('sellers.orders', compact('orders'));
    }
}
