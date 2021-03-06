<?php

namespace Blog;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function actor() {
        return $this->hasMany('Blog\Actor');
    }

    public function movie() {
        return $this->hasMany('Blog\Movie');
    }

    public function category() {
        return $this->hasMany('Blog\Categorie');
    }
}
