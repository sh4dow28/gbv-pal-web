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
        Schema::create('tbl_employe', function (Blueprint $table) {
            $table->id('idEmp');
            $table->string('nomEmp');
            $table->string('prenomEmp');
            $table->string('pereEmp');
            $table->string('mereEmp');
            $table->string('dobEmp');
            $table->string('pobEmp');
            $table->string('nationEmp');
            $table->string('sexeEmp');
            $table->string('adrEmp');
            $table->string('telEmp');
            $table->string('posteEmp');
            $table->string('typeIDEmp');
            $table->string('numIDEmp');
            $table->date('expIDEmp');

            $table->timestamps();

            $table->unsignedBigInteger('idSoc');
            $table->foreign('idSoc')->references('idSoc')->on('tbl_societe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employes');
    }
};
