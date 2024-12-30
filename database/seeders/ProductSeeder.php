<?php

    namespace Database\Seeders;

    use App\Models\Product;
    use Illuminate\Database\Seeder;

    class ProductSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {


            $products = require __DIR__ . '/../2024-12-30/2024_12_30_193505_products.php';

//            usort($products, function ($a, $b) {
//                return strcmp($a['title'], $b['title']);
//            });

            // Sort by category_id then title
            usort($products, function ($a, $b) {
                // Compare category_id first
                if ($a['category_id'] != $b['category_id']) {
                    return $a['category_id'] <=> $b['category_id'];
                }

                // If category_id is the same, compare titles alphabetically
                return strcmp($a['title'], $b['title']);
            });


            foreach ($products as $product) {
                Product::create($product);
            }
        }
    }
