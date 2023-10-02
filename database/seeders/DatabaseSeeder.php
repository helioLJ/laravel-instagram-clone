<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 users and get their IDs
        $users = User::factory()->times(10)->create();
        $userIds = $users->pluck('id');

        // Create 10 posts and profiles for each user
        foreach ($userIds as $userId) {
            // Create 10 posts for the current user
            Post::factory()->count(10)->create(['user_id' => $userId]);

            // Create 10 profiles for the current user
            Profile::factory()->count(10)->create(['user_id' => $userId]);
        }
    }
}
