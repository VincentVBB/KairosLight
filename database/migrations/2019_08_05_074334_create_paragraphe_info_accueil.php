<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParagrapheInfoAccueil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paragraphe_info_accueil', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('paragraphe');
            $table->bigInteger('id_admin');
            $table->foreign('id_admin')->references('id')->on('utilisateur');
            $table->bigInteger('id_info');
            $table->foreign('id_info')->references('id')->on('presentation');
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
        Schema::dropIfExists('paragraphe_info_accueil');
    }
}
