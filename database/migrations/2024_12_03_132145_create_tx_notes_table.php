<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTxNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tx_notes', function (Blueprint $table) {
            $table->id();
            $table->string('process_type', 50)->nullable();
            $table->string('process_name', 100)->nullable();
            $table->text('process_desc')->nullable();
            $table->bigInteger('id_process')->nullable();
            $table->json('data')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('tx_notes');
    }
}
