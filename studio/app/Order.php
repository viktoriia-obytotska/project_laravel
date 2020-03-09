<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }
}
