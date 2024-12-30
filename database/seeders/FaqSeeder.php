<?php

    namespace Database\Seeders;

    use App\Models\Faq;
    use Illuminate\Database\Seeder;

    class FaqSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            $faqs = require __DIR__ . '/../2024-12-30/2024_12_30_193718_faqs.php';

            foreach ($faqs as $faq) {
                Faq::create($faq);
            }

        }
    }
