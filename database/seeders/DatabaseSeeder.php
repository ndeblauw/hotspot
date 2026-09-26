<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Keyword;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Nico Deblauwe',
            'email' => 'nico@deblauwe.be',
            'password' => 'password',
            'is_admin' => true,
        ]);

        User::factory(10)->create();

        Article::factory(10)->create();

        Comment::factory(20)->create();

        Keyword::factory(5)->create();
    }
}
