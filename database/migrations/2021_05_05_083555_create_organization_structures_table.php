<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_structures', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->string('pengarah');
            $table->string('no_telp_pengarah');
            $table->string('no_telp_pengarah_1')->nullable();
            $table->string('no_telp_pengarah_2')->nullable();
            $table->string('no_telp_pengarah_3')->nullable();
            $table->string('no_telp_pengarah_4')->nullable();
            $table->string('no_telp_pengarah_5')->nullable();
            $table->string('pengarah_1')->nullable();
            $table->string('pengarah_2')->nullable();
            $table->string('pengarah_3')->nullable();
            $table->string('pengarah_4')->nullable();
            $table->string('pengarah_5')->nullable();
            $table->string('ketua');
            $table->string('no_ketua');
            $table->string('no_umum');
            $table->string('no_sertifikasi');
            $table->string('no_manajemen');
            $table->string('umum');
            $table->string('sertifikasi');
            $table->string('manajemen_mutu');
            $table->string('jumlah_karyawan');
            $table->text('upload_persyaratan');
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
        Schema::dropIfExists('organization_structures');
    }
}
