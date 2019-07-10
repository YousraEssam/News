<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'writer_id'
    ];
    
    protected $table = 'news';

    public function writer()
    {
        return $this->belongsTo('App\Writer');
    }
}