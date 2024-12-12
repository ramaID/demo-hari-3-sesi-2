<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'sku' => $this->faker->unique()->word,
            'price' => $this->faker->randomFloat(2, 1, 1000),
        ];
    }

    /**
     * Indicate that the product is published.
     *
     * @return \Database\Factories\ProductFactory
     */
    public function published(): ProductFactory
    {
        return $this->state(function () {
            return [
                'published_at' => now(),
            ];
        });
    }
}