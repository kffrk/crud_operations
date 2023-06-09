<?php

namespace Database\Factories;

use App\Models\Club;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Club>
 */
class ClubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Club::class;

    public function definition()
    {
        $prefixes = ['AC', 'AS', 'Olympic', 'Real', 'Sporting', 'Rapid', 'Dynamo', 'Royal', 'Galaxy', 'Phoenix'];
        $suffixes = ['FC', 'United', 'City', 'Stars', 'Warriors', 'Tigers', 'Eagles', 'Lions', 'Rangers', 'Vikings'];

        $prefix = $this->faker->randomElement($prefixes);
        $suffix = $this->faker->randomElement($suffixes);

        $name = $prefix . ' ' . $this->faker->city() . ' ' . $suffix;

        return [
            'league_id' => $this->faker->numberBetween(1, 10),
            'name' => $name,
            'status' => 0,
        ];
    }
}
