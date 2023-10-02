<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($userId, $profileId): void
    {
        DB::table('profile_user')->insert([
            'profile_id' => $profileId,
            'user_id' => $userId,
        ]);
    }
}
