<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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

    public function testDispatchProduct()
    {
        $data = [
            'item_id' => 1,
            'quantity' => 20,
            'status'=> 1,

        ];

        $order = factory(\App\Order::class)->create();
        $response = $this->actingAs($order, 'api')->json('POST', '/api/items',$data);
        $response->assertStatus(200);
        $response->assertJson(['status' => true]);
        $response->assertJson(['message' => "Product dispatched Successfully!"]);
        $response->assertJson(['data' => $data]);
    }
}
