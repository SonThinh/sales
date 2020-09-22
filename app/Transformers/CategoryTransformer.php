<?php


namespace App\Transformers;


use App\Model\Category;
use App\Model\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{

    public function transform(Category $cate)
    {
        return [
            'id'   => $cate->id,
            'name' => $cate->name,
        ];
    }

}
