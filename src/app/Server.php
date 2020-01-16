<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $table = 'servers';

    public function users()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }
}
