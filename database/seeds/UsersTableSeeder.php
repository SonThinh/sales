<?php

use App\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $roleAdmin  = Role::query()->where('name', 'admin')->pluck('id');
        $roleMember = Role::query()->where('name', 'member')->pluck('id');
        DB::table('users')->insert([
            'name'              => 'admin',
            'email'             => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password'          => \Illuminate\Support\Facades\Hash::make('123456789aA'),
            'remember_token'    => Str::random(10),
        ]);
        User::query()
            ->where('name', 'admin')
            ->first()
            ->assignRole($roleAdmin);

        factory(User::class, 2)->create()->each(function ($user) use (
            $roleAdmin,
            $roleMember
        ) {
            $user->assignRole($roleAdmin);
            $user->assignRole($roleMember);
        });
        factory(User::class, 5)->create()->each(function ($user) use (
            $roleMember
        ) {
            $user->assignRole($roleMember);
        });
    }

}
