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
use App\Models\suratmasukModel;
class RepsuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('surat.report.rep_suratkeluar_masuk');
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

    public function apisearch(Request $request){
        set_time_limit(0);
       
        try{
            $messages = [
                'date_from.required' => 'Field Tahun harus diisi!!!',
                'date_to.required' => 'Field Date To harus diisi',
            ];
            $validator = Validator::make($request->all(), [
                'date_from' => 'required',
                'date_to' => 'required',
            ], $messages);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                // dd($request->all());
                $datefrom =  $request->date_from;
                $dateto =$request->date_to;
                if($request->type=="surat_masuk" ){

                    $datareport = suratmasukModel::where("tanggal",">=",$datefrom)
                    ->where("tanggal","<=",$dateto)
                    ->get();
                }else if($request->type=="surat_keluar"){
                    $datareport = db::table('tb_surat_keluar')->selectRaw("nomor_surat_keluar,nama_pemohon,jenis.jenis_surat_name,tb_surat_keluar.created_at as tanggal")
                    ->leftJoin('tb_jenis_surat_keluar as jenis','tb_surat_keluar.jenis_surat_id','jenis.id')
                    ->where("tb_surat_keluar.created_at",">=",$datefrom)
                    ->where("tb_surat_keluar.created_at","<=",$dateto)
                    ->get();
                }
            }
          
            $succes="success";
            return  Response()->json([
                "succes"=>$succes,
                "message"=>"Berhasil Get Data",
                "data"=> $datareport,
            ]);
        }catch(\Exception $e){
            $success = "Gagal";
            return Response()->json([
                'errors' => "Backend Error Pada Line" . $e->getMessage()
            ]);
        }
    }
}
