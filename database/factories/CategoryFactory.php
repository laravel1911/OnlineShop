<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     /*
        $name = $this->faker->unique()->words($nb = 4, $asText = true);
        $about = $this->faker->unique()->words($nb = 10, $asText = true);
        $description = $this->faker->unique()->words($nb = 80, $asText = true);
        $slug = \Str::slug($name);
        $price = $this->faker->numberBetween(10, 1000);
        $quentity = $this->faker->numberBetween(1, 100);
        $discount = $this->faker->numberBetween(1, 100);
        $category=$this->faker->numberBetween(1, 10);
        $image = 'assets/img/products/digital_'.str_pad($this->faker->numberBetween(1,22), 2, 0, STR_PAD_LEFT).'.jpg';
        $images = ['assets/img/products/digital_'.str_pad($this->faker->numberBetween(1,22), 2, 0, STR_PAD_LEFT).'.jpg', 'assets/img/products/digital_'.str_pad($this->faker->numberBetween(1,22), 2, 0, STR_PAD_LEFT).'.jpg', 'assets/img/products/digital_'.str_pad($this->faker->numberBetween(1,22), 2, 0, STR_PAD_LEFT).'.jpg'];
        $status = $this->faker->numberBetween(0, 1);
        $images = implode(',', $images);
        return [
            'name' => $name,
            'price' => $price,
            'quatity' => $quentity,
            'category_id'=>$category,
            'image' => $image,
            'images' => $images,
            'status' => $status,
            'data'=>$name,
            'discount'=>$discount,
            'about'=>$about,
            'description'=>$description,
            'slug' => $slug
        ];
     */
    public function definition()
    {
        $name = $this->faker->unique()->words($nb = 2, $asText = true);
        $slug = \Str::slug($name);
        return [
            'name' => $name,
            'slug' => $slug,
            'parent_id' => null
        ];
    }
}
