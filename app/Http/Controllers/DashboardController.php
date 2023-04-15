<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Sppd;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard', [
            'title' => 'Dashboard',
            'karyawan' => Karyawan::all(),
            'sppd' => Sppd::all()
        ]);
    }
}
