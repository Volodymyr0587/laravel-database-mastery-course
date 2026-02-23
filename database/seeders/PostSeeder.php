<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = collect([
            [
                'title' => 'Post One',
                'slug' => 'post-one',
                'excerpt' => 'Excerpt of post one',
                'content' => 'Content of post one',
                'is_published' => true,
                'min_to_read' => 2,
            ],
            [
                'title' => 'Post Two',
                'slug' => 'post-two',
                'excerpt' => 'Excerpt of post two',
                'content' => 'Content of post two',
                'is_published' => true,
                'min_to_read' => 2,
            ]
        ]);

        $posts->each(function ($post) {
            Post::create([
                'title' => $post['title'],
                'slug' => $post['slug'],
                'excerpt' => $post['excerpt'],
                'content' => $post['content'],
                'is_published' => $post['is_published'],
                'min_to_read' => $post['min_to_read'],
            ]);
        });
    }
}
