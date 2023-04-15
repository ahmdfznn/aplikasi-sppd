<x-main>
    <x-slot:title>{{ $title }}</x-slot>
        <x-pages>
            <div class="shadow-full w-[65vw] p-5 rounded-lg border-t-4 border-green-500">
                <form action="{{ url('lpd') }}" method="post" class="flex flex-col items-center w-full"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col w-full">
                        <x-text-input name="nomor" id="nomor" :label="__('Nomor')" autofocus required
                            value="{{ old('nomor') }}" />
                        @error('nomor')
                            <x-error>{{ $message }}</x-error>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full">
                        <x-label for="nm_pegawai" :value="__('Nama pegawai yang diperintah')" />
                        <select
                            class="js-example-basic-multiple p-2 my-2 focus:shadow-input focus:outline-2 focus:outline-green-500"
                            name="nama" multiple>
                            @foreach ($pegawai as $data)
                                <option value="{{ $data->nama }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
                        @error('nama')
                            <x-error>{{ $message }}</x-error>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full">
                        <x-label for="hasil" :value="__('Hasil')" />
                        <input id="hasil" type="hidden" name="hasil">
                        <trix-editor input="hasil"></trix-editor>
                        @error('hasil')
                            <x-error>{{ $message }}</x-error>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full">
                        <x-label for="keterangan" :value="__('Keterangan')" />
                        <textarea
                            class="resize-none w-full h-[20vh] border border-gray-400 focus:outline-2 focus:outline-green-500 focus:shadow-input rounded-lg p-2 my-2"
                            name="keterangan" id="keterangan">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <x-error>{{ $message }}</x-error>
                        @enderror
                    </div>
                    <x-submit-button>{{ __('Buat') }}</x-submit-button>
                </form>
            </div>
        </x-pages>
</x-main>
