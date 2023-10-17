<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'codeUtil' => 'EMP-0008',
            'nomUtil' => $this->faker->name(),
            'droitUtil' => 'admin',
            'pseudoUtil' => $this->faker->unique()->userName(),
            'password' => bcrypt('password'),
            'email' => $this->faker->unique()->email(),
        ];
    }
}
