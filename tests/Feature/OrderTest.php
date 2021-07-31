<?php

namespace Tests\Feature;

use App\Models\Order;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function test_listing_all_orders()
    {
        $response = $this->get('/api/order');
        $response->assertStatus(200);
    }

    public function test_creating_a_order()
    {
        $orderPostData = Order::factory()->make();

        $response = $this->post('/api/order', $orderPostData->toArray());
        $response->assertStatus(201)->assertJsonFragment([
            'client_id' => $orderPostData->client_id
        ]);
    }

    public function test_listing_a_order()
    {
        $order = Order::factory()->make();
        $this->post('/api/order', $order->toArray());

        $response = $this->get('/api/order/' . $order->id);
        $response->assertStatus(200)->assertJsonFragment([
            'client_id' => $order->client_id
        ]);
    }

    public function test_updating_a_order()
    {
        $order = Order::factory()->make();
        $postResponse = $this->post('/api/order', $order->toArray());

        $orderPutData = Order::factory()->make();

        $response = $this->put('/api/order/' . $postResponse->decodeResponseJson()['id'], $orderPutData->toArray());
        $response->assertStatus(200)->assertJsonFragment([
            'id' => $postResponse->decodeResponseJson()['id'],
            'client_id' => $orderPutData->client_id
        ]);
    }

    public function test_deleting_a_order()
    {
        $order = Order::factory()->make();
        $postResponse = $this->post('/api/order', $order->toArray());

        $response = $this->delete('/api/order/' . $postResponse->decodeResponseJson()['id']);
        $response->assertStatus(204);
    }
}
