<x-main>
    <x-slot:title>{{ $title }}</x-slot>
        <x-pages>
            <div class="shadow-full w-[65vw] p-5 rounded-lg border-t-4 border-green-500">
                <form action="{{ url('pegawai/' . $karyawan->id) }}" method="post"
                    class="flex flex-col items-center w-full" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div
                        class="w-[200px] h-[200px] rounded-full overflow-hidden flex justify-center items-center mb-10 m-auto border-2 border-indigo-600">
                        <img src="@if ($karyawan->profile_picture) {{ asset('storage/' . $karyawan->profile_picture) }}
                        @else {{ url('/icon/user.png') }} @endif"
                            alt="profile" class="w-full img-preview">
                    </div>
                    <x-text-input type="file" name="image" id="image" autofocus accept=".jpg, .jpeg, .png" />
                    <br>
                    <div class="flex flex-col w-full">
                        <x-label for="nip" :value="__('Nip')" />
                        <x-text-input name="nip" id="name" autofocus required value="{{ $karyawan->nip }}" />
                    </div>
                    <div class="flex flex-col w-full">
                        <x-label for="nik" :value="__('Nik')" />
                        <x-text-input name="nik" id="nik" required value="{{ $karyawan->nik }}" />
                    </div>
                    <div class="flex flex-col w-full">
                        <x-label for="nama" :value="__('Nama')" />
                        <x-text-input name="nama" id="nama" required value="{{ $karyawan->nama }}" />
                    </div>
                    <div class="flex flex-col w-full">
                        <x-label for="pangkat" :value="__('Pangkat')" />
                        <x-text-input name="pangkat" id="pangkat" required value="{{ $karyawan->pangkat }}" />
                    </div>
                    <div class="flex flex-col w-full">
                        <x-label for="jabatan" :value="__('Jabatan')" />
                        <x-text-input name="jabatan" id="jabatan" required value="{{ $karyawan->jabatan }}" />
                    </div>
                    <div class="flex flex-col items-start w-full">
                        <x-label :value="__('Jenis Kelamin')" />
                        <div class="w-1/4 flex justify-around">
                            <div class="flex items-center justify-between w-[4vw] my-2">
                                <input type="radio" name="jenis_kelamin" id="pria" value="Pria"
                                    {{ $karyawan->jenis_kelamin == 'Pria' ? 'checked' : '' }}>
                                <x-label for="pria" :value="__('Pria')" />
                            </div>
                            <div class="flex items-center justify-between w-[6vw]">
                                <input type="radio" name="jenis_kelamin" id="wanita" value="Wanita"
                                    {{ $karyawan->jenis_kelamin == 'Wanita' ? 'checked' : '' }}>
                                <x-label for="wanita" :value="__('Wanita')" />
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <x-label for="tempat_lahir" :value="__('Tempat Lahir')" />
                        <x-text-input name="tempat_lahir" id="tempat_lahir" required
                            value="{{ $karyawan->tempat_lahir }}" />
                    </div>
                    <div class="flex flex-col w-full">
                        <x-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                        <x-text-input name="tanggal_lahir" id="tanggal_lahir" type="date" required
                            value="{{ $karyawan->tanggal_lahir }}" />
                    </div>
                    <div class="flex flex-col w-full">
                        <x-label for="nomor" :value="__('Nomor Telepon')" />
                        <x-text-input name="nomor" id="nomor" required value="{{ $karyawan->no_telepon }}" />
                    </div>
                    <div class="flex flex-col w-full">
                        <x-label for="agama" :value="__('Agama')" />
                        <x-text-input name="agama" id="agama" required value="{{ $karyawan->agama }}" />
                    </div>
                    <div class="flex flex-col items-start w-full">
                        <x-label :value="__('Status Menikah')" />
                        <div class="w-2/5 flex justify-around">
                            <div class="flex items-center justify-between w-[11vw] my-2">
                                <input type="radio" name="status" id="sudah_menikah" value="Sudah Menikah"
                                    {{ $karyawan->status_nikah == 'sudah menikah' ? 'checked' : '' }}>
                                <x-label for="sudah_menikah" :value="__('Sudah Menikah')" />
                            </div>
                            <div class="flex items-center justify-between w-[9vw]">
                                <input type="radio" name="status" id="belum_menikah" value="Belum Menikah"
                                    {{ $karyawan->status_nikah == 'belum menikah' ? 'checked' : '' }}>
                                <x-label for="belum_menikah" :value="__('Belum Nikah')" />
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <x-label for="alamat" :value="__('Alamat')" />
                        <textarea
                            class="resize-none w-full h-[20vh] border border-gray-400 focus:outline-2 focus:outline-green-500 focus:shadow-input rounded-lg p-2 my-2"
                            name="alamat" id="alamat">{{ $karyawan->alamat }}</textarea>
                    </div>
                    <div class="flex flex-col w-full">
                        <x-label :value="__('Golongan')" />
                        <select name="golongan" id="golongan">
                            @foreach ($golongan as $data)
                                <option value="{{ $data->id_golongan }}">{{ $data->nama_golongan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col w-full">
                        <x-label for="keterangan" :value="__('Keterangan')" />
                        <textarea
                            class="resize-none w-full h-[20vh] border border-gray-400 focus:outline-2 focus:outline-green-500 focus:shadow-input rounded-lg p-2 my-2"
                            name="keterangan" id="keterangan">{{ $karyawan->keterangan }}</textarea>
                    </div>
                    <x-submit-button>{{ __('Submit') }}</x-submit-button>
                </form>
            </div>
        </x-pages>

        <script>
            const img = document.querySelector('#image')
            $('#image').change(function(e) {

                const reader = new FileReader()
                reader.readAsDataURL(img.files[0])

                $(reader).on('load', function(e) {
                    $('.img-preview').attr('src', e.target.result)
                })
            })
        </script>
</x-main>
