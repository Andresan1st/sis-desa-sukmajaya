<?php

namespace App\Http\Controllers;
use Excel;
use Carbon\Carbon;
use App\Exports\ReportAbsensiExport;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report_absensi($month)
    {
        $tahun = substr($month,0,4);
        $bulan = substr($month,5);
        return Excel::download(new ReportAbsensiExport($tahun,$bulan),'report-surat-'.$month.'.xlsx');
    }
}
