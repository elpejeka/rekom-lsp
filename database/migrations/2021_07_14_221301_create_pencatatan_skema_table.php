<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencatatanSkemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencatatan_skema', function (Blueprint $table) {
            $table->id();
            $table->integer('pencatatan_id');
            $table->string('kode_skema');
            $table->string('nama_skema');
            $table->string('jabker');
            $table->string('klasifikasi');
            $table->string('sub_klasifikasi');
            $table->string('kualifikasi');
            $table->string('jumlah_unit');
            $table->string('acuan_skema');
            $table->text('upload_persyaratan');
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
        Schema::dropIfExists('pencatatan_skema');
    }
}
