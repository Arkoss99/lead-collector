<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LeadStat>
 */
class LeadStatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    $date = $this->faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d');
    $total = $this->faker->numberBetween(5, 50);
    $new   = $this->faker->numberBetween(0, $total);
    $contacted = $this->faker->numberBetween(0, $total - $new);
    $closed = $total - $new - $contacted;

        return [
        'date'           => $date,
        'new_count'      => $new,
        'contacted_count'=> $contacted,
        'closed_count'   => $closed,

        ];
    }
}
