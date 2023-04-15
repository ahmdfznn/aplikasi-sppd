<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sppd', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('nm_pejabat');
            $table->string('karyawan');
            $table->text('tujuan');
            $table->text('tmpt_berangkat');
            $table->text('tmpt_tujuan');
            $table->string('lama_perjalanan');
            $table->string('anggaran_perjalanan');
            $table->string('jenis_transportasi');
            $table->date('tgl_berangkat');
            $table->date('tgl_kembali');
            $table->text('keterangan')->nullable();
            $table->string('tmpt_keluar');
            $table->date('tgl_keluar')->nullable()->default(now());
            $table->timestamps();

            // $table->foreign('id_karyawan')->references('id')->on('karyawan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sppds');
    }
};
