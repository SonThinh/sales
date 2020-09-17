<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $fillable
        = [
            'name',
        ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }

}
