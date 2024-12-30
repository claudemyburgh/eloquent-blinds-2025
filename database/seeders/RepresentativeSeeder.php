<?php

    namespace Database\Seeders;

    use App\Models\Representative;
    use Illuminate\Database\Seeder;

    class RepresentativeSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            $representatives = require __DIR__ . '/../2024-12-30/2024_12_30_193540_representatives.php';


            foreach ($representatives as $rep) {
                Representative::create($rep);
            }
        }
    }
