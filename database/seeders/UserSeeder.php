<?php

 namespace Database\Seeders;

 use Illuminate\Support\Facades\DB;
 use Illuminate\Database\Console\Seeds\WithoutModelEvents;
 use Illuminate\Database\Seeder;
 use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Str;
 use faker\Factory as Faker;

 class UserSeeder extends Seeder
 {
     /**
      * Run the database seeders.
      */
     public function run(): void
     {
         // Single user seeding example (commented out in case it's not needed):
         // DB::table('users')->insert([
         //     'name' => Str::random(10),
         //     'email' => Str::random(10).'@test.com',
         //     'alamat' => Str::random(10),
         //     'password' => Hash::make('admin12345'),
         // ]);

         // Batch
         // Loop for creating 10 users
         // for ($i = 1; $i <= 10; $i++) {
         //     DB::table('users')->insert([
         //         'name' => Str::random(10),
         //         'email' => Str::random(10) . '@test.com',
         //         'alamat' => Str::random(10),
         //         'password' => Hash::make('admin12345'),
         //     ]);
         // }

         // Faker

         //set locale
         $faker = Faker::create('id_ID');

         for ($i = 1; $i <= 10; $i++) {
             DB::table('users')->insert([
                 'name' => $faker->name,
                 'email' => $faker->email,
                 'password' => Hash::make('admin12345'),
             ]);
         }
     }
 }