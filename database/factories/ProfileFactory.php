<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Profile::class;

    public function definition()
    {
        return [
            'user_id' => null, // Define the user ID when creating a profile
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'url' => fake()->url,
            'image' => fake()->imageUrl(640, 480, 'animals', true),
        ];
    }

}
