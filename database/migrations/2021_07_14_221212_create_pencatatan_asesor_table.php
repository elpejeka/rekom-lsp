<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencatatanAsesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencatatan_asesor', function (Blueprint $table) {
            $table->id();
            $table->integer('pencatatan_id');
            $table->string('nama_asesor');
            $table->string('slug');
            $table->string('nik');
            $table->string('alamat');
            $table->string('status_asesor');
            $table->string('no_registrasi_asesor');
            $table->integer('users_id');
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
        Schema::dropIfExists('pencatatan_asesor');
    }
}
