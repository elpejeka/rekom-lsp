<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLspCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lsp_certificates', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->integer('permohonans_id');
            $table->string('kode_skema');
            $table->string('jabker');
            $table->string('nama_skema');
            $table->string('klasifikasi');
            $table->string('sub_klasifikasi');
            $table->string('kualifikasi');
            $table->string('jumlah_unit');
            $table->string('acuan_skema');
            $table->text('upload_persyaratan');
            $table->text('standar_kompetensi');
            $table->text('kesesuaian')->nullable();
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
        Schema::dropIfExists('lsp_certificates');
    }
}
