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


            $categories = require_once __DIR__ . '/../2024-12-30/2024_12_30_193440_categories.php';

            foreach ($categories as $category) {
                Category::create($category);
            }
        }
    }
