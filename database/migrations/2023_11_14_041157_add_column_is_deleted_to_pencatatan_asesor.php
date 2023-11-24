<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIsDeletedToPencatatanAsesor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pencatatan_asesor', function (Blueprint $table) {
            $table->boolean('is_deleted')->default(false);
            $table->date('acc_deleted')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pencatatan_asesor', function (Blueprint $table) {
            $table->boolean('is_deleted')->default(false);
            $table->date('acc_deleted')->nullable();
        });
    }
}
