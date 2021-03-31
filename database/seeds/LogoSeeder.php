<?php

use Illuminate\Database\Seeder;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('logos')->insert([
            'alt' => 'ekShop',
            'image' => 'a2i.PNG',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('logos')->insert([
            'alt' => 'ekShop | Attendance',
            'image' => 'a2i1.PNG',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
