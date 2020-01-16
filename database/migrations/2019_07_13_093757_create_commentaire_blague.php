<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentaireBlague extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaire_blague', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->date('date')->nullable();
            $table->bigInteger('id_utilisateur');
            $table->foreign('id_utilisateur')->references('id')->on('utilisateur');
            $table->bigInteger('id_blague');
            $table->foreign('id_blague')->references('id')->on('blague');
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
        Schema::dropIfExists('commentaire_blague');
    }
}
