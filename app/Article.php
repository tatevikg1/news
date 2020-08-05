<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public function user()
    {
        // return $this->belongsTo(User::class);

        return $this->belongsTo(User::class)->as('author');
    }

    public function themes()
    {
        return $this->belongsToMany(Theme::class);
    }
}
