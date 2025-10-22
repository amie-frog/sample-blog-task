<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password'=>'11111111'
        ]);

        Category::factory(5)->create();

        Tag::factory(10)->create();

        $user = User::first();
        $categories = Category::all();
        $tags = Tag::all();


        Article::factory(20)
            ->recycle($categories)
            ->create([
                'user_id' => $user->id,
            ])
            ->each(function (Article $article) use ($tags) {
                $article->tags()->attach(
                    $tags->random(rand(3, 6))->pluck('id')
                );
            });
    }
}
