<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Item;
use App\Order;


class SaleButtonTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    //We will check to ensure that the response object contains a success HTTP status code 200 Ok.

    public function index()
    {
        $items = Item::all();

        return response()->json($items);
    }
//checking if the button is subtracting quantity from products
    public function store($id)
    {
        $item = Item::find($id);

        $quantity = request()->get('quantity');

        $item->quantity = $item->quantity - $quantity;

        $item->save();

        if($item->reorder_level == $item->quantity || $item->reorder_level > $item->quantity) {
            $this->createReorder($item);
        }

        return response()->json($item);
    }
//checking if the button updates orders table
    public function createReorder(Item $item)
    {
        return Order::create([
            'item_id' => $item->id,
            'quantity' => 30,
            'status' => 0
        ]);
    }

}
