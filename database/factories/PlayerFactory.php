<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Player::class;

    public function definition()
    {
        $positions = [
            'Goalkeeper',
            'Centre-Back',
            'Left-Back',
            'Right-Back',
            'Defensive Midfield',
            'Central Midfield',
            'Attacking Midfield',
            'Left Winger',
            'Right Winger',
            'Second Striker',
            'Centre-Forward',
        ];

        return [
            'club_id' => $this->faker->numberBetween(1, 100),
            'first_name' => $this->faker->firstName('male'),
            'last_name' => $this->faker->lastName,
            'position' => $this->faker->randomElement($positions),
            'date_of_birth' => $this->faker->dateTimeBetween('1988-01-01', '2007-12-31')->format('Y-m-d'),
            'country' => $this->faker->country,
            'height' => $this->faker->numberBetween(150, 210),
            'foot' => $this->faker->randomElement(['Left', 'Right']),
            'market_value' => $this->faker->numberBetween(1, 300) * 1000000,
            'status' => 0,
        ];
    }
}
