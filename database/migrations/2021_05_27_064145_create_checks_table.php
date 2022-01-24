<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checks', function (Blueprint $table) {
            $table->id();
            $table->integer('permohonans_id');
            $table->boolean('status_surat')->default(0)->nullable();
            $table->boolean('status_asosiasi')->default(0)->nullable();
            $table->boolean('status_organisasi')->default(0)->nullable();
            $table->boolean('status_klasifikasi')->default(0)->nullable();
            $table->boolean('status_skema')->default(0)->nullable();
            $table->boolean('status_asesor')->default(0)->nullable();
            $table->boolean('status_komitmen')->default(0)->nullable();
            $table->boolean('status_tuk')->default(0)->nullable();
            $table->boolean('status_sk')->default(0)->nullable();
            $table->boolean('status_laporan')->default(0)->nullable();
            $table->boolean('status_rekapitulasi')->default(0)->nullable();
            $table->string('keterangan_surat')->nullable();
            $table->string('keterangan_asosiasi')->nullable();
            $table->string('keterangan_organisasi')->nullable();
            $table->string('keterangan_klasifikasi')->nullable();
            $table->string('keterangan_skema')->nullable();
            $table->string('keterangan_asesor')->nullable();
            $table->string('keterangan_komitmen')->nullable();
            $table->string('keterangan_tuk')->nullable();
            $table->string('keterangan_sk')->nullable();
            $table->string('keterangan_laporan')->nullable();
            $table->string('keterangan_rekapitulasi')->nullable();
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
        Schema::dropIfExists('checks');
    }
}
