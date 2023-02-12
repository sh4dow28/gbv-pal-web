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
        Schema::create('tbl_badge_visiteur', function (Blueprint $table) {
            $table->id('idVBadge');
            $table->string('typeVBadge');
            $table->string('numVBadge');
            $table->string('etatVBadge');
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
        Schema::dropIfExists('tbl_badge_visiteur');
    }
};
