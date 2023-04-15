<x-main>
    <x-slot:title>{{ $title }}</x-slot>
        <x-pages>
            <div class="flex justify-between mr-5">
                <div class="w-[40vw] p-5 shadow-full rounded-lg border-t-4 border-blue-600">
                    @if (session()->has('delete-transportasi'))
                        <x-alert class="bg-green-400">
                            {{ session()->get('delete-transportasi') }}
                        </x-alert>
                    @endif
                    @if (session()->has('add-transportasi'))
                        <x-alert class="bg-green-400">
                            {{ session()->get('add-transportasi') }}
                        </x-alert>
                    @endif
                    @if (session()->has('gagal-transportasi'))
                        <x-alert class="bg-red-500">
                            {{ session()->get('gagal-transportasi') }}
                        </x-alert>
                    @endif
                    <table class="table-auto w-full" id="dataTable">
                        <thead>
                            <tr class="border-b-2 border-slate-900">
                                <th class="p-2">No.</th>
                                <th class="p-2">Jenis Transportasi</th>
                                <th class="p-2">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($transportasi->count())
                                @foreach ($transportasi as $data)
                                    <tr class="odd:bg-slate-200 border-b border-slate-500/50">
                                        <td class="p-2 text-center">{{ $loop->iteration }}.</td>
                                        <td class="p-2">{{ $data->jenis_transportasi }}</td>
                                        <td class="p-2">
                                            <form action="{{ url('transportasi/' . $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <x-submit-button class="bg-red-500"
                                                    onclick="return confirm('Apakah yakin anda ingin menghapus data ini?')">
                                                    {{ __('Hapus') }}</x-submit-button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="w-[40vw] p-5 shadow-full rounded-lg border-t-4 border-blue-600">
                    <h1 class="font-semibold text-2xl">Tambah jenis transportasi</h1>
                    <form action="{{ url('transportasi') }}" method="post" class="mt-5">
                        @csrf
                        <div class="mt-2">
                            <x-label for="nama" :value="__('Nama Transportasi')" />
                            <x-text-input name="nama" id="nama" required />
                        </div>
                        <x-submit-button>{{ __('+ Tambah') }}</x-submit-button>
                    </form>
                </div>
            </div>
        </x-pages>

        <script>
            // Data Table
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    paginate: false,

                })
            })
        </script>
</x-main>
