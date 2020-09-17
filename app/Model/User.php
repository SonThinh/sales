<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{

    use Notifiable, HasRoles;

    protected $table = 'users';
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $fillable
        = [
            'name',
            'email',
            'password',
        ];

    protected $hidden
        = [
            'password',
            'remember_token',
        ];

    protected $casts
        = [
            'email_verified_at' => 'datetime',
        ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

}
