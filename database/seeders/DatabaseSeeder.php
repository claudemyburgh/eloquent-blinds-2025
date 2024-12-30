<?php

    namespace Database\Seeders;

    use App\Models\User;
    use Illuminate\Database\Seeder;
    use function config;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
            // User::factory(10)->create();

            User::factory()->create([
                'name' => 'Claude Myburgh',
                'email' => 'claude@eloquentblinds.co.za',
                'password' => config('contact-details.users.claude.password')
            ]);


            $this->call([
                CategorySeeder::class,
                ProductSeeder::class,
                RepresentativeSeeder::class,
                FaqSeeder::class
            ]);
        }
    }
