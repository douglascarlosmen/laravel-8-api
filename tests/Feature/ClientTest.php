<?php

namespace Tests\Feature;

use App\Models\Client;
use Tests\TestCase;

class ClientTest extends TestCase
{
    public function test_listing_all_clients()
    {
        $response = $this->get('/api/client');
        $response->assertStatus(200);
    }

    public function test_creating_a_client()
    {
        $clientPostData = Client::factory()->make();

        $response = $this->post('/api/client', $clientPostData->toArray());
        $response->assertStatus(201)->assertJsonFragment([
            'name' => $clientPostData->name,
            'email' => $clientPostData->email
        ]);
    }

    public function test_listing_a_client()
    {
        $client = Client::factory()->create();

        $response = $this->get('/api/client/' . $client->id);
        $response->assertStatus(200)->assertJsonFragment([
            'id' => $client->id,
            'name' => $client->name,
            'email' => $client->email
        ]);
    }

    public function test_updating_a_client()
    {
        $client = Client::factory()->create();
        $clientPutData = Client::factory()->make();

        $response = $this->put('/api/client/' . $client->id, $clientPutData->toArray());
        $response->assertStatus(200)->assertJsonFragment([
            'id' => $client->id,
            'name' => $clientPutData->name,
            'email' => $clientPutData->email
        ]);
    }

    public function test_deleting_a_client()
    {
        $client = Client::factory()->create();

        $response = $this->delete('/api/client/' . $client->id);
        $response->assertStatus(204);
    }
}
