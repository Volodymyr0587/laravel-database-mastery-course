<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('update-or-create', function () {
    $post = Post::updateOrCreate([
        'id' => 28
    ], [
        'user_id' => 10,
        'title' => "updateOrCreate 2",
        "slug" => "update-or-create-2",
        "excerpt" => "What do you think?",
        "description" => "I'm not sure!!",
        "is_published" => true,
        "min_to_read" => 10
    ]);
});

Route::get('upsert', function () {
    Post::upsert([
        'id' => 23,
        'user_id' => 10,
        'title' => "Upsert",
        "slug" => "upsert",
        "excerpt" => "upsert...",
        "description" => "Upsert...",
        "is_published" => true,
        "min_to_read" => 3
    ], [
        "id",
    ]);
});

Route::resource('posts', PostController::class);