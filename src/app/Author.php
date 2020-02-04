<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Author extends Authenticatable
{
    protected $table = 'authors';

    public function book()
    {
        $this->hasMany(Book::class, 'author_id', 'id');
    }
}
