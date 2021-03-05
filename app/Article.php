<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\NewArticle;
use App\User;

/**
 * @var id
 * @var $title string
 * @var $content text
 * @var $sent bool
 * @var $published bool
 * @var $user_id integer foreignId
 * @method user() author
 * @method theme() themes
 * */ 
class Article extends Model
{
    protected $guarded = [];

    /**
     * @return App\User author*/ 
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
