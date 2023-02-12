<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_badge_visiteurs', function (Blueprint $table) {
            $table->string('codeUtil');
            $table->unsignedBigInteger('idVBadge');
            $table->unsignedBigInteger('idVis');

            $table->dateTime('dateDemBVisit')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('dateRetBVisit')->nullable();

            $table->foreign('codeUtil')->references('codeUtil')->on('tbl_utilisateur');
            $table->foreign('idVBadge')->references('idVBadge')->on('tbl_badge_visiteur');
            $table->foreign('idVis')->references('idVis')->on('tbl_visiteur');
            $table->primary(['codeUtil', 'idVBadge', 'idVis', 'dateDemBVisit']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demande_badge_visiteurs');
    }
};
