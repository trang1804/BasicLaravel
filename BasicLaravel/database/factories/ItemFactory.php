<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */


class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    protected $item = Item::class;

    public function definition()
    {
        return [
            'item_name' => $this->faker->name(),
            'price' => $this->faker->numberBetween($min = 1500, $max = 6000),
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id
        ];
    }
}
