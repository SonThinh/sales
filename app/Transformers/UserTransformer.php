<?php


namespace App\Transformers;


use App\Model\Post;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{

    public function transform(User $user)
    {

        return [
            'id'    => $user->id,
            'name'  => $user->name,
            'email' => $user->email,
        ];
    }

}
