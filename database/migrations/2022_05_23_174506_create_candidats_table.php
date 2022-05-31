<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->integer('contact');
            $table->string('sexe');
            $table->string('serie');
            $table->string('mention');
            $table->string('numero_table');
            $table->string('numero_reference');
            $table->string('annee_obtention');
            $table->date('date_naissance');
            $table->string('nom_pere');
            $table->string('nom_mere');
            $table->unsignedBigInteger('centre_id');
            $table->foreign('centre_id')->references('id')->on('centres')->onDelete('cascade');
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
        Schema::dropIfExists('candidats');
    }
};
