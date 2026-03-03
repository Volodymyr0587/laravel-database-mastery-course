<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Laravel',
            'PHP',
            'Databases',
            'JavaScript',
            'DevOps',
            'Testing',
            'Architecture',
            'Design Patterns',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }

    }
}
