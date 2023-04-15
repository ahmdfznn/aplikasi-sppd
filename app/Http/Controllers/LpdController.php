<?php

namespace App\Http\Controllers;

use App\Models\Lpd;
use App\Models\Sppd;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.laporan', [
            'title' => 'Lpd',
            'lpd' => Lpd::all(),
            'karyawan' => new Karyawan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create-lpd', [
            'title' => 'Buat LPD',
            'pegawai' => Karyawan::all(),
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
            'nomor' => 'required',
            'nama' => 'required',
            'hasil' => 'required'
        ]);

        $validated['nama'] = serialize($request->nama);
        $validated['hasil'] = strip_tags($request->hasil);
        $validated['tanggal'] = Carbon::now();

        Lpd::create($validated);

        return redirect('lpd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lpd  $lpd
     * @return \Illuminate\Http\Response
     */
    public function show(Lpd $lpd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lpd  $lpd
     * @return \Illuminate\Http\Response
     */
    public function edit(Lpd $lpd)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lpd  $lpd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lpd $lpd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lpd  $lpd
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lpd::destroy($id);

        return redirect('lpd')->with('delete-lpd', 'Data berhasil dihapus!');
    }

    public function printlpd(Request $request, $id)
    {
        return view('pages.print-lpd', [
            'title' => 'Print Out LPD',
            'lpd' => Lpd::where('id', $request->id)->first(),
            'pegawai' => Karyawan::where('id', $request->id)->first(),
            'sppd' => Sppd::where('id', $request->id)->first()
        ]);
    }
}
