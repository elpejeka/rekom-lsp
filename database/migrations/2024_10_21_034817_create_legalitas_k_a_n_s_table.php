<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalitasKANSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legalitas_kan', function (Blueprint $table) {
            $table->id();
            $table->string('no_sertifikat_kan')->nullable();
            $table->text('sertifikat_kan')->nullable();
            $table->date('masa_berlaku')->nullable();
            $table->unsignedBigInteger('pencatatan_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('legalitas_kan');
    }
}
