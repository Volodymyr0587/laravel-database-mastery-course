<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::pluck('id');
        $categories = Category::pluck('id');

        $json = File::get('database/json/posts.json');
        $posts = collect(json_decode($json));

        $posts->each(function ($post) use ($users, $categories) {
            $createdPost = Post::create([
                'user_id' => $users->random(),
                'title' => $post->title,
                'slug' => $post->slug,
                'excerpt' => $post->excerpt,
                'description' => $post->description,
                'is_published' => $post->is_published,
                'min_to_read' => $post->min_to_read,
            ]);
            // attach 1–3 random categories
            $createdPost->categories()->attach(
                $categories->random(rand(1, 3))
            );
        });


    }
}
