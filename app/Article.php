<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\NewArticle;
use App\User;

class Article extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);

        // return $this->belongsTo(User::class)->as('author');
    }

    public function themes()
    {
        return $this->belongsToMany(Theme::class);
    }
}
