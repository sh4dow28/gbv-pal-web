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
        Schema::create('tbl_societe', function (Blueprint $table) {
            $table->id('idSoc');
            $table->string('raison_social')->unique();
            $table->string('domaineActivite');
            $table->string('telSoc')->unique();
            $table->string('mobileSoc')->unique()->default('');
            $table->string('emailSoc')->unique()->default('');
            $table->string('webSoc')->unique()->default('');
            $table->string('adrSoc');
            $table->string('qrtSoc');
            $table->string('villSoc');
            $table->string('paysSoc');
            $table->string('numFisc')->unique();
            $table->timestamps();

            $table->unsignedBigInteger('idRep');
            $table->foreign('idRep')->references('idRep')->on('tbl_rep_societe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_societe');
    }
};
