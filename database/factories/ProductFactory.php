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
            'category_id' => mt_rand(1,2),
            'brand_id' => mt_rand(1,9),
            'name' => fake()->sentence(mt_rand(2,4), false),
            'slug' => fake()->slug(mt_rand(2,8)),
            'price' => fake()->randomNumber(mt_rand(7, 8), true),
            'description' => fake()->realText(),
            'stock' => mt_rand(1,5)
        ];
    }
}
