<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoPrincipale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_principale', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('paragraphe');
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
        Schema::dropIfExists('info_principale');
    }
}
