<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nip' => '124434',
            'nik' => '3205321508050002',
            'nama' => fake()->userName(),
            'pangkat' => fake()->word(),
            'jabatan' => fake()->sentence(3),
            'unit_kerja' => fake()->sentence(3),
            'jenis_kelamin' => 'Pria',
            'tempat_lahir' => fake()->address(),
            'tanggal_lahir' => fake()->date(),
            'no_telepon' => '081287999762',
            'agama' => fake()->word(),
            'status_nikah' => 'belum menikah',
            'alamat' => fake()->address(),
            'golongan' => '1',
            'keterangan' => Str::limit(fake()->paragraph(), 10, '...')
        ];
    }
}
