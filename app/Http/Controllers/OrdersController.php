<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 05/07/2019
 * Time: 16:15
 */

namespace App\Http\Controllers;


use App\Order;

class OrdersController extends Controller
{
    public function index($type)
    {
        $orders = Order::ofType($type)
            ->get()
            ->map( function ($order) {
                return [
                    'id' => $order->id,
                    'product' => $order->product->name,
                    'quantity' => (int) $order->quantity,
                    'status' => $order->status
                ];
            });


        return response()->json($orders);
    }

    public function dispatch($id)
    {
        $order = Order::find($id);

        $order->update([
            'status' => 1
        ]);

        $item = $order->product;

        $item->quantity = $item->quantity + $order->quantity;

        $item->save();

    }
}