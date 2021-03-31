<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(LogoSeeder::class);
         $this->call(FooterSeeder::class);
        DB::table('users')->insert([
            'name' => 'MD.MainAdmin',
            'email' => 'kauser@gmail.com',
            'address'=> 'Dhanmondi, Kolabagan, Dhaka-1200',
            'Phone'=> '01755555555',
            'password' => bcrypt('123456'),
            'image' => 'image',
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'MD.Admin',
            'email' => 'admin@gmail.com',
            'address'=> 'Dhanmondi, Dhaka-1200',
            'Phone'=> '01766666666',
            'password' => bcrypt('123456'),
            'image' => 'image',
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'MD.User',
            'email' => 'user@gmail.com',
            'address'=> 'Kolabagan, Dhaka-1200',
            'Phone'=> '01788888888',
            'password' => bcrypt('123456'),
            'image' => 'image',
            'status' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
