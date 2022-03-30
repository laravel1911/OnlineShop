<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->words($nb = 4, $asText = true);
        $slug = \Str::slug($name);
        $description = $this->faker->unique()->words($nb = 80, $asText = true);
        $short_description = $this->faker->unique()->words($nb=10, $asText = true);
        $price = $this->faker->numberBetween(10, 1000);
        $quantity = $this->faker->numberBetween(1, 100);
        $category=$this->faker->numberBetween(1, 10);
        $image = 'assets/img/product-'.$this->faker->numberBetween(1,6).'.jpg';
        // $images = ['assets/img/products/digital_'.str_pad($this->faker->numberBetween(1,22), 2, 0, STR_PAD_LEFT).'.jpg', 'assets/img/products/digital_'.str_pad($this->faker->numberBetween(1,22), 2, 0, STR_PAD_LEFT).'.jpg', 'assets/img/products/digital_'.str_pad($this->faker->numberBetween(1,22), 2, 0, STR_PAD_LEFT).'.jpg'];
        $status = $this->faker->numberBetween(0, 1);
        return [
            'name' => $name,
            'slug' => $slug,
            'price' => $price,
            'description' => $description,
            'short_description' => $short_description,
            'quantity' => $quantity,
            'category_id' => $category,
            'image' => $image,
            'status' => $status
        ];
    }
}
