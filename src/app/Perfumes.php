<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfumes extends Model
{
    protected $table = 'perfumes';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
