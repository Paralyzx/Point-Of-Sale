<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as faker;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {
            DB::table('items')->insert([
                'category_id' => $faker->numberBetween(1, 5),
                'name' => $faker->words(2, true),
                'price' => $faker->numberBetween(5000, 50000),
                'stock' => $faker->numberBetween(10, 100),
            ]);
        }
    }
}