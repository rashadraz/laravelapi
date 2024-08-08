<?php

namespace Database\Factories;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    /*
     **
     * below line tells laravel this factory is used to insert data to OrderItem Model
     **
     */
    protected $model = OrderItem::class;
    public function definition(): array
    {
        return [
            /*
             **
             * Assign a random id  from the Order to the 'order_id' attribute.
             **
             */
            'order_id' => \App\Models\Order::factory(),
            /*
             **
             * Assign a random id  from the Product to the 'product_id' attribute.
             **
             */
            'product_id' => \App\Models\Product::factory(),
            'quantity' => $this->faker->numberBetween(1, 5),
        ];
    }
}
