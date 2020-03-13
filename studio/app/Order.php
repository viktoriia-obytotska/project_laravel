<?php

namespace App;

use App\Http\Requests\DishValidatorRequest;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function dish()
    {
        return $this->belongsToMany(Dish::class, 'order_dish');
    }
}
