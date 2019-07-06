<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


use App\Order;

class DispatchButtonTest extends TestCase
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

    public function dispatch($id)
    {
        $order = Order::find($id);

        $order->update([
            'status' => 1
        ]);

        $item = $order->product;

        $item->quantity = $item->quantity + $order->quantity;

        $item->save();

        $item->assertStatus(200);
        $item->assertJson(['status' => true]);
        $item->assertJson(['message' => "Product Sold Successfully!"]);
        $item->assertJson(['data' => $order]);

    }
}
