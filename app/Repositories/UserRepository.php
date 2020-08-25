<?php
namespace App\Repositories;

use App\Model\User;

class UserRepository extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return User::class;
    }

}
