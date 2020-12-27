<?php

namespace App\Policies;

use App\Article;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
// use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function update(User $user, Article $article)
    {
        // if the auth user is the editor the article should be sent or his owen
        if((int)$user->role === 0 && ($article->sent == true ||  $user->id === (int)$article->user_id)){
            return true;
        }

        if($user->id === (int)$article->user_id && $article->sent == false){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function delete(User $user, Article $article)
    {
        if ((int)$user->role === 0 && $user->id === (int)$article->user_id){
            return true;
        }
        if($user->id === (int)$article->user_id && $article->sent == false){
            return true;
        }
        return false;
    }

}
