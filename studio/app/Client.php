<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    public function order()
    {
        return $this->hasMany(Order::class, 'client_id', 'id');
    }

    public function address()
    {
        return $this->belongsToMany(Address::class);
    }
}
