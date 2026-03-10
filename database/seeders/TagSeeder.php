<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Laravel',
            'PHP',
            'Databases',
            'JavaScript',
            'DevOps',
            'Testing',
            'Architecture',
            'Design Patterns',
        ];

        foreach ($tags as $name) {
            Tag::firstOrCreate([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }

    }
}
