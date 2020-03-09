<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    public function client()
    {
        return $this->belongsToMany(Client::class);
    }
}
