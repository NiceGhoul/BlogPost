<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create(
            [
            'name' => 'Web Design',
            'slug' => 'web-design',
            'color' => 'red'
            ]
        );
        Category::factory()->create(
            [
            'name' => 'UI UX',
            'slug' => 'ui-ux',
            'color' => 'green'
            ]
        );
        Category::factory()->create(
            [
            'name' => 'Machine Learning',
            'slug' => 'machine-learning',
            'color' => 'blue'
            ]
        );
        Category::factory()->create(
            [
            'name' => 'Data Structure',
            'slug' => 'Data Structure',
            'color' => 'yellow'
            ]
        );
    }
}
