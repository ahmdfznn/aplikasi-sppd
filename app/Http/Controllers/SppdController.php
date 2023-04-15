<?php

namespace App\Http\Controllers;

use App\Models\Sppd;
use App\Models\Spt;
use App\Models\Karyawan;
use App\Models\Golongan;
use App\Models\Lpd;
use App\Models\Transportasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SppdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.sppd', [
            'title' => 'Sppd',
            'sppd' => Sppd::latest()->get(),
            'karyawan' => new Sppd
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!empty(Sppd::all())) {
            $data = null;
        } else {
            $data = Str::before(Sppd::all()->last()->nomor, '/Setda/Sppd');
        }
        return view('pages.create-sppd', [
            'title' => 'Buat SPPD',
            'data' => $data,
            'pegawai' => Karyawan::all(),
            'golongan' => Golongan::all(),
            'jenis_transportasi' => Transportasi::all()
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
        if ($request->keterangan) {
            $ket = strip_tags($request->keterangan);
        } else {
            $ket = '-';
        }

        $request->validate([
            'nomor' => 'required',
            'nm_pejabat' => 'required',
            'karyawan' => 'required',
            'tujuan' => 'required',
            'tmpt_berangkat' => 'required',
            'tmpt_tujuan' => 'required',
            'lama_perjalanan' => 'required',
            'anggaran_perjalanan' => 'required',
            'jenis_transportasi' => 'required',
            'tgl_berangkat' => 'required|date',
            'tgl_kembali' => 'required|date',
            'tmpt_keluar' => 'required'
        ]);

        Sppd::create([
            'nomor' => $request->nomor,
            'nm_pejabat' => $request->nm_pejabat,
            'karyawan' => serialize($request->karyawan),
            'tujuan' => strip_tags($request->tujuan),
            'tmpt_berangkat' => $request->tmpt_berangkat,
            'tmpt_tujuan' => $request->tmpt_tujuan,
            'lama_perjalanan' => $request->lama_perjalanan,
            'anggaran_perjalanan' => $request->anggaran_perjalanan,
            'jenis_transportasi' => $request->jenis_transportasi,
            'tgl_berangkat' => Carbon::createFromFormat('m/d/Y', $request->tgl_berangkat)->format('Y-m-d'),
            'tgl_kembali' => Carbon::createFromFormat('m/d/Y', $request->tgl_kembali)->format('Y-m-d'),
            'keterangan' => $ket,
            'tmpt_keluar' => $request->tmpt_keluar
        ]);

        Spt::create([
            'nomor' => $request->nomor,
            'nama' => serialize($request->karyawan),
            'tujuan' => strip_tags($request->tujuan),
            'tujuan_perjalanan' => $request->tmpt_tujuan,
            'tgl_berangkat' => Carbon::createFromFormat('m/d/Y', $request->tgl_berangkat)->format('Y-m-d'),
            'tgl_kembali' => Carbon::createFromFormat('m/d/Y', $request->tgl_kembali)->format('Y-m-d')
        ]);

        return redirect('/sppd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sppd  $sppd
     * @return \Illuminate\Http\Response
     */
    public function show(Sppd $sppd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sppd  $sppd
     * @return \Illuminate\Http\Response
     */
    public function edit(Sppd $sppd, $id)
    {
        return view('pages.edit-sppd', [
            'title' => 'Edit SPPD & SPT',
            'jenis_transportasi' => Transportasi::all(),
            'pegawai' => Karyawan::all(),
            'surat' => Sppd::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sppd  $sppd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->keterangan) {
            $ket = strip_tags($request->keterangan);
        } else {
            $ket = '-';
        }

        $request->validate([
            'nomor' => 'required',
            'nm_pejabat' => 'required',
            'karyawan' => 'required',
            'tujuan' => 'required',
            'tmpt_berangkat' => 'required',
            'tmpt_tujuan' => 'required',
            'lama_perjalanan' => 'required',
            'anggaran_perjalanan' => 'required',
            'jenis_transportasi' => 'required',
            'tgl_berangkat' => 'required|date',
            'tgl_kembali' => 'required|date',
            'tmpt_keluar' => 'required'
        ]);

        Sppd::where('id', $id)->update([
            'nomor' => $request->nomor,
            'nm_pejabat' => $request->nm_pejabat,
            'karyawan' => serialize($request->karyawan),
            'tujuan' => strip_tags($request->tujuan),
            'tmpt_berangkat' => $request->tmpt_berangkat,
            'tmpt_tujuan' => $request->tmpt_tujuan,
            'lama_perjalanan' => $request->lama_perjalanan,
            'anggaran_perjalanan' => $request->anggaran_perjalanan,
            'jenis_transportasi' => $request->jenis_transportasi,
            'tgl_berangkat' => Carbon::createFromFormat('m/d/Y', $request->tgl_berangkat)->format('Y-m-d'),
            'tgl_kembali' => Carbon::createFromFormat('m/d/Y', $request->tgl_kembali)->format('Y-m-d'),
            'keterangan' => $ket,
            'tmpt_keluar' => $request->tmpt_keluar
        ]);

        Spt::where('id', $id)->update([
            'nomor' => $request->nomor,
            'nama' => serialize($request->karyawan),
            'tujuan' => strip_tags($request->tujuan),
            'tujuan_perjalanan' => $request->tmpt_tujuan,
            'tgl_berangkat' => Carbon::createFromFormat('m/d/Y', $request->tgl_berangkat)->format('Y-m-d'),
            'tgl_kembali' => Carbon::createFromFormat('m/d/Y', $request->tgl_kembali)->format('Y-m-d')
        ]);

        return redirect('sppd');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sppd  $sppd
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sppd::destroy($id);
        Spt::destroy($id);

        return redirect('sppd')->with('delete-sppd', 'Data berhasil dihapus!');
    }
}
