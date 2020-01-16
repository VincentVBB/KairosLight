<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('association')->nullable();
            $table->string('lieu')->nullable();
            $table->string('plateforme')->nullable();
            $table->string('prix')->nullable();
            $table->string('langue')->nullable();
            $table->string('contact')->nullable();
            $table->string('reseaux')->nullable();
            $table->date('date_sortie')->nullable();
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
        Schema::dropIfExists('info');
    }
}
