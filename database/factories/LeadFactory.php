<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'name'   => $this->faker->name(),
        'surname'   => $this->faker->lastName(),
        'email'  => $this->faker->unique()->safeEmail(),
        'phone'  => $this->faker->optional()->phoneNumber(),
        'status' => $this->faker->randomElement(['new','contacted','closed']),
        ];
    }
}
