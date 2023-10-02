<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($userId): int
    {
        $profileId = DB::table('profiles')->insert([
            'user_id' => $userId,
            'title' => Str::random(10),
            'description' => Str::random(10),
            'url' => Str::random(10),
            'image' => Str::random(10),
        ]);

        return $profileId;
    }
}
