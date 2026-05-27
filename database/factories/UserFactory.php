<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'avatar' => null,
            'birthday' => fake()->date(),
            'class_number' => null,
            'class_letter' => null,
            'role_id' => Role::where('name', 'student')->first()->id,
        ];
    }


    public function teacher(): static
    {
        return $this->state(fn() => [
            'class_number' => null,
            'class_letter' => null,
            'role_id' => Role::where('name', 'teacher')->first()->id,
        ]);
    }

    public function student(): static
    {
        return $this->state(fn() => [
            'class_number' => fake()->numberBetween(5, 11),
            'class_letter' => fake()->randomElement(['А', 'Б', 'В']),
            'role_id' => Role::where('name', 'student')->first()->id,
        ]);
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
