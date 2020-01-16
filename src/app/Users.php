<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    protected $connection = 'mysql';

    public function post()
    {
        return $this->hasMany('App\Post');
    }

}
