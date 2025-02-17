<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'start_time' => fake()->dateTimeBetween('-7 days', now()->addDays(7)),
            'comments' => fake()->sentence(),
            'client_id' => fake()->randomDigitNotZero(),
            'employee_id' => fake()->randomDigitNotZero(),
        ];
    }
}
