<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Groceries',
            'Fashion',
            'Electronics',
            'Phones & Accessories',
            'Computers',
            'Home & Kitchen',
            'Beauty',
            'Health',
            'Farming',
            'Building Materials',
            'Auto Parts',
            'Furniture',
            'Services',
            'Real Estate',
            'Vehicles',
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => Str::slug($category)],
                ['name' => $category]
            );
        }
    }
}