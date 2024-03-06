<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLSPIntegrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lsp_integrations', function (Blueprint $table) {
            $table->id();
            $table->string('username_bnsp');
            $table->string('password_bnsp');
            $table->text('format_skema');
            $table->text('list_akun');
            $table->text('surat_permohonan');
            $table->string('nama_ketua');
            $table->string('email_ketua');
            $table->string('nik_ketua');
            $table->boolean('is_approve');
            $table->date('tgl_permohonan');
            $table->date('tgl_approve')->nullable();
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('l_s_p_integrations');
    }
}
