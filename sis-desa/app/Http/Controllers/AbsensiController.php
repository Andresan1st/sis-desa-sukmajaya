<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function scan_absensi()
    {
        return view('/absensi/scan_absensi/index');
    }
}
