<?php
namespace App\Repositories;

use App\Model\User;

class PostRepository extends EloquentRepository
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
