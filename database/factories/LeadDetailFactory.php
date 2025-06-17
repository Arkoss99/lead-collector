<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LeadDetail>
 */
class LeadDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'answer' => $this->faker->optional()->sentence(),
            "question_id" => function () {
                return \App\Models\LeadQuestion::factory()->create()->id;
            },
        ];
    }
}
