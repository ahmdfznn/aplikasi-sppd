<x-main>
    <x-slot:title>{{ $title }}</x-slot>
        <x-pages>
            <div class="flex justify-between mr-5">
                <div class="w-[40vw] p-5 shadow-full rounded-lg border-t-4 border-blue-600">
                    @if (session()->has('delete-admin'))
                        <div class="w-full bg-green-400 rounded-lg p-5 text-white my-5 text-xl">
                            {{ session()->get('delete-admin') }}
                        </div>
                    @endif
                    @if (session()->has('add-admin'))
                        <div class="w-full bg-green-400 rounded-lg p-5 text-white my-5 text-xl">
                            {{ session()->get('add-admin') }}
                        </div>
                    @endif
                    @if (session()->has('gagal-admin'))
                        <div class="w-full bg-green-400 rounded-lg p-5 text-white my-5 text-xl">
                            {{ session()->get('gagal-admin') }}
                        </div>
                    @endif
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border border-slate-500 p-2">No.</th>
                                <th class="border border-slate-500 p-2">Nama Admin</th>
                                <th class="border border-slate-500 p-2">Email</th>
                                <th class="border border-slate-500 p-2">Lihat</th>
                                <th class="border border-slate-500 p-2">Edit</th>
                                <th class="border border-slate-500 p-2">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($admin->count())
                                @foreach ($admin as $data)
                                    <tr class="odd:bg-slate-200">
                                        <td class="border border-slate-500 p-2 text-center">{{ $loop->iteration }}.</td>
                                        <td class="border border-slate-500 p-2">{{ $data->username }}</td>
                                        <td class="border border-slate-500 p-2">{{ $data->email }}</td>
                                        <td class="text-center border border-slate-500 p-2">
                                            <a href="{{ url($data->id) }}" id="lihat">
                                                <x-primary-button class="bg-green-400">{{ __('Lihat') }}
                                                </x-primary-button>
                                            </a>
                                        </td>
                                        <td class="text-center border border-slate-500 p-2">
                                            <a href="{{ url('pegawai/' . $data->id . '/edit') }}">
                                                <x-primary-button class="bg-green-400">{{ __('Edit') }}
                                                </x-primary-button>
                                            </a>
                                        </td>
                                        <td class="text-center border border-slate-500 p-2">
                                            <form action="{{ url('admin/' . $data->id) }}" method="post">
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
                    <h1 class="font-semibold text-2xl">Tambah admin</h1>
                    <form action="{{ url('admin') }}" method="post" class="mt-5">
                        @csrf
                        <div class="mt-2">
                            <x-label for="username" :value="__('Nama admin')" />
                            <x-text-input name="username" id="username" />
                        </div>
                        <div class="mt-2">
                            <x-label for="email" :value="__('Email')" />
                            <x-text-input type="email" name="email" id="email" />
                        </div>
                        <div class="mt-2">
                            <x-label for="password" :value="__('password')" />
                            <x-text-input type="password" name="password" id="password" />
                        </div>
                        <x-submit-button>{{ __('Tambah') }}</x-submit-button>
                    </form>
                </div>
            </div>
        </x-pages>
</x-main>
