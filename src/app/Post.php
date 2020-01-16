<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $connection = 'db_posts';

    public function users()
    {
        return $this->belongsTo('App\Users');
    }
}
