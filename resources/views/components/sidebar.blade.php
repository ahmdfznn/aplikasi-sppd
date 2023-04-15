<div class="w-screen fixed bg-slate-900 backdrop-blur-xl flex items-center justify-between z-[100] pr-10 text-white">
    <div class="flex items-center">
        <div class="bg-slate-800 w-[200px] py-4 text-center">
            <h1 class="font-medium text-lg">Aplikasi SPPD</h1>
        </div>
        @if (Request::is('pegawai'))
            <div class="ml-10">
                <h1 class="font-medium text-xl text-white">DATA PEGAWAI</h1>
            </div>
        @elseif (Request::is('golongan'))
            <div class="ml-10">
                <h1 class="font-medium text-xl text-white">GOLONGAN</h1>
            </div>
        @elseif (Request::is('kota'))
            <div class="ml-10">
                <h1 class="font-medium text-xl text-white">KOTA TUJUAN</h1>
            </div>
        @elseif (Request::is('sppd'))
            <div class="ml-10">
                <h1 class="font-medium text-xl text-white">SPPD & SPT</h1>
            </div>
        @elseif (Request::is('sppd/create'))
            <div class="ml-10">
                <a href="{{ url('sppd') }}">
                    <h1 class="font-medium text-xl text-white"><i class="fa-solid fa-chevron-left mr-2"></i> Kembali
                    </h1>
                </a>
            </div>
        @elseif (Request::is('pegawai/create'))
            <div class="ml-10">
                <h1 class="font-medium text-xl text-white">TAMBAH PEGAWAI</h1>
            </div>
        @elseif (Request::is('profile'))
            <div class="ml-10">
                <h1 class="font-medium text-xl text-white">PROFILE LEMBAGA</h1>
            </div>
        @elseif (Request::is('admin'))
            <div class="ml-10">
                <h1 class="font-medium text-xl text-white">DATA ADMIN</h1>
            </div>
        @elseif (Request::is('transportasi'))
            <div class="ml-10">
                <h1 class="font-medium text-xl text-white">JENIS TRANSPORTASI</h1>
            </div>
        @endif
    </div>
    <form action="{{ url('logout') }}" method="post" class="flex">
        @csrf

        <button type="submit" class="text-lg font-medium"
            onclick="return confirm('Apakah yakin anda ingin logout?')"><i
                class="fa-solid fa-right-from-bracket m-2 cursor-pointer"></i>Logout</button>
    </form>
</div>
<div class="fixed pt-16 w-[200px] h-screen bg-slate-900 shadow-r text-gray-300 z-50">
    <a href="{{ url('/') }}">
        <div class="m-1 py-1 hover:hover-li w-inherit rounded-lg {{ Request::is('/') ? 'master' : '' }}">
            <div class="flex items-center">
                <i class="fa-solid fa-gauge mx-2"></i>
                <h1 class="text-lg font-medium">Dashboard</h1>
            </div>
        </div>
    </a>
    <div class="flex flex-col w-inherit h-full">
        <div class="">
            <div class="flex items-center hover:hover-li m-1 rounded-lg" id="master">
                <i class="fa-solid fa-file mx-2"></i>
                <h1 class="font-medium py-3 hover:hover-li" id="master">Master Surat</h1>
            </div>
            <div class="flex flex-col text-sm w-inherit h-0 overflow-hidden transition-1 {{ Request::is('spt', 'sppd*') ? 'surat' : '' }}"
                id="surat">
                <a href="{{ url('sppd') }}"
                    class="m-1 rounded-lg flex items-center py-1 pl-5 hover:hover-li {{ Request::is('sppd*') ? 'master' : '' }}">
                    <i class="fa-solid fa-file m-2"></i>
                    <h1>SPPD & SPT</h1>
                </a>
            </div>
            <div class="flex items-center py-1 hover:hover-li m-1 rounded-lg" id="data_master">
                <i class="fa-solid fa-file m-2"></i>
                <h1 class="font-medium">
                    Data Master</h1>
            </div>
            <div class="flex flex-col text-sm w-inherit h-0 overflow-hidden transition-1 {{ Request::is('pegawai*', 'golongan*', 'kota*', 'transportasi*', 'admin*') ? 'data' : '' }}"
                id="data">
                <a href="{{ url('pegawai') }}"
                    class="m-1 rounded-lg py-1 pl-5 hover:hover-li flex items-center {{ Request::is('pegawai*') ? 'master' : '' }}">
                    <i class="fa-solid fa-users m-2"></i>
                    <h1>Data Pegawai</h1>
                </a>
                <a href="{{ url('golongan') }}"
                    class="m-1 rounded-lg py-1 pl-5 hover:hover-li flex items-center {{ Request::is('golongan*') ? 'master' : '' }}">
                    <i class="fa-regular fa-circle m-2"></i>
                    <h1>Golongan</h1>
                </a>
                <a href="{{ url('transportasi') }}"
                    class="m-1 rounded-lg py-1 pl-5 hover:hover-li flex items-center {{ Request::is('transportasi*') ? 'master' : '' }}">
                    <i class="fa-solid fa-car m-2"></i>
                    <h1>Jenis Transportasi</h1>
                </a>
                <a href="{{ url('admin') }}"
                    class="m-1 rounded-lg py-1 pl-5 hover:hover-li flex items-center {{ Request::is('admin*') ? 'master' : '' }}">
                    <i class="fa-solid fa-user m-2"></i>
                    <h1>Data Admin</h1>
                </a>
            </div>
            <a href="{{ url('lpd') }}"
                class="m-1 py-1 rounded-lg flex items-center hover:hover-li {{ Request::is('lpd*') ? 'master' : '' }}">
                <i class="fa-regular fa-file-lines m-2"></i>
                <h1 class="font-medium hover:hover-li" id="data_master">Laporan
                </h1>
            </a>
            <a href="{{ url('profile') }}"
                class="m-1 rounded-lg flex items-center py-1 hover:hover-li {{ Request::is('profile') ? 'master' : '' }}"
                id="data_master">
                <i class="fa-solid fa-building-columns m-2"></i>
                <h1 class="font-medium">Lembaga</h1>
            </a>
        </div>
    </div>
</div>
