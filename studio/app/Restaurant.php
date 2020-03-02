<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurants';

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function dish()
    {
        return $this->hasMany(Dish::class, 'restaurant_id', 'id');
    }


}
