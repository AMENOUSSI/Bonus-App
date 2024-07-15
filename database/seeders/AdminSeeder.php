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
            'usertype' => 'admin',
            'identity_reference' => $faker->unique()->bothify('ID-####'),
            'registration_number' => $faker->unique()->bothify('REG-####'),
            'sponsor_id' => null,
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // mot de passe par défaut
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'first_name' => 'User Test',
            'last_name' => 'User',
            'usertype' => 'secretaire',
            'identity_reference' => $faker->unique()->bothify('ID-####'),
            'registration_number' => $faker->unique()->bothify('REG-####'),
            'sponsor_id' => null,
            'email' => 'secret@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secretaire'), // mot de passe par défaut
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}
