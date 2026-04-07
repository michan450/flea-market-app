<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'ファッション'],   // id = 1
            ['name' => '靴'],           // id = 2
            ['name' => '家電'],         // id = 3
            ['name' => '食料'],         // id = 4
            ['name' => '音楽機材'],     // id = 5
            ['name' => '雑貨'],         // id = 6
            ['name' => 'コスメ'],       // id = 7
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
