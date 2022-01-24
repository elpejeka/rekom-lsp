<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->id();
            $table->integer('permohonans_id');
            $table->boolean('verifikasi_surat')->default(0)->nullable();
            $table->boolean('verifikasi_asosiasi')->default(0)->nullable();
            $table->boolean('verifikasi_organisasi')->default(0)->nullable();
            $table->boolean('verifikasi_klasifikasi')->default(0)->nullable();
            $table->boolean('verifikasi_skema')->default(0)->nullable();
            $table->boolean('verifikasi_asesor')->default(0)->nullable();
            $table->boolean('verifikasi_komitmen')->default(0)->nullable();
            $table->boolean('verifikasi_tuk')->default(0)->nullable();
            $table->boolean('verifikasi_sk')->default(0)->nullable();
            $table->boolean('verifikasi_laporan')->default(0)->nullable();
            $table->boolean('verifikasi_rekapitulasi')->default(0)->nullable();
            $table->boolean('validasi_surat')->default(0)->nullable();
            $table->boolean('validasi_asosiasi')->default(0)->nullable();
            $table->boolean('validasi_organisasi')->default(0)->nullable();
            $table->boolean('validasi_klasifikasi')->default(0)->nullable();
            $table->boolean('validasi_skema')->default(0)->nullable();
            $table->boolean('validasi_asesor')->default(0)->nullable();
            $table->boolean('validasi_komitmen')->default(0)->nullable();
            $table->boolean('validasi_tuk')->default(0)->nullable();
            $table->boolean('validasi_sk')->default(0)->nullable();
            $table->boolean('validasi_laporan')->default(0)->nullable();
            $table->boolean('validasi_rekapitulasi')->default(0)->nullable();
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
        Schema::dropIfExists('verifications');
    }
}
