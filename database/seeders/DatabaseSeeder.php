<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Shipper;
use App\Models\Waybill;


use App\Models\Consignee;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $faker = Faker::create();

        User::factory()->create([
            'name' => 'junc',
            'email' => 'jcjr031064@yahoo.com',
            'password' => bcrypt('Cfkak7cv'),
        ]);

        for ($i = 0; $i < 20; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password123'),
            ]);
        }

        for ($i = 0; $i < 20; $i++) {
            Consignee::create([
                'name' => $faker->unique()->company,
                'phone_number' => $faker->numerify('09#########'), // Generates 11-digit random phone numbers
            ]);
        }
        for ($i = 0; $i < 20; $i++) {
            Shipper::create([
                'name' => $faker->unique()->company,
                'phone_number' => $faker->numerify('09#########'), // Generates 11-digit phone numbers
            ]);
        }

        User::all()->each(function ($user) {
            Waybill::factory(10)->create([
                'user_id' => $user->id,  // Use the current user's ID instead of hardcoding 1
            ]);
        });



    }
}
