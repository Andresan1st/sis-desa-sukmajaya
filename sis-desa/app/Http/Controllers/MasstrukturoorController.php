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
use App\Models\MasstrukturoorModel;
class MasstrukturoorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.mas_data_organisasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $jabatan = masdatajabtanModel::whereRaw("status <> 'DELETED'")->get();
        return  view('master.mas_data_organisasi.create');
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
                'nama_organisasi.required' => 'Field Nama Organisasi harus diisi',
                'nama_organisasi.regex' => 'Field Nik tidak boleh angka',  
            ];
            $validator = Validator::make($request->all(), [
                'nama_organisasi' => 'required|min:16|regex:/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/',
            ], $messages);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                $datamasyarakat = MasstrukturoorModel::create([
                    "nama_organisasi"=>$request->nama_organisasi,
                    "status"=>"ACTIVE",
                ]);
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
        $datoor = MasstrukturoorModel::where('id',$id)->first();
        return view('master.mas_data_organisasi.show',compact('datoor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datoor = MasstrukturoorModel::where('id',$id)->first();
       // dd($datoor);
        return view('master.mas_data_organisasi.update',compact('datoor'));
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
        //dd($request->all());
        DB::beginTransaction();
        try{
            $messages = [
                'nama_organisasi.required' => 'Field Nama Organisasi harus diisi',
                'nama_organisasi.regex' => 'Field Nik tidak boleh angka',  
            ];
            $validator = Validator::make($request->all(), [
                'nama_organisasi' => 'required|regex:/^[a-zA-Z]+(([\',. -][a-zA-Z ])?[a-zA-Z]*)*$/',
            ], $messages);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                $datamasyarakat = MasstrukturoorModel::where('id',$request->id)->update([
                    "nama_organisasi"=>$request->nama_organisasi,
                    "status"=>$request->status,
                ]);
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
            MasstrukturoorModel::where('id', '=', $id)->update(['status' => 'DELETED',
            ]);
            DB::commit();
            $success = true;
            return view('master.mas_data_organisasi.index');
        }catch(\Exception $e){
            //dd($e);
            $success = false;
            DB::rollback();
        }
    }
    
    public function apiorganisasi(){
        $data = MasstrukturoorModel::whereRaw("status <> 'INACTIVE'")
        ->whereRaw("status <> 'DELETED'")
        ->get();
      //  dd($data);
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
               $btn = '';
                $btn = $btn. '<a href="'. url('/mas_data_organisasi/edit/'.$data->id) .'" class="btn btn-sm btn-icon btn-icon rounded-circle btn-info mr-1 mb-1"><span class="fa fa-light fa-pen-to-square"></span> </a>';
                $btn = $btn. '<a href="'. url('/mas_data_organisasi/delete/'.$data->id) .'"  class="btn btn-sm btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1"><span class="fa fa-light fa-trash-can"></span></a>';
                $btn = $btn. '<a href="'. url('/mas_data_organisasi/show/'.$data->id) .'"  class="btn btn-sm btn-icon btn-icon rounded-circle btn-success mr-1 mb-1"><span class="fa fa-light fa-eye"></span></a>';
               return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }


}