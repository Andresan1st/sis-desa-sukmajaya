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
class MasdatamasyarakatController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.mas_data_masyarakat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $jabatan = masdatajabtanModel::whereRaw("status <> 'DELETED'")->get();
        return  view('master.mas_data_masyarakat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        DB::beginTransaction();
        try{
            $messages = [
                'nik.required' => 'Field Nik harus diisi',
                'nik.min' => 'Field Nik tidak boleh kurang dari 16 kata',
                'nik.regex' => 'Field Nik tidak boleh huruf',  
                'tempat_lahir.required' => 'Field Temapat Lahir harus diisi',
                'tempat_lahir.min' => 'Field Temapat Lahir tidak boleh 3 kata',
                'tgl_lahir.required' => 'Field Tanggal Lahir harus diisi !',
                'tgl_lahir.date' => 'Field Tanggal Lahir harus format tanggal!',
                'alamat.required' => 'Field Alamat harus diisi',
                'alamat.min' => 'Field alamat tidak boleh 5 kata',
                'agama.required' => 'Field Agama harus diisi',
                'agama.regex' => 'Field Agama tidak boleh angka',
                'rt.regex' => 'Field rt tidak boleh huruf',
                'rw.regex' => 'Field rw tidak boleh huruf',
                'rt.required' => 'Field rt  harus diisi',
                'rw.required' => 'Field rw  harus diisi',
                'no_kk.regex' => 'Field no_kk tidak boleh huruf',
                'jenkel.required' => 'Field jenis kelamin harus diisi ',
                'no_kk.required' => 'Field no_kk harus diisi ',
            ];
            $validator = Validator::make($request->all(), [
                'nik' => 'required|min:16|regex:/^[0-9]+$/',
                'nama' => 'required|min:3|regex:/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/',
                'alamat' => 'required|min:5',
                'tempat_lahir' => 'required|min:3',
                'tgl_lahir' => 'required|date',
                'agama'=>'required|regex:/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/',
                'rt' => 'required|regex:/^[0-9]+$/',
                'rw' => 'required|regex:/^[0-9]+$/',
                'jenkel'=>'required',
                'no_kk'=>'required|regex:/^[0-9]+$/'
            ], $messages);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                $datasearch =MasdatamasyarakatModel::where('nik',$request->nik)->get();

                if(empty($datasearch)){
                    $datamasyarakat = MasdatamasyarakatModel::create([
                        "nik"=>$request->nik,
                        "nama"=> $request->nama,
                        "tempat_lahir"=> $request->tempat_lahir,
                        "tgl_lahir"=> $request->tgl_lahir,
                        "alamat"=>$request->alamat,
                        "jenkel"=>$request->jenkel,
                        "agama"=>$request->agama,
                        "rt_rw"=>$request->rt."/".$request->rw,
                        "status_kawin"=>$request->status_kawin,
                        "no_kk"=>$request->no_kk,
                        "status"=>"ACTIVE",
                    ]);
                }else{
                    return Response()->json([
                        'message'=>"Gagal Update NIK TIDAK BOLEH SAMA!!!",
                        'errors2'=>'True'
                    ]);
                }
                // dd($item);
             
                DB::commit();
                return Response()->json([
                    'message'=>"Berhasil Disimpan",
                    'success'=>'True'
                ]);
            }
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
        $datams = MasdatamasyarakatModel::where('id',$id)->first();
        return view('master.mas_data_masyarakat.show',compact('datams'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datams = MasdatamasyarakatModel::where('id',$id)->first();
       // dd($datams);
        return view('master.mas_data_masyarakat.update',compact('datams'));
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
        DB::beginTransaction();
        try{
            $messages = [
                'nik.required' => 'Field Nik harus diisi',
                'nik.min' => 'Field Nik tidak boleh kurang dari 16 kata',
                'nik.regex' => 'Field Nik tidak boleh huruf',  
                'tempat_lahir.required' => 'Field Temapat Lahir harus diisi',
                'tempat_lahir.min' => 'Field Temapat Lahir tidak boleh 3 kata',
                'tgl_lahir.required' => 'Field Tanggal Lahir harus diisi !',
                'tgl_lahir.date' => 'Field Tanggal Lahir harus format tanggal!',
                'alamat.required' => 'Field Alamat harus diisi',
                'alamat.min' => 'Field alamat tidak boleh 5 kata',
                'agama.required' => 'Field Agama harus diisi',
                'agama.regex' => 'Field Agama tidak boleh angka',
                'rt.regex' => 'Field rt tidak boleh huruf',
                'rw.regex' => 'Field rw tidak boleh huruf',
                'rt.required' => 'Field rt  harus diisi',
                'rw.required' => 'Field rw  harus diisi',
                'no_kk.regex' => 'Field no_kk tidak boleh huruf',
                'jenkel.required' => 'Field jenis kelamin harus diisi ',
                'no_kk.required' => 'Field no_kk harus diisi ',
            ];
            $validator = Validator::make($request->all(), [
                'nik' => 'required|min:16|regex:/^[0-9]+$/',
                'nama' => 'required|min:3|regex:/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/',
                'alamat' => 'required|min:5',
                'tempat_lahir' => 'required|min:3',
                'tgl_lahir' => 'required|date',
                'agama'=>'required|regex:/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/',
                'rt' => 'required|regex:/^[0-9]+$/',
                'rw' => 'required|regex:/^[0-9]+$/',
                'jenkel'=>'required',
                'no_kk'=>'required|regex:/^[0-9]+$/'
            ], $messages);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                // $datasearch =MasdatamasyarakatModel::where('nik',$request->nik)->get();

                // if(empty($datasearch)){
                    $datamasyarakat = MasdatamasyarakatModel::where('id',$request->id)->update([
                        //"nik"=>$request->nik,
                        "nama"=> $request->nama,
                        "tempat_lahir"=> $request->tempat_lahir,
                        "tgl_lahir"=> $request->tgl_lahir,
                        "alamat"=>$request->alamat,
                        "jenkel"=>$request->jenkel,
                        "agama"=>$request->agama,
                        "rt_rw"=>$request->rt."/".$request->rw,
                        "status_kawin"=>$request->status_kawin,
                        "no_kk"=>$request->no_kk,
                        "status"=>$request->status,
                    ]);
                    // dd($item);
                 
                    DB::commit();
                    return Response()->json([
                        'message'=>"Berhasil Disimpan",
                        'success'=>'True'
                    ]);
            
                // }else{
                //     return Response()->json([
                //         'message'=>"Gagal Update NIK TIDAK BOLEH SAMA!!!",
                //         'errors2'=>'True'
                //     ]);
                // }

               
            }
        }catch(\Exception $e){
            $success = "Gagal";
            DB::rollback();
            return Response()->json([
                'errors' => "Backend Error Pada Line" . $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            MasdatamasyarakatModel::where('id', '=', $id)->update(['status' => 'DELETED',
            ]);
            DB::commit();
            $success = true;
            return view('master.mas_data_masyarakat.index');
        }catch(\Exception $e){
            //dd($e);
            $success = false;
            DB::rollback();
        }
    }
    
    public function apimasyarakat(){
        $data = MasdatamasyarakatModel::whereRaw("status <> 'INACTIVE'")
        ->whereRaw("status <> 'DELETED'")
        ->get();
        //dd($data);
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
               $btn = '';
                $btn = $btn. '<a href="'. url('/mas_data_masyarakat/edit/'.$data->id) .'" class="btn btn-sm btn-icon btn-icon rounded-circle btn-info mr-1 mb-1"><span class="fa fa-light fa-pen-to-square"></span> </a>';
                $btn = $btn. '<a href="'. url('/mas_data_masyarakat/delete/'.$data->id) .'"  class="btn btn-sm btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1"><span class="fa fa-light fa-trash-can"></span></a>';
                $btn = $btn. '<a href="'. url('/mas_data_masyarakat/show/'.$data->id) .'"  class="btn btn-sm btn-icon btn-icon rounded-circle btn-success mr-1 mb-1"><span class="fa fa-light fa-eye"></span></a>';
               return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    protected function setCodeDraft()
    {
       // dd($params);
        $tahun =  date("Y");
        $dateyear = (int)date("Y");
        $datemonth = (int)date("m");
        $date_now= date("Y-m-d");
       
        $getLastNumber= MasdatamasyarakatModel::select('nip')
        ->whereYear('created_at',$dateyear)
        ->whereRaw("(status <> 'INACTIVE' OR status <>'DELETED')")
        ->orderBy('nip', 'desc')
        ->pluck('nip')
        ->first();
        if ($getLastNumber) {
            $datatemp =explode('-',$getLastNumber);
            $getLastNumber = $datatemp[1];
            //dd( $getLastNumber);
        }else{
            $getLastNumber = 0 ;
        }
        $nol = null;
        //dd(strlen($getLastNumber));
       
        $getLastNumber = (int)$getLastNumber +1;
        //dd($getLastNumber);
        if(strlen($getLastNumber) == 1){
            $nol = "0000";
        }elseif(strlen($getLastNumber) == 2){
           
            $nol = "000";
        }elseif(strlen($getLastNumber) == 3){
            $nol = "00";
        }elseif(strlen($getLastNumber) == 4){
            $nol = "0";
        }else{
            $nol = null;
        }
        $number = "P"."-".$nol.$getLastNumber;
       // dd($number);
        return $number;
    }
}
