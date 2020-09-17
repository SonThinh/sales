<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'show']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'add']);
    }

}
