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
        <h1 class="text-center font-semibold text-xl mt-8 underline">LAPORAN PERJALANAN DINAS
        </h1>
        <div class="my-7">
            <p class="text-sm">Pada hari ini <span id="day"></span>
                <span>tanggal</span>
                <span id="date"></span>
                <span id="month"></span>
                <span id="year"></span>,Saya yang bertanda tangan di bawah ini :
            </p>
        </div>
        <div>
            <table>
                <tr>
                    <td class="p-2">Nama</td>
                    <td class="p-2">
                        @foreach ($nama as $n)
                            {{ $n }}
                            <br>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="p-2">Nip</td>
                    <td class="p-2"> : {{ $pegawai->nip }}</td>
                </tr>
                <tr>
                    <td class="p-2">Pangkat/Golongan</td>:
                    <td class="p-2"> : {{ $pegawai->pangkat }}/Golongan {{ $pegawai->golongan }}</td>
                </tr>
                <tr>
                    <td class="p-2">Jabatan</td>
                    <td class="p-2"> : {{ $pegawai->jabatan }}</td>
                </tr>
                <tr>
                    <td class="p-2">Unit Kerja</td>
                    <td class="p-2"> : {{ $pegawai->unit_kerja }}</td>
                </tr>
            </table>
        </div>
        <div class="mt-10">
            <p>Telah melaksanakan Perjalanan Dinas dalam rangka {{ $sppd->tujuan }} di
                {{ $sppd->tmpt_tujuan }},berdasarkan Surat Perintah Tugas Nomor {{ $sppd->nomor }},dari tanggal
                {{ $sppd->tgl_berangkat }} s/d {{ $sppd->tgl_kembali }} di {{ $sppd->tmpt_tujuan }}.</p>
            <div>
                <p>Adapun hasil perjalanan dinas tersebut adalah sebagai berikut :</p>
                <p>{{ $lpd->hasil }}</p>
            </div>
            <p>Demikianlah Laporan Hasil Perjalanan Dinas ini dibuat untuk dipergunakan seperlunya.</p>
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

        const day = new Date().getDay()
        const date = new Date().getDate()
        const month = new Date().getMonth() + 1
        const year = new Date().getFullYear()
        $('#date').html(date)
        $('#year').html(year)

        switch (day) {
            case 1:
                $('#day').html('Senin')
                break
            case 2:
                $('#day').html('Selasa')
                break
            case 3:
                $('#day').html('Rabu')
                break
            case 4:
                $('#day').html('Kamis')
                break
            case 5:
                $('#day').html('Jumat')
                break
            case 6:
                $('#day').html('Sabtu')
                break
            case 7:
                $('#day').html('Minggu')
                break
            default:
                $('#day').html('-')
                break
        }


        switch (month) {
            case 1:
                $('#month').html('Januari')
                break
            case 2:
                $('#month').html('Februari')
                break
            case 3:
                $('#month').html('Maret')
                break
            case 4:
                $('#month').html('April')
                break
            case 5:
                $('#month').html('Mei')
                break
            case 6:
                $('#month').html('Juni')
                break
            case 7:
                $('#month').html('Juli')
                break
            case 8:
                $('#month').html('Agustus')
                break
            case 9:
                $('#month').html('September')
                break
            case 10:
                $('#month').html('Oktober')
                break
            case 11:
                $('#month').html('November')
                break
            case 12:
                $('#month').html('Desember')
                break
            default:
                $('#month').html('-')
                break
        }
    </script>
</body>
