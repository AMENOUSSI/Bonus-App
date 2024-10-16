<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as faker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        // Créer les permissions
        $permissions = [
            'view users',
            'create users',
            'edit users',
            'delete users',
            'view ventes',
            'create ventes',
            'edit ventes',
            'delete ventes',
            'view produits',
            'create produits',
            'edit produits',
            'delete produits'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Créer les rôles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $superadminRole = Role::firstOrCreate(['name' => 'superadmin']);
        $secretaireRole = Role::firstOrCreate(['name' => 'secretaire']);

        // Assigner toutes les permissions au superadmin
        $superadminRole->givePermissionTo(Permission::all());

        // Assigner certaines permissions à l'admin
        $adminRole->givePermissionTo(['view users', 'create users', 'edit users', 'view ventes', 'create ventes', 'edit ventes']);

        // Assigner les permissions limitées au secretaire
        $secretaireRole->givePermissionTo(['view users', 'view ventes']);

        // Création d'un admin
        $admin = User::create([
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
        $admin->assignRole($adminRole); // Assigner le rôle admin

        // Création d'un superadmin
        $superadmin = User::create([
            'first_name' => 'Superadmin',
            'last_name' => 'Jules',
            'usertype' => 'user',
            'identity_reference' => $faker->unique()->bothify('ID-####'),
            'registration_number' => $faker->unique()->bothify('REG-####'),
            'sponsor_id' => null,
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('superadmin'), // mot de passe par défaut
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $superadmin->assignRole($superadminRole); // Assigner le rôle superadmin

        // Création d'un secrétaire
        $secretaire = User::create([
            'first_name' => 'Secretaire',
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
        $secretaire->assignRole($secretaireRole); // Assigner le rôle secrétaire
    }
}
