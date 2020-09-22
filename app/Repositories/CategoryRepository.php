<?php

namespace App\Repositories;

use App\Model\Category;

class CategoryRepository extends EloquentRepository
{

    /**
     * get model
     *
     * @return string
     */
    public function getModel()
    {
        return Category::class;
    }

}
