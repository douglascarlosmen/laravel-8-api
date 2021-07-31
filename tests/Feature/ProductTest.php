<?php

namespace Tests\Feature;

use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_listing_all_products()
    {
        $response = $this->get('/api/product');
        $response->assertStatus(200);
    }

    public function test_creating_a_product()
    {
        $productPostData = Product::factory()->make();

        $response = $this->post('/api/product', $productPostData->toArray());
        $response->assertStatus(201)->assertJsonFragment([
            'name' => $productPostData->name,
            'price' => $productPostData->price
        ]);
    }

    public function test_listing_a_product()
    {
        $product = Product::factory()->create();

        $response = $this->get('/api/product/' . $product->id);
        $response->assertStatus(200)->assertJsonFragment([
            'id' => $product->id,
            'name' => $product->name
        ]);
    }

    public function test_updating_a_product()
    {
        $product = Product::factory()->create();
        $productPutData = Product::factory()->make();

        $response = $this->put('/api/product/' . $product->id, $productPutData->toArray());
        $response->assertStatus(200)->assertJsonFragment([
            'id' => $product->id,
            'name' => $productPutData->name,
            'price' => $productPutData->price
        ]);
    }

    public function test_deleting_a_product()
    {
        $product = Product::factory()->create();

        $response = $this->delete('/api/product/' . $product->id);
        $response->assertStatus(204);
    }
}
