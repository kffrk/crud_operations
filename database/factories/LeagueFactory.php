<?php

namespace Database\Factories;

use App\Models\League;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\League>
 */
class LeagueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = League::class;

    public function definition()
    {
        $country = $this->faker->unique()->country();

        $name = $this->faker->randomElement(['Premier League', 'Superliga', 'Serie A', 'Bundesliga', 'La Liga', 'Ligue 1']);

        return [
            'name' => $country . ' ' . $name,
            'country' => $country,
            'status' => 0,
        ];
    }
}
