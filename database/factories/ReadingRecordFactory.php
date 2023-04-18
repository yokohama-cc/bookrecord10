<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReadingRecord>
 */
class ReadingRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id'  => $this->faker->numberBetween($min = 1, $max = 100),
            'reader_id'  => $this->faker->numberBetween($min = 1, $max = 10),
            'year_read' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')->format('Y'),
            'month_read' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')->format('m'),
            'report' => $this->faker->realText($maxNbChars = 255, $indexSize = 2),
        ];
    }
}
