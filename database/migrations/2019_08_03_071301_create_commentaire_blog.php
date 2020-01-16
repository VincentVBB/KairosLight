<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentaireBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaire_blog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('commentaire');
            $table->string('pseudo');
            $table->date('date')->nullable();
            $table->bigInteger('id_blog');
            $table->foreign('id_blog')->references('id')->on('blog');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentaire_blog');
    }
}
