<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Publication extends Authenticatable
{
    protected $table = 'publications';

    public function book()
    {
        $this->hasMany(Book::class, 'publication_id', 'id');
    }
}
