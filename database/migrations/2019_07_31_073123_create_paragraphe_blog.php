<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParagrapheBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paragraphe_blog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('paragraphe');
            $table->bigInteger('id_admin');
            $table->foreign('id_admin')->references('id')->on('utilisateur');
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
        Schema::dropIfExists('paragraphe_blog');
    }
}
