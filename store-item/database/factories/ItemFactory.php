<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'user_id'=>User::factory(),
            'name'=>$this->faker->name(),
            'description'=>$this->faker->paragraph(),
            'stock'=>Str::random(10),
            'category_id'=>Category::factory(),
        ];
    }
}
