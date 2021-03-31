<?php

use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('footers')->insert([
            'name' => 'ekShop',
            'image' => 'a2i.PNG',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
