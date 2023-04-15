<x-main>
    <x-slot:title>{{ $title }}</x-slot>
        <x-pages>
            <div
                class="p-5 w-[80vw] shadow-full rounded-lg border-t-4 border-green-500 overflow-auto flex justify-between">
                <img src="/img/user.png" class="w-[30vw] rounded-lg">
                <div class="flex flex-col">
                    <table>
                        <tr>
                            <td class="p-1">Nip</td>
                            <td class="p-1">: {{ $pegawai->nip }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Nik</td>
                            <td class="p-1">: {{ $pegawai->nik }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Nama</td>
                            <td class="p-1">: {{ $pegawai->nama }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Pangkat</td>
                            <td class="p-1">: {{ $pegawai->pangkat }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Jabatan</td>
                            <td class="p-1">: {{ $pegawai->jabatan }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Unit Kerja</td>
                            <td class="p-1">: {{ $pegawai->unit_kerja }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Jenis Kelamin</td>
                            <td class="p-1">: {{ $pegawai->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Tempat Lahir</td>
                            <td class="p-1">: {{ $pegawai->tempat_lahir }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Tanggal Lahir</td>
                            <td class="p-1">: {{ $pegawai->tanggal_lahir }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Nomor Telepon</td>
                            <td class="p-1">: {{ $pegawai->no_telepon }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Agama</td>
                            <td class="p-1">: {{ $pegawai->agama }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Status Pernikahan</td>
                            <td class="p-1">: {{ $pegawai->status_nikah }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Alamat</td>
                            <td class="p-1">: {{ $pegawai->alamat }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Golongan</td>
                            <td class="p-1">: {{ $pegawai->golongan }}</td>
                        </tr>
                        <tr>
                            <td class="p-1">Keterangan</td>
                            <td class="p-1">: {{ $pegawai->keterangan }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </x-pages>
</x-main>
