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
use App\Models\MasdatakeuanganModel;

class MaskeuangandesaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd("cok");
        return view('master.mas_data_keuangan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('master.mas_data_keuangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request->all());
        DB::beginTransaction();
        try{
            $messages = [   
                'tanggal.required' => 'Field Tanggal harus diisi',
                'total_keuangan.required' => 'Field keuangan harus diisi',
            ];
            $validator = Validator::make($request->all(), [
                'tanggal'=>'required',
                'total_keuangan'=>'required',
            ], $messages);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                $total_keuangan = (float) str_replace('.','',$request->total_keuangan);
                $datakeuangan = MasdatakeuanganModel::create([
                    "tanggal"=>$request->tanggal,
                    "total_keuangan"=> total_keuangan,
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
        $datams = MasdatakeuanganModel::where('id',$id)->first();
        return view('master.mas_data_keuangan.show',compact('datams'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datams = MasdatakeuanganModel::where('id',$id)->first();
       
        return view('master.mas_data_keuangan.update',compact('datams'));
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
                'tanggal.required' => 'Field Tanggal harus diisi',
                'total_keuangan.required' => 'Field keuangan harus diisi',
            ];
            $validator = Validator::make($request->all(), [
                'tanggal'=>'required',
                'total_keuangan'=>'required',
            ], $messages);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                $total_keuangan = (float) str_replace('.','',$request->total_keuangan);
                $datakeuangan = MasdatakeuanganModel::where('id',$request->id)->update([
                    "tanggal"=>$request->tanggal,
                    "total_keuangan"=> $total_keuangan,
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
            MasdatakuanganModel::where('id', '=', $id)->update(['status' => 'DELETED',
            ]);
            DB::commit();
            $success = true;
            return view('master.mas_data_keuangan.index');
        }catch(\Exception $e){
            //dd($e);
            $success = false;
            DB::rollback();
        }
    }
    
    public function apikeuangan(){
        $data = MasdatakeuanganModel::all();
       // dd($data);
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
               $btn = '';
                $btn = $btn. '<a href="'. url('/mas_data_keuangan/edit/'.$data->id) .'" class="btn btn-sm btn-icon btn-icon rounded-circle btn-info mr-1 mb-1"><span class="fa fa-light fa-edit"></span> </a>';
                $btn = $btn. '<a href="'. url('/mas_data_keuangan/delete/'.$data->id) .'"  class="btn btn-sm btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1"><span class="fa fa-light fa-trash-alt"></span></a>';
                $btn = $btn. '<a href="'. url('/mas_data_keuangan/show/'.$data->id) .'"  class="btn btn-sm btn-icon btn-icon rounded-circle btn-success mr-1 mb-1"><span class="fa fa-light fa-eye"></span></a>';
               return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

}
