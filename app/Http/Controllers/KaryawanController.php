<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.manage-pegawai', [
            'title' => 'Pegawai',
            'karyawans' => Karyawan::latest()->filter(['search'])->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create-pegawai', [
            'title' => 'Tambah Pegawai',
            'golongan' => Golongan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'profile_picture' => 'image',
            'nip' => 'required|unique:karyawan',
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required',
            'unit_kerja' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required',
            'agama' => 'required',
            'status_nikah' => 'required',
            'alamat' => 'required',
            'golongan' => 'required'
        ]);

        $karyawans = Karyawan::where('id', $request->id)->first();

        // $rules = [
        //     'nip' => $request->nip,
        //     'nik' => $request->nik,
        //     'nama' => $request->nama,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'pangkat' => $request->pangkat,
        //     'jabatan' => $request->jabatan,
        //     'tempat_lahir' => $request->tempat_lahir,
        //     'tanggal_lahir' => $request->tanggal_lahir,
        //     'no_telepon' => $request->nomor,
        //     'agama' => $request->agama,
        //     'status_nikah' => $request->status,
        //     'alamat' => $request->alamat,
        //     'golongan' => $golongan,
        //     'keterangan' => $request->keterangan
        // ];

        if ($request->file('profile_picture')) {
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile-picture');
        }

        Karyawan::create($validated);

        return redirect('pegawai')->with('add_pegawai', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan, $name)
    {
        return view(
            'pages.view-pegawai',
            [
                'title' => $name,
                'pegawai' => Karyawan::where('nama', $name)->first()
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan, $nama)
    {
        return view('pages.edit-pegawai', [
            'title' => 'Edit Data Pegawai',
            'karyawan' => $karyawan->where('nama', $nama)->first(),
            'golongan' => Golongan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan, $id)
    {
        $karyawans = $karyawan->where('id', $id)->first();

        if ($request->golongan) {
            $golongan = $request->golongan;
        } else {
            $golongan = null;
        }

        $rules = [
            'nip' => $request->nip,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pangkat' => $request->pangkat,
            'jabatan' => $request->jabatan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telepon' => $request->nomor,
            'agama' => $request->agama,
            'status_nikah' => $request->status,
            'alamat' => $request->alamat,
            'golongan' => $golongan,
            'keterangan' => $request->keterangan
        ];

        if ($request->file('image')) {
            if ($karyawans->profile_picture) {
                Storage::delete($karyawans->profile_picture);
            }
            $rules['profile_picture'] = $request->file('image')->store('profile-picture');
        }

        Karyawan::where('id', $id)->update($rules);

        return redirect('pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan, $id)
    {
        Karyawan::destroy($id);

        return redirect('pegawai')->with('delete-pegawai', 'Data berhasil dihapus!');
    }
}
