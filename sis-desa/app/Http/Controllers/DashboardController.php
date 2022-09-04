<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use PDF;
use DataTables;
use Validator;
use Auth;
use Carbon\Carbon;
use App\Models\MasdatamasyarakatModel;
use App\Models\MasdanabantuanModel;
use App\Models\MasdatakeuanganModel;
use App\Models\MasdatapegawaiModel;
use App\Models\suratmasukModel;
use App\Models\suratkeluarModel;
use App\Models\ColorThemeModel;
use App\Models\MasstrukturoorModel;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
       

        return view('Dashboard.dashboard');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getdata(){
        set_time_limit(0);
        $month = (int)date("m");
        $suratmasuk = suratmasukModel::selectRaw("nomor_surat_masuk,count(*) as total")->whereMonth("tanggal",$month)->groupBy('nomor_surat_masuk')->get();
        $totalsuratmasuk = $suratmasuk->sum('total');
        
        $suratkeluar = suratkeluarModel::selectRaw("nomor_surat_keluar,count(*) as total")->whereMonth("created_at",$month)->groupBy('nomor_surat_keluar')->get();
        $totalsuratkeluar = $suratkeluar->sum('total');

        
        $pegawai = MasdatapegawaiModel::selectRaw("nama,count(*) as total")->groupBy('nama')->get();
        $totalpegawai = $pegawai->sum('total');

        $masyarakat = MasdatamasyarakatModel::selectRaw("nama,count(*) as total")->groupBy('nama')->get();
        $totalmasyarakat = $masyarakat->sum('total');


        
        $total_keuangan = MasdatakeuanganModel::selectRaw("sum(total_keuangan) as total_keuangan")->pluck('total_keuangan')->first();

        // dd($total_keuangan);

        return  Response()->json([
            "totalsuratmasuk"=>$totalsuratmasuk,
            "totalsuratkeluar"=>$totalsuratkeluar,
            "totalpegawai"=>$totalpegawai,
            "totalmasyarakat"=>$totalmasyarakat,
            "totalkeuangan"=>number_format(  $total_keuangan,2,',','.'),
         ]);
      
    }

    public function getpenduduk(){
        set_time_limit(0);
        $month = (int)date("m");
    
        $masyarakat = MasdatamasyarakatModel::selectRaw("jenkel,count(*) as total")->groupBy('jenkel')->get();
        
       //dd($masyarakat);

        return  Response()->json([
            "chart"=>$masyarakat,
            
         ]);
      
    }

    public function getsuara(){
        set_time_limit(0);
      
        $masyarakat = MasdatamasyarakatModel::selectRaw("count(*) as total")->whereRaw("TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) > 17")->get();
        
       //dd($masyarakat);

        return  Response()->json([
            "chart"=>$masyarakat,
            
         ]);
      
    }

    public function getdanabantuan(){
        set_time_limit(0);
        $month = (int)date("m");
        $year = (int)date("y");
        $danabantuan = MasdanabantuanModel::selectRaw("count(*) as total")
        // ->whereMonth("tanggal",$month)
        ->whereRaw("status ='ACTIVE'")
        ->get();
       // dd($danabantuan);
        // dd($danabantuan->total);
        return  Response()->json([
            "danabantuan"=>$danabantuan,
            
         ]);
      
    }

    public function getdataorganisasi(){
        set_time_limit(0);
        $danabantuan = MasstrukturoorModel::with(['organisasi'])->get();
       // dd($danabantuan);
        // dd($danabantuan->total);
        return  Response()->json([
            "dataoor"=>$danabantuan,
            
         ]);
      
    }

    public function home()
    {
        $color = ColorThemeModel::first();
        return view('layout.home',compact('color'));
    }
}
