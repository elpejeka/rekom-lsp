<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuks', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->string('nama_tuk');
            $table->string('alamat');
            $table->text('cakupan');
            $table->string('kode_tuk')->nullable();
            $table->string('jenis_tuk')->nullable();
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
        Schema::dropIfExists('tuks');
    }
}
