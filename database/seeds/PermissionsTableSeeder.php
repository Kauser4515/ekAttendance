<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'manage-SupperAdmin',
                'description' => 'Manage SupperAdmin..',
            ],
            [
                'name' => 'manage-admin',
                'description' => 'Manage Admin..',
            ],
            [
                'name' => 'manage-user',
                'description' => 'Manage User..',
            ],
        ];

        foreach ($permissions as $key => $permission){
            Permission::create($permission);
        }
    }
}
