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
        Schema::create('tbl_utilisateur', function (Blueprint $table) {
            // $table->id('id');
            $table->string('codeUtil')->primary();
            $table->string('nomUtil');
            $table->string('droitUtil');
            $table->string('pseudoUtil');
            $table->string('password');
            $table->string('email');
            $table->rememberToken();
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
        Schema::dropIfExists('tbl_utilisateur');
    }
};
