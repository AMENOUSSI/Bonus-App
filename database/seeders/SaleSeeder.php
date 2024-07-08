<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Assurez-vous qu'il y a des utilisateurs et des produits dans les tables
        $userIds = DB::table('users')->pluck('id')->toArray();
        $productIds = DB::table('products')->pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            $quantity = $faker->numberBetween(1, 10);
            $productId = $faker->randomElement($productIds);
            $price = DB::table('products')->where('id', $productId)->value('price');
            $totalPrice = $quantity * $price;

            DB::table('sales')->insert([
                'user_id' => $faker->randomElement($userIds),
                'product_id' => $productId,
                'quantity' => $quantity,
                'total_price' => $totalPrice,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
