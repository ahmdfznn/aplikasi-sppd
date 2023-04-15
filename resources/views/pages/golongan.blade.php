<x-main>
    <x-slot:title>{{ $title }}</x-slot>
        <x-pages>
            <div class="flex justify-between mr-5">
                <div class="p-5 w-[45vw] shadow-full rounded-lg border-t-4 border-blue-600">
                    @if (session()->has('delete-golongan'))
                        <x-alert class="bg-green-400">
                            {{ session()->get('delete-golongan') }}
                        </x-alert>
                    @endif
                    @if (session()->has('add-golongan'))
                        <x-alert class="bg-green-400">
                            {{ session()->get('add-golongan') }}
                        </x-alert>
                    @endif
                    @if (session()->has('gagal-golongan'))
                        <x-alert class="bg-red-500">
                            {{ session()->get('gagal-golongan') }}
                        </x-alert>
                    @endif
                    <table class="w-full" id="dataTable">
                        <thead>
                            <tr class="border-b-2 border-slate-900">
                                <th class="p-2">No.</th>
                                <th class="p-2">Golongan</th>
                                <th class="p-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($golongan->count())
                                @foreach ($golongan as $data)
                                    <tr class="odd:bg-slate-200 border-b border-slate-500/50 text-center">
                                        <td class="p-2">{{ $loop->iteration }}</td>
                                        <td class="p-2">{{ $data->nama_golongan }}</td>
                                        <td class="p-2 text-center">
                                            <i
                                                class="fas fa-bars bg-gray-300 p-3 rounded-lg border border-gray-500/50 cursor-pointer"></i>
                                        </td>
                                        {{-- <td class="p-2">
                                            <a href="/pegawai/{{ $data->id }}/edit">
                                                <x-primary-button class="bg-green-400">{{ __('Edit') }}
                                                </x-primary-button>
                                            </a>
                                        </td>
                                        <td class="p-2">
                                            <form action="{{ url('golongan/' . $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <x-submit-button class="bg-red-500"
                                                    onclick="return confirm('Apakah yakin anda ingin menghapus data ini?')">
                                                    {{ __('Hapus') }}</x-submit-button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="p-5 shadow-full rounded-lg border-t-4 border-blue-600 w-[35vw]">
                    <h1 class="font-semibold text-2xl">Tambah Golongan</h1>
                    <form action="{{ url('golongan') }}" method="post" class="mt-5">
                        @csrf
                        <div class="mt-2">
                            <x-label for="nama" :value="__('Nama Golongan')" />
                            <x-text-input name="nama" id="nama" />
                        </div>
                        <x-submit-button>{{ __('Tambah') }}</x-submit-button>
                    </form>
                </div>
            </div>
        </x-pages>

        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    paginate: false,

                })
            })
        </script>
</x-main>
