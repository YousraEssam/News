<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    protected $table = 'writers';

    public function news()
    {
        return $this->hasMany('App\News');
    }
}