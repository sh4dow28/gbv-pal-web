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
        Schema::create('tbl_visiteur', function (Blueprint $table) {
            $table->id('idVis');
            $table->string('nomVis');
            $table->string('id_typeVis');
            $table->string('num_idVis');
            $table->date('exp_idVis');
            $table->string('telVis');
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
        Schema::dropIfExists('visiteurs');
    }
};
