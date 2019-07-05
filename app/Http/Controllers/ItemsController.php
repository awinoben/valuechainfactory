<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 05/07/2019
 * Time: 16:15
 */

namespace App\Http\Controllers;


use App\Item;
use App\Order;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return response()->json($items);
    }

    public function store($id)
    {
        $item = Item::find($id);

        $quantity = request()->get('quantity');

        $item->quantity = $item->quantity - $quantity;

        $item->save();

        if($item->reorder_level == $item->quantity || $item->reorder_level < $item->quantity) {
            $this->createReorder($item);
        }

        return response()->json();
    }

    public function createReorder(Item $item, $quantity)
    {
        Order::create([
            'item_id' => $item->id,
            'quantity' => 20,
            'status' => false
         ]);
    }
}