<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @var $id
 * @var $theme string
 * @var $slug string
*/
class Theme extends Model
{
    protected $guarded = [];

    /**
     * @return App\Article::class
    */ 
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
