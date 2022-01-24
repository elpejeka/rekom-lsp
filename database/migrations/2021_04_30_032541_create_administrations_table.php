<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrations', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_registrasi');
            $table->string('no_akta');
            $table->string('unsur_pembentuk');
            $table->string('nama_unsur');
            $table->string('nama_unsur_1');
            $table->string('nama_unsur_2');
            $table->string('kategori_lsp');
            $table->string('jenis_lsp');
            $table->text('alamat');
            $table->integer('kode_pos');
            $table->string('status_kepemilikan');
            $table->string('ketersediaan_sistem');
            $table->string('no_telp');
            $table->string('website')->nullable();
            $table->string('email')->unique();
            $table->string('jumlah_skema');
            $table->text('upload_persyaratan');
            $table->text('akta_pendirian');
            $table->text('bukti_kepemilikan');
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
        Schema::dropIfExists('administrations');
    }
}
