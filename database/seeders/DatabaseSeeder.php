<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 5 users
        $users = User::factory()->count(5)->create();
        
        // For each user, create 2 posts
        foreach ($users as $user) {
            // Create auth token
            $user->createToken('auth_token')->plainTextToken;
            Post::factory()->count(2)->create(['user_id' => $user->id]);
        }
    }
}
