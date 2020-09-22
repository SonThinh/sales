<?php

namespace App\Repositories;

use App\Model\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository extends EloquentRepository
{

    /**
     * get model
     *
     * @return string
     */
    public function getModel()
    {
        return User::class;
    }

    public function createUser($attribute)
    {
        DB::beginTransaction();

        $user = $this->create([
            'email'    => $attribute->email,
            'name'     => $attribute->name,
            'password' => Hash::make($attribute->password),
        ]);
        DB::commit();

        return $user;
    }

    public function updateUser($attribute, $id)
    {
        DB::beginTransaction();

        $user = $this->update($id, [
            'email'    => $attribute->email,
            'name'     => $attribute->name,
        ]);
        DB::commit();

        return $user;
    }

}
