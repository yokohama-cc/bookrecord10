<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reader>
 */
class ReaderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'name' => $this->faker->name,
            'school_number' => $this->faker->bothify('######?'),
            'admission_year' => $this->faker->numberBetween($min = 2013, $max = 2018),
            'department_id' => $this->faker->numberBetween($min = 1, $max = 3),
        ];
    }
}
