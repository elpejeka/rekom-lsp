<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAsesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_asesor', function (Blueprint $table) {
            $table->id();
            $table->integer("asesor_id");
            $table->string("klasifikasi");
            $table->string('subklasifikasi');
            $table->string('no_sertifikat');
            $table->string('nrka');
            $table->date('masa_berlaku');
            $table->string('no_sertifikat_asesor');
            $table->string('no_blanko');
            $table->date('masa_berlaku_sertifikat');
            $table->text('ska');
            $table->text('sertifikat_asesors');
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
        Schema::dropIfExists('detail_asesor');
    }
}
