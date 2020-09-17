<?php

use App\Model\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::query()->where('name', 'admin')->pluck('id');
        $roleMember = Role::query()->where('name', 'member')->pluck('id');
        factory(User::class, 2)->create()->each(function ($user) use (
            $roleAdmin,
            $roleMember
        ) {
            $user->assignRole($roleAdmin);
            $user->assignRole($roleMember);
        });
        factory(User::class, 3)->create()->each(function ($user) use (
            $roleMember
        ) {
            $user->assignRole($roleMember);
        });
    }

}
