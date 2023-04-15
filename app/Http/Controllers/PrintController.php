<?php

namespace App\Http\Controllers;

use App\Models\Sppd;
use App\Models\Lpd;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class PrintController extends Controller
{
    public function printsppd($id)
    {
        // return view('pages.print-sppd', [
        //     'title' => 'Print Out SPPD',
        //     'sppd' => Sppd::where('id', $id)->first(),
        //     'karyawan' => unserialize(Sppd::where('id', $id)->first()->karyawan),
        //     'karyawans' => new Karyawan
        // ]);

        $sppd = Sppd::where('id', $id)->first();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(View::make('pages.print-sppd', compact('sppd'))->render());

        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('sppd.pdf', ['Attachment' => false]);
    }

    public function printspt(Request $request)
    {
        return view('pages.print-spt', [
            'title' => 'Print Out SPT',
            'sppd' => Sppd::where('id', $request->id)->first()
        ]);
    }

    public function printlpd($id)
    {
        return view('pages.print-lpd', [
            'title' => 'Print Out LPD',
            'lpd' => Lpd::where('id', $id)->first(),
            'nama' => unserialize(Lpd::where('id', $id)->first()->nama),
            'pegawai' => Karyawan::where('id', $id)->first(),
            'sppd' => Sppd::where('id', $id)->first()
        ]);
    }
}
