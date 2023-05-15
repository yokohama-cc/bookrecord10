<?php

namespace Database\Factories;

use App\Models\Membership;
use App\Models\User;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class MembershipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Membership::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'team_id' => Team::factory(),
            //'user_id' => User::factory(),
            'team_id' => $this->faker->numberBetween($min = 1, $max = 5),
            //'user_id' => $this->faker->numberBetween($min = 1, $max = 10),
            'role' => 'editor',
        ];
    }
}
