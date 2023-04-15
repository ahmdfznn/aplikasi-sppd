<x-main>
    <x-slot:title>{{ $title }}</x-slot>
        <x-pages>
            <div class="flex mr-5">
                <div class="grid grid-cols-3 gap-5">
                    <a href="{{ url('pegawai') }}">
                        <div
                            class="h-[25vh] flex flex-col justify-between text-white bg-blue-400 rounded-sm shadow-full hover:hover-button cursor-pointer">
                            <div class="flex items-center justify-between pr-10">
                                <div>
                                    <h1 class="text-xl font-bold p-3">PEGAWAI</h1><br>
                                    <h1 class="text-xl p-3">{{ $karyawan->count() }}</h1>
                                </div>
                                <i class="fa-solid fa-user text-7xl"></i>
                            </div>
                            <div class="bg-blue-500 p-2">
                                <h1>Total pegawai</h1>
                            </div>
                        </div>
                    </a>
                    <a href="{{ url('sppd') }}">
                        <div
                            class="h-[25vh] flex flex-col justify-between text-white bg-blue-400 rounded-sm shadow-full hover:hover-button cursor-pointer">
                            <div class="flex items-center justify-between pr-10">
                                <div>
                                    <h1 class="text-xl font-bold p-3">SPPD</h1><br>
                                    <h1 class="text-xl p-3">{{ $sppd->count() }}</h1>
                                </div>
                                <i class="fa-solid fa-file text-7xl"></i>
                            </div>
                            <div class="bg-blue-500 p-2">
                                <h1>Total data SPPD</h1>
                            </div>
                        </div>
                    </a>
                    <a href="{{ url('sppd') }}">
                        <div
                            class="h-[25vh] flex flex-col justify-between text-white bg-red-500 rounded-sm shadow-full hover:hover-button cursor-pointer">
                            <h1 class="text-3xl font-bold p-3">SPPD</h1><br>
                            <p class="text-sm p-3">SURAT PERINTAH PERJALANAN DINAS</p>
                            <div class="bg-blue-500 p-2">
                                <p class="text-center">Lihat <i class="fa-solid fa-arrow-right ml-1"></i></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div
                    class="w-[20vw] flex items-center h-[25vh] flex-col p-3 shadow-full rounded-md ml-5 border-t-4 border-indigo-600">
                    <div class="flex flex-col items-center">
                        <div class="flex">
                            <h1 class="text-3xl font-semibold" id="hours"></h1>
                            <h1 class="text-3xl font-semibold" id="minutes"></h1>
                            <h1 class="text-3xl font-semibold" id="seconds"></h1>
                        </div>
                        <div class="flex">
                            <h1 class="text-lg" id="day"></h1>
                            <h1 class="text-lg" id="date"></h1>
                        </div>
                    </div>
                </div>
            </div>
        </x-pages>
        <script>
            setInterval(() => {
                const hours = new Date().getHours()
                const minutes = new Date().getMinutes()
                const seconds = new Date().getSeconds()
                const day = new Date().getDay()

                if (hours <= 9) {
                    $('#hours').html('0' + hours)
                } else {
                    $('#hours').html(hours)
                }
                if (minutes <= 9) {
                    $('#minutes').html(':0' + minutes)
                } else {
                    $('#minutes').html(':' + minutes)
                }
                if (seconds <= 9) {
                    $('#seconds').html(':0' + seconds)
                } else {
                    $('#seconds').html(':' + seconds)
                }
            }, 1)

            const year = new Date().getFullYear()
            const month = new Date().getMonth() + 1
            const date = new Date().getDate()
            const day = new Date().getDay()

            switch (day) {
                case 1:
                    $('#day').html('Senin,')
                    break
                case 2:
                    $('#day').html('Selasa,')
                    break
                case 3:
                    $('#day').html('Rabu,')
                    break
                case 4:
                    $('#day').html('Kamis,')
                    break
                case 5:
                    $('#day').html('Jumat,')
                    break
                case 6:
                    $('#day').html('Sabtu,')
                    break
                case 7:
                    $('#day').html('Minggu,')
                    break
                default:
                    $('#day').html('-')
                    break
            }

            switch (month) {
                case 1:
                    m = 'Januari'
                    break
                case 2:
                    m = 'Februari'
                    break
                case 3:
                    m = 'Maret'
                    break
                case 4:
                    m = 'April'
                    break
                case 5:
                    m = 'Mei'
                    break
                case 6:
                    m = 'Juni'
                    break
                case 7:
                    m = 'Juli'
                    break
                case 8:
                    m = 'Agustus'
                    break
                case 9:
                    m = 'September'
                    break
                case 10:
                    m = 'Oktober'
                    break
                case 11:
                    m = 'November'
                    break
                case 12:
                    m = 'Desember'
                    break
                default:
                    m = '-'
                    break
            }

            $('#date').html(date + ' ' + m + ' ' + year)
        </script>
</x-main>
