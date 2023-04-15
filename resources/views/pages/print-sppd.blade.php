<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <script src="{{ url('js/jquery.js') }}"></script>
</head>

<body class="flex justify-center w-screen p-10 border border-gray-4000">
    <div class="w-[80vw] flex flex-col">
        <div class="flex justify-around w-inherit">
            <img src="{{ url('icon/logo.png') }}" alt="" class="w-[100px]">
            <div class="flex flex-col items-center">
                <h1 class="font-bold text-xl">PEMERINTAH KABUPATEN TASIKMALAYA</h1>
                <h1 class="font-bold text-2xl">SEKRETARIAT DAERAH</h1><br>
                <p class="text-center">JL. Bojong Koneng By Pass No.254, Sukaasih, Kec. Singaparna,<br>Kabupaten
                    Tasikmalaya, Jawa Barat 46415
                </p>
            </div>
        </div>
        <hr class="border-4 border-black mt-5">
        <hr class="border-2 border-black mt-1">
        <div class="w-full flex justify-end mt-3">
            <table>
                <tr>
                    <td class="p-1">Lembar ke</td>
                    <td class="p-1">: 1</td>
                </tr>
                <tr>
                    <td class="p-1">Kode No</td>
                    <td class="p-1">: 1250</td>
                </tr>
            </table>
        </div>
        <h1 class="text-center font-semibold text-xl mt-2">SURAT PERINTAH
            PERJALANAN
            DINAS
        </h1>
        <h1 class="text-center">NOMOR : 1250/NPPD/II/{{ date('Y') }}</h1>
        <div class="w-full flex justify-center mt-5">
            <table>
                <tr>
                    <td class="p-1 border border-gray-400">1.</td>
                    <td class="p-1 border border-gray-400">Pejabat berwenang yang memberi perintah</td>
                    <td class="p-1 border border-gray-400">{{ $sppd->nm_pejabat }}</td>
                </tr>
                <tr>
                    <td class="p-1 border border-gray-400">2.</td>
                    <td class="p-1 border border-gray-400">Nama pegawai yang diperintah</td>
                    <td class="p-1 border border-gray-400">
                        @foreach (unserialize($sppd->where('id', $id)->first()->karyawan) as $data)
                            {{ $loop->iteration . '.' . $data }}
                            <br>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="p-1 border-l border-gray-400">3.</td>
                    <td class="p-1 border-l border-gray-400">a. Pangkat dan Golongan</td>
                    <td class="p-1 border border-gray-400">
                        @foreach ($karyawan as $data)
                            {{ $loop->iteration . '. Golongan ' . $karyawans->where('nama', $data)->first()->golongan }}
                            <br>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="p-1 border-l border-gray-400"></td>
                    <td class="p-1 border-l border-gray-400">b. Jabatan pegawai</td>
                    <td class="p-1 border border-gray-400">
                        @foreach ($karyawan as $data)
                            {{ $loop->iteration . '. ' . $karyawans->where('nama', $data)->first()->jabatan }}
                            <br>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="p-1 border border-gray-400">4.</td>
                    <td class="p-1 border border-gray-400">Maksud perjalanan dinas</td>
                    <td class="p-1 border border-gray-400">{{ $sppd->tujuan }}</td>
                </tr>
                <tr>
                    <td class="p-1 border border-gray-400">5.</td>
                    <td class="p-1 border border-gray-400">Alat angkut yang dipergunakan</td>
                    <td class="p-1 border border-gray-400">{{ $sppd->jenis_transportasi }}</td>
                </tr>
                <tr>
                    <td class="p-1 border border-gray-400">6.</td>
                    <td class="p-1 border border-gray-400">Tempat berangkat</td>
                    <td class="p-1 border border-gray-400">{{ $sppd->tmpt_berangkat }}</td>
                </tr>
                <tr>
                    <td class="p-1 border border-gray-400">7.</td>
                    <td class="p-1 border border-gray-400">Tempat tujuan</td>
                    <td class="p-1 border border-gray-400">{{ $sppd->tmpt_tujuan }}</td>
                </tr>
                <tr>
                    <td class="p-1 border border-gray-400">8.</td>
                    <td class="p-1 border border-gray-400">Lamanya perjalanan dinas</td>
                    <td class="p-1 border border-gray-400">{{ $sppd->lama_perjalanan }}</td>
                </tr>
                <tr>
                    <td class="p-1 border border-gray-400">9.</td>
                    <td class="p-1 border border-gray-400">Anggaran perjalanan dinas</td>
                    <td class="p-1 border border-gray-400">{{ $sppd->anggaran_perjalanan }}</td>
                </tr>
                <tr>
                    <td class="p-1 border border-gray-400">10.</td>
                    <td class="p-1 border border-gray-400">Tanggal Berangkat</td>
                    <td class="p-1 border border-gray-400">{{ $sppd->tgl_berangkat }}</td>
                </tr>
                <tr>
                    <td class="p-1 border border-gray-400">11.</td>
                    <td class="p-1 border border-gray-400">Tanggal harus kembali</td>
                    <td class="p-1 border border-gray-400">{{ $sppd->tgl_kembali }}</td>
                </tr>
                <tr>
                    <td class="p-1 border border-gray-400">12.</td>
                    <td class="p-1 border border-gray-400">Keterangan</td>
                    <td class="p-1 border border-gray-400">{{ $sppd->keterangan }}</td>
                </tr>
            </table>
        </div>
        <div class="w-full flex justify-end mt-5">
            <div>
                <table>
                    <tr>
                        <td>Dikeluarkan di</td>
                        <td>: Tasikmalaya</td>
                    </tr>
                    <tr>
                        <td>Pada tanggal</td>
                        <td>: 6 Maret 2023</td>
                    </tr>
                </table>
                <div class="mt-3">
                    <h1 class="text-center">BUPATI TASIKMALAYA</h1>
                    <h1 class="mt-16 text-center border-b border-black">ADE SUGIANTO</h1>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.print()
    </script>
</body>

</html>
