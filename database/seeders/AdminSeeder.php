<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Création d'un admin
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'role_id' => 1,
            'identity_reference' => $faker->unique()->bothify('ID-####'),
            'registration_number' => $faker->unique()->bothify('REG-####'),
            'sponsor_id' => null,
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // mot de passe par défaut
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Création d'utilisateurs réguliers
        /*foreach (range(1, 50) as $index) {
            DB::table('users')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'role_id' => 0,
                'identity_reference' => $faker->unique()->bothify('ID-####'),
                'registration_number' => $faker->unique()->bothify('REG-####'),
                'sponsor_id' => $faker->optional()->randomElement(DB::table('users')->pluck('id')->toArray()),
                'email' => $faker->unique()->safeEmail,
                'telephone' => $faker->phoneNumber,
                'email_verified_at' => $faker->optional()->dateTimeThisDecade(),
                'password' => Hash::make('password'), // mot de passe par défaut
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }*/
    }
}
