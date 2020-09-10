<?php

namespace App\Repositories;

use App\Model\Post;
use Illuminate\Support\Facades\DB;

class PostRepository extends EloquentRepository
{

    /**
     * get model
     *
     * @return string
     */
    public function getModel()
    {
        return Post::class;
    }

    public function createPost($attribute)
    {
        DB::beginTransaction();

        $post = $this->create([
            'user_id'     => auth()->user()->id(),
            'title'       => $attribute->title,
            'description' => $attribute->description,
        ]);
        DB::commit();

        return $post;
    }

    public function updatePost($attribute, $id)
    {
        DB::beginTransaction();

        $post = $this->update([
            'title'       => $attribute->title,
            'description' => $attribute->description,
        ]);
        DB::commit();

        return $post;
    }

}
