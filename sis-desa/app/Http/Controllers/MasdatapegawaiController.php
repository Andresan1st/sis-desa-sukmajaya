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
use App\Models\MasdatapegawaiModel;
use App\Models\masdatajabtanModel;
use App\Models\MasstrukturoorModel;
class MasdatapegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.mas_data_pegawai.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = masdatajabtanModel::whereRaw("status <> 'DELETED'")->get();
        $organisasi = MasstrukturoorModel::whereRaw("status <> 'DELETED'")->get();
        return  view('master.mas_data_pegawai.create',compact('jabatan','organisasi'));
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
               'nama.required' => 'Field Nama harus diisi',
               'nama.min' => 'Field nama tidak boleh kurang dari 3 kata',
               'nama.regex' => 'Field nama tidak boleh angka',
               'alamat.required' => 'Field Alamat harus diisi',
               'alamat.min' => 'Field alamat tidak boleh 5 kata',
               'no_telp.required' => 'Field no telpon harus diisi',
               'no_telp.min' => 'Field no telpon Harus minimal 10 ',
               'jenkel.required' => 'Field jenis kelamin Harus diisi ',
               'id_jabatan.required' => 'Field jabatan harus diisi ',
            
           ];
           $validator = Validator::make($request->all(), [
               'nama' => 'required|min:3|regex:/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/',
               'alamat' => 'required|min:5',
               'no_telp' => 'required|min:10',
               'jenkel'=>'required',
               'id_jabatan'=>'required',
              
           ], $messages);
           if ($validator->fails()) {
               return response()->json(['errors' => $validator->errors()->all()]);
           } else {
                $nip=$this->setCodeDraft();
                //dd($nip);
                $datajabatan = MasdatapegawaiModel::create([
                    "nip"=>$nip,
                    "nama"=> $request->nama,
                    "alamat"=>$request->alamat,
                    "no_telp"=>"+62".$request->no_telp,
                    "jenkel"=>$request->jenkel,
                    "id_jabatan"=>$request->id_jabatan,
                    "id_organisasi"=>$request->id_organisasi,
                    "status"=>"ACTIVE"
                ]);
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
        $datapegawai = MasdatapegawaiModel::with('jabatan')->where('id',$id)->first();
        $jabatan =  masdatajabtanModel::all();
        $organisasi = MasstrukturoorModel::whereRaw("status <> 'DELETED'")->get();
        return view('master.mas_data_pegawai.show',compact('datapegawai','jabatan','organisasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $datapegawai = MasdatapegawaiModel::with('jabatan')->where('id',$id)->first();
        $jabatan =  masdatajabtanModel::all();
        $organisasi = MasstrukturoorModel::whereRaw("status <> 'DELETED'")->get();
        return view('master.mas_data_pegawai.update',compact('datapegawai','jabatan','organisasi'));
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
                'nama.required' => 'Field Nama harus diisi',
                'nama.min' => 'Field nama tidak boleh kurang dari 3 kata',
                'nama.regex' => 'Field nama tidak boleh angka',
                'alamat.required' => 'Field Alamat harus diisi',
                'alamat.min' => 'Field alamat tidak boleh 5 kata',
                'no_telp.required' => 'Field no telpon harus diisi',
                'no_telp.min' => 'Field no telpon Harus minimal 10 ',
                'jenkel.required' => 'Field jenis kelamin Harus diisi ',
                'id_jabatan.required' => 'Field jabatan harus diisi ',
            ];
            $validator = Validator::make($request->all(), [
                'nama' => 'required|min:3|regex:/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/',
                'alamat' => 'required|min:5',
                'no_telp' => 'required|min:10',
                'jenkel'=>'required',
                'id_jabatan'=>'required',
            ], $messages);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                $datajabatan = MasdatapegawaiModel::where('id',$request->id)->update([
                    "nama"=> $request->nama,
                    "alamat"=>$request->alamat,
                    "no_telp"=>"+62".$request->no_telp,
                    "jenkel"=>$request->jenkel,
                    "id_jabatan"=>$request->id_jabatan,
                    "id_organisasi"=>$request->id_organisasi,
                    "status"=>$request->status
                ]);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            MasdatapegawaiModel::where('id', '=', $id)->update(['status' => 'DELETED',
            ]);
            DB::commit();
            $success = true;
            return view('master.mas_data_pegawai.index');
        }catch(\Exception $e){
            //dd($e);
            $success = false;
            DB::rollback();
        }
    }
    
    public function apipegawai(){
        $data = MasdatapegawaiModel::with('jabatan')
        ->whereRaw("status <> 'INACTIVE'")
        ->whereRaw("status <> 'DELETED'")
        ->get();
        //dd($data);
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
               $btn = '';
                $btn = $btn. '<a href="'. url('/mas_data_pegawai/edit/'.$data->id) .'" class="btn btn-sm btn-icon btn-icon rounded-circle btn-info mr-1 mb-1"><span class="fa fa-light fa-pen-to-square"></span> </a>';
                $btn = $btn. '<a href="'. url('/mas_data_pegawai/delete/'.$data->id) .'"  class="btn btn-sm btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1"><span class="fa fa-light fa-trash-can"></span></a>';
                $btn = $btn. '<a href="'. url('/mas_data_pegawai/show/'.$data->id) .'"  class="btn btn-sm btn-icon btn-icon rounded-circle btn-success mr-1 mb-1"><span class="fa fa-light fa-eye"></span></a>';
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
       
        $getLastNumber= MasdatapegawaiModel::select('nip')
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
