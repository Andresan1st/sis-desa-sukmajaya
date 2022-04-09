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
use App\Models\masdatajabtanModel;
class masdatajabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.mas_data_jabatan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('master.mas_data_jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $messages = [
                'nama_jabatan.required' => 'Field Jabatan harus diisi',
            ];
            $validator = Validator::make($request->all(), [
                'nama_jabatan' => 'required',
            ], $messages);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                $datajabatan = masdatajabtanModel::create([
                    "nama_jabatan"=> $request->nama_jabatan,
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
        $datajabatan = masdatajabtanModel::where('id',$id)->first();
        $status =  masdatajabtanModel::all();
        dd($status);
        return view('master.mas_data_jabatan.update',compact('datajabatan','status'));
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
    
    public function apijabatan(){
        $data = masdatajabtanModel::all();

        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
               $btn = '';
                    $btn = $btn. '<a href="'. url('/mas_data_jabatan/edit/'.$data->id) .'" class="btn btn-icon btn-icon rounded-circle btn-info mr-1 mb-1"><span class="fa fa-light fa-pen-to-square"></span> </a>';
                     $btn = $btn. '<a href="'. url('/mas_data_jabatan/delete/'.$data->id) .'"  class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1"><span class="fa fa-light fa-trash-can"></span></a>';
               return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
