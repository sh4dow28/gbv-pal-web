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
        Schema::create('tbl_rep_societe', function (Blueprint $table) {
            $table->id('idRep');
            $table->string('nomRep');
            $table->date('dobRep');
            $table->string('pobRep');
            $table->string('postRep');
            $table->string('telRep');
            $table->string('emailRep')->unique();
            $table->string('typeIDRep');
            $table->string('numIDRep');
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
        Schema::dropIfExists('representant_societes');
    }
};
