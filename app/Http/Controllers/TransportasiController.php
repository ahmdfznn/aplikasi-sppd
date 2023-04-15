<?php

namespace App\Http\Controllers;

use App\Models\Transportasi;
use Illuminate\Http\Request;

class TransportasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.transportasi', [
            'title' => 'Jenis Transportasi',
            'transportasi' => Transportasi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Transportasi::create([
            'jenis_transportasi' => $request->nama
        ]);

        return redirect('transportasi')->with('add-transportasi', 'Jenis transportasi baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transportasi  $transportasi
     * @return \Illuminate\Http\Response
     */
    public function show(Transportasi $transportasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transportasi  $transportasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transportasi $transportasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transportasi  $transportasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transportasi $transportasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transportasi  $transportasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transportasi::destroy($id);

        return redirect('transportasi')->with('delete-transportasi', 'Data berhasil dihapus!');
    }
}
