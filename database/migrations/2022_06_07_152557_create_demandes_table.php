
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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance' );
            $table->string('email');
            $table->integer('contact');
            $table->string('sexe');
            $table->string('ville_naissance');
            $table->string('photo');
            $table->string('numero_table');
            $table->string('serie');
            $table->string('mention');
            $table->string('departement');
            $table->string('commune');
            $table->string('centre');
            $table->integer('annee_obtention');
            $table->string('numero_reference');
            $table->string('nom_pere');
            $table->string('nom_mere');
            $table->integer('contact_parent');
            $table->enum('statut_demande',['valider', 'non_valider'])->default('non_valider');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('demandes');
    }
};