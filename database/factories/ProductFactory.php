<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /*
     **
     * below line tells laravel this factory is used to insert data to Product Model
     **
     */
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productNames = [
            'Smartphone',
            'Leather Jacket',
            'Blender',
            'Skincare Set',
            'Novel',
            'Yoga Mat',
            'Board Game',
            'Multivitamins',
            'Car Battery',
            'Diamond Ring',
        ];
        return [

            'name' => $this->faker->randomElement($productNames),
            /*
             **
             * Assign a random id  from the Category table to the 'category_id' attribute.
             **
             */
            'category_id' => \App\Models\Category::factory(),
            'price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
