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
        Schema::table('demandes', function (Blueprint $table) {
            $table->dateTime('validated_at')->nullable();
            $table->dateTime('generated_at')->nullable();
            $table->dateTime('rejected_at')->nullable();
            $table->dateTime('updated_by_user_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('demandes', function (Blueprint $table) {
            $table->dropColumn('validated_at');
            $table->dropColumn('updated_by_user_at');
            $table->dropColumn('rejected_at');
            $table->dropColumn('generated_at');

        });
    }
};
