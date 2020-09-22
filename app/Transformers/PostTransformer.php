<?php


namespace App\Transformers;


use App\Model\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{

    public function transform(Post $post, $curLocale)
    {
        Carbon::setLocale($curLocale);

        return [
            'id'          => $post->id,
            'user_name'   => $post->user->name,
            'title'       => $post->title,
            'description' => $post->description,
            'created_at'  => $post->created_at->diffForHumans(\Carbon\Carbon::now()),
            'updated_at'  => $post->updated_at->diffForHumans(\Carbon\Carbon::now()),
            'category'    => $post->category->name,
        ];
    }

}
