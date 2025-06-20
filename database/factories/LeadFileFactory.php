<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LeadFile>
 */
class LeadFileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'file_path'    => 'lead-documents/dummy.pdf',
        'uploaded_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
