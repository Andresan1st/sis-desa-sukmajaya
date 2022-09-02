<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use PDF;
use DataTables;
use Validator;
use Auth;
use QrCode;
use Carbon\Carbon;
use App\Models\MasabsenModel;
class MasabsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('absensi.generate_qr.index');
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
    public function store($params)
    {
       DB::beginTransaction();
       try{
       
            $pg = db::table('users')->selectRaw("users.username,pg.nip,pg.nama")
            ->leftJoin("tb_pegawai as pg","users.id_pegawai","pg.id")
            ->where("users.id", Auth::user()->id)
            ->first();
            
            //dd($pg);

            $searchdata = MasabsenModel::where("nip",$pg->nip)->where('tanggal',date("Y-m-d"))->first();

            if(empty($searchdata)){
                $absen = MasabsenModel::create([
                    "nip"=>$pg->nip,
                    "tanggal"=>date("Y-m-d"),
                    "jam_masuk"=>$params,
                    "status"=>"ACTIVE"
                ]);
            }else{
                $absen = MasabsenModel::where("nip",$pg->nip)->where('tanggal',date("Y-m-d"))->update([
                    "jam_keluar"=>$params,
                ]);
            }

                DB::commit();
            return Response()->json([
                'message'=>"Berhasil Disimpan",
                'success'=>'True'
            ]);
        }catch(\Exception $e){
            $success = "Gagal";
            DB::rollback();
            return Response()->json([
                'errors' => "Backend Error Pada Line" . $e->getMessage()
            ]);
        }
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

    public function qrcodescan(){
        date_default_timezone_set('Asia/Jakarta');
        $jam =  date("Y-m-d h:i:s");
        //dd($jam);
        //dd(QrCode::format('svg')->size(200)->errorCorrection('H')->generate($jam));
        $qrcode = base64_encode(QrCode::size(250)->generate($jam));

        return Response()->json([
            'message'=>"Success Get Data",
            'success'=>'True',
            'data'=> $qrcode
        ]);
    }

    public function list_absensi(Request $request)
    {
        return view('absensi.daftar_absensi.index');
    }
}
