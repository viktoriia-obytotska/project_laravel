<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function restaurant()
    {
        return $this->belongsToMany(Restaurant::class);
    }

    public function dish()
    {
        return $this->hasMany(Dish::class, 'category_id', 'id');
    }
}
