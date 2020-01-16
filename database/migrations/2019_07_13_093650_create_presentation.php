<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lien_galerie')->nullable();
            $table->string('lien_youtube')->nullable();
            $table->string('lien_youtube_presskit')->nullable();
            $table->string('info_jeu')->nullable();
            $table->string('qui_nous_sommes')->nullable();
            $table->string('logo')->nullable();
            $table->bigInteger('id_admin');
            $table->foreign('id_admin')->references('id')->on('utilisateur');
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
        Schema::dropIfExists('presentation');
    }
}
