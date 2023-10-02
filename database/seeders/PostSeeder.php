<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($userId): void
    {
        DB::table('posts')->insert([
            'user_id' => $userId, 
            'caption' => Str::random(10),
            'image' => Str::random(10),
        ]);
    }
}
