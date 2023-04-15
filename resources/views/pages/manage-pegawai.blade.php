<x-main>
    <x-slot:title>{{ $title }}</x-slot>
        <x-pages>
            <div class="p-5 w-[80vw] shadow-full rounded-lg border-t-4 border-indigo-600 overflow-auto">
                @if (session()->has('add_pegawai'))
                    <x-alert class="bg-green-400">
                        {{ session()->get('add_pegawai') }}
                    </x-alert>
                @endif
                @if (session()->has('delete_pegawai'))
                    <x-alert class="bg-green-400">
                        {{ session()->get('delete_pegawai') }}
                    </x-alert>
                @endif
                @if ($karyawans->count())
                    <div class="flex justify-between items-center">
                        <a href="{{ url('pegawai/create') }}">
                            <x-primary-button :value="__('+ Tambah')" class="bg-green-400" />
                        </a>
                    </div>
                    <table class="divide-y divide-gray-300" id="dataTable">
                        <thead>
                            <tr>
                                <th class="border-b border-gray-500/50 p-2">No.</th>
                                <th class="border-b border-gray-500/50 p-2">NIP</th>
                                <th class="border-b border-gray-500/50 p-2">Nama</th>
                                <th class="border-b border-gray-500/50 p-2">Nik</th>
                                <th class="border-b border-gray-500/50 p-2">Pangkat</th>
                                <th class="border-b border-gray-500/50 p-2">Golongan</th>
                                <th class="border-b border-gray-500/50 p-2">Jabatan</th>
                                <th class="border-b border-gray-500/50 p-2">Keterangan</th>
                                <th class="border-b border-gray-500/50 p-2">Diupdate pada</th>
                                <th class="border-b border-gray-500/50 p-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($karyawans as $karyawan)
                                <tr class="odd:bg-slate-200 value">
                                    <td class="border-b border-gray-500/50 p-2 text-center">{{ $loop->iteration }}.</td>
                                    <td class="border-b border-gray-500/50 p-2">{{ $karyawan->nip }}</td>
                                    <td class="w-full border-b border-gray-500/50 p-2">{{ $karyawan->nama }}</td>
                                    <td class="w-full border-b border-gray-500/50 p-2">{{ $karyawan->nik }}</td>
                                    <td class="border-b border-gray-500/50 p-2">{{ $karyawan->pangkat }}</td>
                                    <td class="border-b border-gray-500/50 p-2 text-center">{{ $karyawan->golongan }}
                                    </td>
                                    <td class="border-b border-gray-500/50 p-2">{{ $karyawan->jabatan }}</td>
                                    <td class="border-b border-gray-500/50 p-2">{{ $karyawan->keterangan }}</td>
                                    <td class="border-b border-gray-500/50 p-1 whitespace-nowrap">
                                        {{ $karyawan->updated_at }}</td>
                                    <td class="border-b border-gray-500/50 p-2 text-center">
                                        <i
                                            class="fas fa-bars bg-gray-300 p-3 rounded-lg border border-gray-500/50 cursor-pointer"></i>
                                        {{-- <a href="{{ url('pegawai/' . $karyawan->nama) }}">
                                            <x-submit-button class="bg-blue-600">Lihat
                                            </x-submit-button>
                                        </a>
                                        <a href="{{ url('pegawai/' . $karyawan->nama . '/edit') }}">
                                            <x-primary-button class="bg-green-400">{{ __('Edit') }}
                                            </x-primary-button>
                                        </a>
                                        <form action="{{ url('pegawai/' . $karyawan->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <x-submit-button class="bg-red-500"
                                                onclick="return confirm('Apakah yakin anda ingin menghapus data ini?')">
                                                {{ __('Hapus') }}</x-submit-button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5">
                        {{ $karyawans->links() }}
                    </div>
                @else
                    <h1 class="text-3xl">Data pegawai masih kosong</h1>
                    <a href="{{ url('pegawai/create') }}">
                        <x-primary-button :value="__('+ Tambah')" class="bg-green-400" />
                    </a>
                @endif
            </div>

            <div class="popup fixed inset-0 z-50 justify-center items-center bg-slate-900/10 backdrop-blur-sm hidden">
                <div>
                    <img src="">
                    <div>
                        <table>
                            <tr>
                                <td>{{ $karyawan->nama }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </x-pages>

        <script>
            $('.lihat').on('click', function(e) {
                e.preventDefault()
                $('.popup').css('display', 'flex')
                $('.popup').html($('.lihat').attr('href'))
            })

            $(document).ready(function() {
                $("#search").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $(".value").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    })
                })
            })

            // Data Table
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    paginate: false,

                })
            })
        </script>
</x-main>
