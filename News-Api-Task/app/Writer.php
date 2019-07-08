<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    protected $table = 'writers';

    protected $fillable = [
        'first_name',
        'last_name',
    ];

    public function news()
    {
        return $this->hasMany('App\News');
    }
}