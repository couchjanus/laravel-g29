<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->text(),

            'status' => $this->faker->randomElement([true,false]),
            'created_at' =>  $this->faker->dateTimeThisYear('+2 months'),
            'updated_at' => $this->faker->dateTimeInInterval('-1 week', '+3 days'),

        ];
    }
}
