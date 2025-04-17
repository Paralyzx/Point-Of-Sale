<?php

 namespace Database\Seeders;

 use Illuminate\Database\Seeder;
 use Illuminate\Support\Facades\DB;
 use Faker\Factory as Faker;

 class TransactionSeeder extends Seeder
 {
     /**
      * Run the database seeds.
      */
     public function run(): void
     {
         $faker = Faker::create('id_ID');
         for($i=1; $i <=10; $i++ ){
             DB::table('transactions')->insert([
                 'user_id' => $faker->numberBetween(1, 10),
                 'date' => $faker->date,
                 'total' => $faker->numberBetween(10000, 1000000),
                 'pay_total' => $faker->numberBetween(100000, 1000000)
             ]);
         }
     }
 }