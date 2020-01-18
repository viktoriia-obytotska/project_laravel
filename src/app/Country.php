<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Country extends Authenticatable
{
    protected $table = 'country';

    public function city() {
        return $this->hasMany(City::class);
    }
}


