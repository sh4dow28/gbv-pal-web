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
        Schema::create('badges_production', function (Blueprint $table) {
            $table->unsignedBigInteger('idProd');
            $table->string('typeBadgeProd');
            $table->string('noBadge')->default('');
            $table->timestamps();

            $table->foreign('idProd')->references('idProd')->on('tbl_demande_production');
            $table->primary('idProd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('badges_production');
    }
};
