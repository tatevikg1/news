<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesArticleThemePivotTable extends Migration
{

    public function up()
    {
        Schema::create('article_theme', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id');
            $table->foreignId('theme_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('article_theme');
    }
}
