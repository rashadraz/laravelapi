<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    /*
     **
     * below line tells laravel this factory is used to insert data to Category Model
     **
     */
    protected $model = Category::class;
    public function definition(): array
    {
        $categories = [
            'Electronics',
            'Fashion & Accessories',
            'Home & Kitchen',
            'Beauty & Personal Care',
            'Books & Stationery',
            'Sports & Outdoors',
            'Toys & Games',
            'Health & Wellness',
            'Automotive',
            'Jewelry & Watches',
        ];

        return [

            /*
             **
             * Assign a random category name from the list to the 'name' attribute.
             **
             */

            'name' => $this->faker->randomElement($categories),
        ];
    }
}
