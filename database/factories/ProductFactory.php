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
        $randomName = $this->faker->randomElement(['iPhone 14 Pro Max', 'Samsung S22 Ultra', 'Corsair Virtuoso', 'Logitech G Pro', 'Mx Master']);
        $size_type = $this->faker->randomElement(['ml', 'liter', 'gm', 'kg', 'oz', 'lb']);
        $price = $this->faker->numberBetween($min = 10, $max = 9999);
        $status = $this->faker->randomElement(['Y', 'N']); //Y means there is discount, N means there is none
        
        return [
            'name' => $randomName, 
            'size' => $this->faker->numberBetween($min = 10, $max = 5000),
            'size_type' => $size_type, 
            'price' => $price, 
            'discounted_price' => $status == 'Y' ? $this->faker->numberBetween($min = $price * 0.6, $max = $price * 0.9) : NULL, 
            'image' => $this->faker->imageUrl($width = 640, $height = 480, 'clothes'),
        ];
    }
}
