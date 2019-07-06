<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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

    //testing whether a user who is not logged in can simulate a sale
    public function testSimulateSaleWithMiddleware()
    {
        $data = [
            'item_id' => "1",
            'quantity' => 20,

        ];

        $response = $this->json('POST', '/api/orders',$data);
        $response->assertStatus(401);
        $response->assertJson(['message' => "Unauthenticated."]);
    }

    //We will check to ensure that the response object contains a success HTTP status code 200 Ok.

    public function testMakeSale()
    {
        $data = [
            'item_id' => "1",
            'quantity' => 20,

        ];

        $order = factory(\App\Order::class)->create();
        $response = $this->actingAs($order, 'api')->json('POST', '/api/orders',$data);
        $response->assertStatus(200);
        $response->assertJson(['status' => true]);
        $response->assertJson(['message' => "Product Sold Successfully!"]);
        $response->assertJson(['data' => $data]);
    }

}
