<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = DB::table('posts')
        //     ->where('id', 13)
        //     ->orWhere('id', 11)
        //     ->update([
        //         'excerpt' => 'Laravel 12x',
        //         'description' => 'Laravel 12x',
        //     ]);

        // dd($posts);

        // $posts = DB::table('posts')
        //     ->where('id', 13)
        //     ->increment('min_to_read', 7);

        // dd($posts);

        // $posts = DB::table('posts')
        //     ->where('id', 13)
        //     ->decrement('min_to_read', 7);

        // dd($posts);

        // $posts = DB::table('posts')
        //     ->where('id', 13)
        //     ->incrementEach(['min_to_read', 'lines'], [3, 5]);

        // dd($posts);

        // $posts = DB::table('posts')
        //     ->where('id', 13)
        //     ->where('title', 'X2')
        //     ->delete();

        // $posts = DB::table('posts')
        //     ->truncate();

        // dd($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
