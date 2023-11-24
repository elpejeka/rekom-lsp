<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAjjKanToSkLisensiLsp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sk_lisensi_lsp', function (Blueprint $table) {
            $table->text('sk_ajj')->nullable();
            $table->text('akreditasi_kan')->nullable();
            $table->date('masa_berlaku_kan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sk_lisensi_lsp', function (Blueprint $table) {
            $table->text('sk_ajj')->nullable();
            $table->text('akreditasi_kan')->nullable();
            $table->date('masa_berlaku_kan')->nullable();
        });
    }
}
