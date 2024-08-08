<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    /*
     **
     * below line tells laravel this factory is used to insert data to Order Model
     **
     */
    protected $model = Order::class;
    public function definition(): array
    {
        return [
            /*
             **
             * Assign a random User Id  from the UserModel to the 'user_id' attribute.
             **
             */

            'user_id' => \App\Models\User::factory(),
        ];
    }
}
