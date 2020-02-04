<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Book extends Authenticatable
{
    protected $table = 'books';

    public function author()
    {
        $this->hasOne(Author::class, 'id', 'author_id');
    }

    public function publication()
    {
        $this->hasOne(Publication::class, 'id', 'publication_id');
    }
}
