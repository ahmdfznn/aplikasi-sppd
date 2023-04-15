<x-main>
    <x-slot:title>{{ $title }}</x-slot>
        <x-pages>
            <div class="shadow-full w-[65vw] p-5 rounded-lg border-t-4 border-green-500">
                <h1 class="font-medium text-2xl text-gray-800 mb-3">Buat SPPD</h1>
                <form action="{{ url('sppd/create') }}" method="post" class="flex flex-col items-center w-full"
                    enctype="multipart/form-data">
                    @csrf
                    <x-input>
                        <x-text-input :label="__('Nomor')" name="nomor" id="nomor" autofocus required
                            value="{{ $data + 1 . '/Setda/Sppd/' . date('M') . '/' . date('Y') }}" />
                        @error('nomor')
                            <x-error>{{ $message }}</x-error>
                        @enderror
                    </x-input>
                    <x-input>
                        <x-text-input :label="__('Nama Pejabat')" name="nm_pejabat" id="name" required
                            value="{{ old('nm_pejabat') }}" />
                        @error('nm_pejabat')
                            <x-error>{{ $message }}</x-error>
                        @enderror
                    </x-input>
                    <div class="flex flex-col w-full my-3">
                        <x-label value="Pegawai" />
                        <select
                            class="js-example-basic-multiple p-2 mt-3 focus:shadow-input focus:outline-2 focus:outline-green-500"
                            name="karyawan[]" multiple id="nm_pegawai">
                            @foreach ($pegawai as $data)
                                <option value="{{ $data->nama }}"
                                    {{ $data->nama == old('karyawan') ? 'selected' : '' }}>
                                    {{ $data->nama }}</option>
                            @endforeach
                        </select>
                        @error('karyawan')
                            <x-error>{{ $message }}</x-error>
                        @enderror
                    </div>
                    <x-input>
                        <x-label value="Tujuan" />
                        <input id="tujuan" type="hidden" name="tujuan">
                        <trix-editor input="tujuan">{{ strip_tags(old('tujuan')) }}</trix-editor>
                        @error('tujuan')
                            <x-error>{{ $message }}</x-error>
                        @enderror
                    </x-input>
                    <x-input>
                        <x-text-input :label="__('Tempat Berangkat')" name="tmpt_berangkat" id="berangkat" required
                            value="{{ old('tmpt_berangkat') }}" />
                        @error('tmpt_berangkat')
                            <x-error>{{ $message }}</x-error>
                        @enderror
                    </x-input>
                    <x-input>
                        <x-text-input :label="__('Tempat Tujuan')" name="tmpt_tujuan" id="tujuan" required
                            value="{{ old('tmpt_tujuan') }}" />
                        @error('tmpt_tujuan')
                            <x-error>{{ $message }}</x-error>
                        @enderror
                    </x-input>
                    <x-input>
                        <x-text-input :label="__('Lama Perjalanan')" name="lama_perjalanan" id="lama" required
                            value="{{ old('lama') }}" />
                        @error('lama_perjalanan')
                            <x-error>{{ $message }}</x-error>
                        @enderror
                    </x-input>
                    <x-input>
                        <x-text-input :label="__('Anggaran Perjalanan')" name="anggaran_perjalanan" id="anggaran" required
                            value="{{ old('anggaran_perjalanan') }}" />
                        @error('anggaran_perjalanan')
                            <x-error>{{ $message }}</x-error>
                        @enderror
                    </x-input>
                    <div class="flex flex-col w-full my-3">
                        <x-label value="Jenis Transportasi" />
                        <select
                            class="js-example-basic-multiple p-2 my-2 focus:shadow-input focus:outline-2 focus:outline-green-500 border border-gray-500 rounded-lg"
                            name="jenis_transportasi">
                            @foreach ($jenis_transportasi as $data)
                                <option value="{{ $data->jenis_transportasi }}"
                                    {{ $data->jenis_transportasi == old('jenis_transportasi') ? 'selected' : '' }}>
                                    {{ $data->jenis_transportasi }}
                                </option>
                            @endforeach
                        </select>
                        @error('jenis_transportasi')
                            <x-error>{{ $message }}</x-error>
                        @enderror
                    </div>
                    <x-input>


                        <div date-rangepicker class="flex items-center w-full">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input name="tgl_berangkat" type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tanggal Berangkat">
                            </div>
                            <span class="mx-4 text-gray-500">Sampai</span>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input name="tgl_kembali" type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Tanggal Kembali">
                            </div>
                        </div>
                        @error('tgl_berangkat')
                            <x-error>{{ $message }}</x-error>
                        @enderror
                        @error('tgl_kembali')
                            <x-error>{{ $message }}</x-error>
                        @enderror
                    </x-input>
                    <x-input>
                        <x-label value="Keterangan" />
                        <input id="keterangan" type="hidden" name="keterangan">
                        <trix-editor input="keterangan">{{ strip_tags(old('keterangan')) }}</trix-editor>
                        @error('keterangan')
                            <x-error>{{ $message }}</x-error>
                        @enderror
                    </x-input>
                    <x-input>
                        <x-text-input :label="__('Tempat Keluarnya Surat')" type="text" name="tmpt_keluar" id="tmpt_keluar" required
                            value="{{ old('tmpt_keluar') }}" />
                        @error('tmpt_keluar')
                            <x-error>{{ $message }}</x-error>
                        @enderror
                    </x-input>
                    <x-submit-button>{{ __('Buat') }}</x-submit-button>
                </form>
            </div>
        </x-pages>
</x-main>
