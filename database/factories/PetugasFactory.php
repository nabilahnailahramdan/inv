<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class PetugasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'nama' => $this->faker->name(),
                'username' => $this->faker->unique()->username(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'level' => 'operator',
                'no_telepon' => $this->faker->phoneNumber(),
                'remember_token' => Str::random(10),      
        ];
    }
}
