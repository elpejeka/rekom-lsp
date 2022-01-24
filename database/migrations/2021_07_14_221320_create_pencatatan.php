<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencatatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencatatan', function (Blueprint $table) {
            $table->id();
            $table->string('permohonan')->default('Pencatatan');
            $table->string('administrations_id');
            $table->string('slug');
            $table->text('upload_persyaratan');
            $table->text('sk_lisensi');
            $table->text('sertifikat'); 
            $table->integer('users_id');
            $table->integer('submit_pencatatan')->nullable();
            $table->integer('approve')->nullable();
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
        Schema::dropIfExists('pencatatan');
    }
}
