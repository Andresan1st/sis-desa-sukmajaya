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
use App\Models\MasdanabantuanModel;
use App\Models\MasdatamasyarakatModel;
class MasdanabantuanController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd("cok");
        return view('master.mas_data_danabantuan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $masyarakat = MasdatamasyarakatModel::whereRaw("status <> 'DELETED'")->whereRaw("status <> 'INACTIVE'")->get();
        return  view('master.mas_data_danabantuan.create',compact('masyarakat'));
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
                'id_masyarakat.required' => 'Field Nama Masyarakat harus diisi',
                'tanggal.required' => 'Field Tanggal harus diisi',
                'keterangan.required' => 'Field Keterangan harus diisi',
                'status.required' => 'Field Status harus diisi',
            ];
            $validator = Validator::make($request->all(), [
                'id_masyarakat'=>'required',
                'tanggal'=>'required',
                'keterangan'=>'required',
                'status'=>'required'
            ], $messages);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                $datamasyarakat = MasdanabantuanModel::create([
                    "id_masyarakat"=>$request->id_masyarakat,
                    "tanggal"=> $request->tanggal,
                    "keterangan"=> $request->keterangan,
                    "status"=> $request->status,
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
        $datams = MasdanabantuanModel::where('id',$id)->first();
        $masyarakat = MasdatamasyarakatModel::whereRaw("status <> 'DELETED'")->get();
        return view('master.mas_data_danabantuan.show',compact('datams','masyarakat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datams = MasdanabantuanModel::where('id',$id)->first();
        $masyarakat = MasdatamasyarakatModel::whereRaw("status <> 'DELETED'")->get();
        return view('master.mas_data_danabantuan.update',compact('datams','masyarakat'));
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
                'id_masyarakat.required' => 'Field Nama Masyarakat harus diisi',
                'tanggal.required' => 'Field Tanggal harus diisi',
                'keterangan.required' => 'Field Keterangan harus diisi',
                'status.required' => 'Field Status harus diisi',
            ];
            $validator = Validator::make($request->all(), [
                'id_masyarakat'=>'required',
                'tanggal'=>'required',
                'keterangan'=>'required',
                'status'=>'required'
            ], $messages);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                $datamasyarakat = MasdanabantuanModel::where('id',$request->id)->update([
                    "id_masyarakat"=>$request->id_masyarakat,
                    "tanggal"=> $request->tanggal,
                    "keterangan"=> $request->keterangan,
                    "status"=> $request->status,
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
            MasdanabantuanModel::where('id', '=', $id)->update(['status' => 'DELETED',
            ]);
            DB::commit();
            $success = true;
            return view('master.mas_data_danabantuan.index');
        }catch(\Exception $e){
            //dd($e);
            $success = false;
            DB::rollback();
        }
    }
    
    public function apibantuan(){
        $data = MasdanabantuanModel::with(['masyarakat'])->whereRaw("status <> 'INACTIVE'")
        ->whereRaw("status <> 'DELETED'")
        ->get();
       // dd($data);
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
               $btn = '';
                $btn = $btn. '<a href="'. url('/mas_data_bantuan/edit/'.$data->id) .'" class="btn btn-sm btn-icon btn-icon rounded-circle btn-info mr-1 mb-1"><span class="fa fa-light fa-edit"></span> </a>';
                $btn = $btn. '<a href="'. url('/mas_data_bantuan/delete/'.$data->id) .'"  class="btn btn-sm btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1"><span class="fa fa-light fa-trash-alt"></span></a>';
                $btn = $btn. '<a href="'. url('/mas_data_bantuan/show/'.$data->id) .'"  class="btn btn-sm btn-icon btn-icon rounded-circle btn-success mr-1 mb-1"><span class="fa fa-light fa-eye"></span></a>';
               return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

  
}
