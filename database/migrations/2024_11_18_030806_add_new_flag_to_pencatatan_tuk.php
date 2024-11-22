<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFlagToPencatatanTuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pencatatan_tuk', function (Blueprint $table) {
            $table->boolean('is_new')->default(1);
            $table->boolean('is_updated')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pencatatan_tuk', function (Blueprint $table) {
            $table->dropColumn('is_new');
            $table->dropColumn('is_updated');
        });
    }
}
