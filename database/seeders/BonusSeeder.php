<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as faker;

class BonusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Assurez-vous qu'il y a des utilisateurs dans la table
        $userIds = DB::table('users')->pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            DB::table('bonuses')->insert([
                'user_id' => $faker->randomElement($userIds),
                'period' => $faker->monthName . ' ' . $faker->year,
                'bonus_amount' => $faker->randomFloat(2, 100, 1000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
