<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::all()->pluck('id');
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo($permission);
        $user  = Role::create(['name' => 'member']);
        $user->givePermissionTo($permission[1]);
    }

}
