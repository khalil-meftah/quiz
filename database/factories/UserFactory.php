<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => $this->faker->lastName,
            // 'prenom'=>$this->faker->firstName,
            // 'email' => fake()->unique()->safeEmail(),
            // 'role'=>$this->randomElement(['administrateur','mainteneur','professeur']),
            // 'dateDeNaissance'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            // 'numeroDeTelephone'=>$this->faker->phoneNumber,
            // 'adresse' => $this->faker->address,
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
