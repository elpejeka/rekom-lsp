<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->string('administrations_id');
            $table->string('users_id');
            $table->string('jenis_permohonan')->nullable();
            $table->string('status_submit')->nullable();
            $table->string('status_kelengkapan')->nullable();
            $table->string('status_verifikasi')->nullable();
            $table->string('status_permohonan')->nullable();
            $table->string('vv_berita_acara')->nullable();
            $table->text('surat_permohonan');
            $table->text('sk_lisensi');
            $table->string('pic')->nullable();
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
        Schema::dropIfExists('permohonans');
    }
}
