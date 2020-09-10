<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $fillable
        = [
            'user_id',
            'title',
            'description',
        ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
