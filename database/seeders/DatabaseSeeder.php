<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as FakerFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        // Generate dummy users with role between 0 and 1
        for ($i = 0; $i < 10; $i++) {
            $user = [
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => bcrypt('password'),
                'role' => $faker->numberBetween(0, 1),
            ];

            User::create($user);
        }
    }
}
