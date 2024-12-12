<?php

use App\Models\Product;

use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\putJson;

test('listing products', function () {
    Product::factory()->count(3)->create();

    getJson('/api/products')
        ->assertStatus(200)
        ->assertJsonCount(13)
        ->assertJsonCount(3, 'data');
});

test('storing product', function () {
    $payload = [
        'name' => 'Product 1',
        'sku' => 'P1',
        'price' => 10_000,
    ];

    postJson('/api/products', $payload)
        ->assertStatus(201)
        ->assertJson($payload);
});

test('updating product', function () {
    $product = Product::factory()->create();
    $payload = [
        'name' => 'Updated '.$product->name,
        'sku' => $product->sku,
        'price' => 90_000,
    ];

    putJson('/api/products/'.$product->id, $payload)
        ->assertStatus(200)
        ->assertJson([
            'name' => 'Updated '.$product->name,
            'price' => 90_000,
        ]);
});

test('deleting product', function () {
    $product = Product::factory()->create();

    deleteJson('/api/products/'.$product->id)
        ->assertStatus(204);
});
