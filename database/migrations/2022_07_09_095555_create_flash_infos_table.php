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
        Schema::create('flash_infos', function (Blueprint $table) {
            $table->id();
            $table->date("date_debut");
            $table->date("date_fin");
            $table->text("contenu");
            $table->enum("status",["active","inactive"])->default("inactive");
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
        Schema::dropIfExists('flash_infos');
    }
};
