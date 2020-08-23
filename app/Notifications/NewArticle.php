<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Article;

class NewArticle extends Notification
{
    use Queueable;

    public $article;


    public function __construct(Article $article)
    {
        $this->article = $article;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {
        return  [
            'article_id' => $this->article->id,
        ];
    }

}
