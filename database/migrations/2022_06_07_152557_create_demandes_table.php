
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
            $table->string('contact');
            $table->string('sexe');
            $table->string('ville_naissance');
            $table->string('photo');
            $table->string('releve');
            $table->string('numero_table');
            $table->string('serie');
            $table->string('mention');
            $table->string('departement');
            $table->string('commune');
            $table->string('centre');
            $table->integer('annee_obtention');
            $table->string('releve');
            $table->string('nom_pere');
            $table->string('nom_mere');
            $table->string('etablissement')->nullable();
            $table->string('jury')->nullable();
            $table->integer('contact_parent');
            $table->string('kkiapayPayement_id ');
            $table->enum('statut_demande',['valider', 'non_valider', 'generer','rejeter'])->default('non_valider');
            $table->enum('statut_payement',['non_payer', 'payer'])->default('non_payer');
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