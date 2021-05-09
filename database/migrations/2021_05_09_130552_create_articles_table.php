<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            $table->string('article_title');
            $table->string('article_body');
            $table->string('article_status');
            $table->string('article_author');
            $table->string('article_headerimage');

            $table->unsignedBigInteger('login_id')->default(null)->nullable();
            $table->foreign('login_id')->references('id')->on('login')->onDelete('cascade');

            $table->unsignedBigInteger('category_id')->default(null)->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('article');
    }
}
