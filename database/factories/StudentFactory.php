<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name;
        do {
            $randomNumber = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
            $email = strtolower(str_replace(' ', '', $name)) . $randomNumber . '@stuma.com';
        } while (\App\Models\Student::where('email', $email)->exists());

        return [
            'name' => $name,
            'email' => $email,
        ];
    }
}
