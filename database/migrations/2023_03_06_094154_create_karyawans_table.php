<?php

use App\Models\Karyawan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('profile_picture')->nullable();
            $table->string('nip');
            $table->string('nik');
            $table->string('nama');
            $table->string('pangkat');
            $table->string('jabatan');
            $table->string('unit_kerja');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_telepon');
            $table->string('agama');
            $table->enum('status_nikah', ['belum menikah', 'sudah menikah']);
            $table->text('alamat');
            $table->unsignedBigInteger('golongan')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('golongan')->references('id')->on('golongan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
};
