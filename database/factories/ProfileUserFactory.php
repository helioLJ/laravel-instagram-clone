<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProfileUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\ProfileUser::class; // Replace with the correct class name

    public function definition()
    {
        return [
            'profile_id' => null, // Define the profile ID
            'user_id' => null, // Define the user ID
        ];
    }

}
