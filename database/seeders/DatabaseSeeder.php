<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Golongan;
use App\Models\Karyawan;
use App\Models\User;
use Database\Factories\KaryawanFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        Golongan::create([
            'nama_golongan' => 'I'
        ]);

        Golongan::create([
            'nama_golongan' => 'II'
        ]);

        Golongan::create([
            'nama_golongan' => 'III'
        ]);

        Golongan::create([
            'nama_golongan' => 'IV'
        ]);

        Karyawan::create([
            'nip' => '123123',
            'nik' => '3206321508050002',
            'nama' => 'Ahmad Fauzan',
            'pangkat' => 'Sarjana Komputer',
            'jabatan' => 'Anggota Setda Kab.Tasikmalaya',
            'unit_kerja' => 'Setda Kab.Tasikmalaya',
            'jenis_kelamin' => 'Pria',
            'tempat_lahir' => 'Tasikmalaya',
            'tanggal_lahir' => '2005/08/15',
            'no_telepon' => '081287999762',
            'agama' => 'Islam',
            'status_nikah' => 'belum menikah',
            'alamat' => 'Kp.Cinusa Girang',
            'golongan' => '1',
            'keterangan' => ''
        ]);

        Karyawan::create([
            'nip' => '123123',
            'nik' => '3206321508050002',
            'nama' => 'Lusi Kuraisin',
            'pangkat' => 'Sarjana Komputer',
            'jabatan' => 'Anggota Setda Kab.Tasikmalaya',
            'unit_kerja' => 'Setda Kab.Tasikmalaya',
            'jenis_kelamin' => 'Wanita',
            'tempat_lahir' => 'Tasikmalaya',
            'tanggal_lahir' => '2005/08/25',
            'no_telepon' => '083116573229',
            'agama' => 'Islam',
            'status_nikah' => 'belum menikah',
            'alamat' => 'Kp.Sanding Timur',
            'golongan' => '1',
            'keterangan' => ''
        ]);

        User::create([
            'username' => 'ahmad',
            'email' => 'ahmad@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        Karyawan::factory(50)->create();
    }
}
