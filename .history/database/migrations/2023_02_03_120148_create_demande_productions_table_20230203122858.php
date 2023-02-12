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
        Schema::create('tbl_demande_production', function (Blueprint $table) {
            $table->id('idProd');
            $table->string('zoneAcc');
            $table->string('typeProd');
            // dateProd
            $table->string('statProd');
            $table->timestamps();

            $table->string('codeUtil');
            $table->unsignedBigInteger('idEmp');

            $table->foreign('codeUtil')->references('codeUtil')->on('tbl_utilisateur');
            $table->foreign('idEmp')->references('idEmp')->on('tbl_employe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_demande_production');
    }
};
