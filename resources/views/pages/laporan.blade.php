<x-main>
    <x-slot:title>{{ $title }}</x-slot>
        <x-pages>
            <div class="shadow-full p-5 w-[80vw] rounded-lg border-t-4 border-green-500 flex flex-col items-center">
                @if ($lpd->count())
                    <div class="w-full">
                        <a href="{{ url('lpd/create') }}">
                            <x-primary-button class="bg-green-400" :value="__('+ Buat lpd baru')" />
                        </a>
                    </div>
                    <table class="w-full" id="dataTable">
                        <thead>
                            <tr class="border-b-2 border-slate-900">
                                <th class="p-3">No.</th>
                                <th class="p-3">Nama Pegawai</th>
                                <th class="p-3">No SPT</th>
                                <th class="p-3">Hasil</th>
                                <th class="p-3">Tanggal</th>
                                <th class="p-3">View</th>
                                <th class="p-3">Cetak</th>
                                <th class="p-3">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lpd as $data)
                                <tr class="odd:bg-slate-200 border-b border-slate-500/50">
                                    <td class="p-3">{{ $loop->iteration }}</td>
                                    <td class="p-3">
                                        @foreach (unserialize($karyawan->where('id', $data->id)->first()->karyawan) as $k)
                                            {{ $loop->iteration . ' . ' . $k }}<br>
                                        @endforeach
                                    </td>
                                    <td class="p-3">{{ $data->nomor }}</td>
                                    <td class="p-3">{{ $data->hasil }}</td>
                                    <td class="p-3">{{ $data->tanggal }}</td>
                                    <td class="p-3 text-center">
                                        <form>
                                            <x-primary-button class="text-sm bg-blue-600">{{ __('Lihat') }}
                                            </x-primary-button>
                                        </form>
                                    </td>
                                    <td class="p-3 text-center">
                                        <form action="/print-lpd/{{ $data->id }}" method="post">
                                            @csrf
                                            <x-primary-button class="text-sm bg-green-400">{{ __('Cetak') }}
                                            </x-primary-button>
                                        </form>
                                    </td>
                                    <td class="p-3 text-center">
                                        <button data-ripple-light="true" data-popover-target="menu"
                                            class="middle none center rounded-lg p-1 text-xl font-bold uppercase text-black border border-gray-500/50 transition-all hover:shadow-lg hover:shadow-pink-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                            <i class="fas fa-bars p-3 cursor-pointer"></i>
                                        </button>
                                        <ul role="menu" data-popover="menu" data-popover-placement="bottom"
                                            class="absolute z-10 min-w-[180px] overflow-auto rounded-md border border-slate-200 bg-white p-2 font-sans text-sm font-normal text-slate-500 shadow-lg shadow-slate-500/10 focus:outline-none">
                                            <a href="{{ url('lpd/' . $data->karyawan) }}">
                                                <li role="menuitem"
                                                    class="block w-full cursor-pointer select-none rounded-md px-3 pt-[9px] pb-2 text-start leading-tight transition-all hover:bg-slate-300 hover:bg-opacity-80 hover:text-slate-900 focus:bg-slate-300 focus:bg-opacity-80 focus:text-slate-900 active:bg-slate-300 active:bg-opacity-80 active:text-slate-900">
                                                    <i class="fas fa-eye mr-1"></i>
                                                    View
                                                </li>
                                            </a>
                                            <a href="{{ url('lpd/' . $data->id . '/edit') }}">
                                                <li role="menuitem"
                                                    class="block w-full cursor-pointer select-none rounded-md px-3 pt-[9px] pb-2 text-start leading-tight transition-all hover:bg-slate-300 hover:bg-opacity-80 hover:text-slate-900 focus:bg-slate-300 focus:bg-opacity-80 focus:text-slate-900 active:bg-slate-300 active:bg-opacity-80 active:text-slate-900">
                                                    <i class="fas fa-edit mr-1"></i>
                                                    Edit
                                                </li>
                                            </a>
                                            <a href="{{ url('print-lpd/' . $data->id) }}">
                                                <li role="menuitem"
                                                    class="block w-full cursor-pointer select-none rounded-md px-3 pt-[9px] pb-2 text-start leading-tight transition-all hover:bg-slate-300 hover:bg-opacity-80 hover:text-slate-900 focus:bg-slate-300 focus:bg-opacity-80 focus:text-slate-900 active:bg-slate-300 active:bg-opacity-80 active:text-slate-900">
                                                    <i class="fas fa-print mr-1"></i>
                                                    Print
                                                </li>
                                            </a>
                                            <form action="{{ url('lpd/' . $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <li role="menuitem"
                                                    class="block w-full cursor-pointer select-none rounded-md px-3 pt-[9px] pb-2 text-start leading-tight transition-all hover:bg-slate-300 hover:bg-opacity-80 hover:text-red-600 focus:bg-slate-300 focus:bg-opacity-80 focus:text-red-600 active:bg-slate-300 active:bg-opacity-80 active:text-red-600">
                                                    <x-confirm />
                                                </li>
                                            </form>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h1 class="font-semibold text-3xl my-5">Data LPD masih kosong.</h1>
                    <a href="{{ url('lpd/create') }}">
                        <x-primary-button class="bg-green-400" :value="__('+ Buat lpd baru')" />
                    </a>
                @endif
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
