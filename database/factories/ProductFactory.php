<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brands = \DB::table('brands')->pluck('id');
        $categories = \DB::table('categories')->pluck('id');
        $name = $this->faker->catchPhrase();


        return [
            'name' => $name,
            'slug' => \Str::of($name)->slug('-'),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 9000),
            'status' => $this->faker->randomElement([true,false]),
            'cover' =>$this->faker->imageUrl(400, 300, 'animals', true),
            'brand_id' => $this->faker->randomElement($brands),
            'category_id' => $this->faker->randomElement($categories),
            'created_at' =>  $this->faker->dateTimeThisYear('+2 months'),
            'updated_at' => $this->faker->dateTimeInInterval('-1 week', '+3 days'),
        ];
    }
}
