<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use PDF;
use DataTables;
use Validator;
use Auth;
use Hash;
class UserroleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('master.mas_user_role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = DB::table('tb_jabatan')
        ->whereRaw("status='ACTIVE'")
        ->get();
        $pegawai = DB::table('tb_pegawai')
        ->whereRaw("status='ACTIVE'")
        ->get();
        return view('master.mas_user_role.create',compact("department","pegawai"));
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
                'name.required' => 'Field  Username  harus diisi',
                'email.required' => 'Field  Email  harus diisi',
                'email.email' => 'Field  Email Harus format email',
                'password.required' => 'Field Password  harus diisi',
                'role.required' => 'Field Role  harus diisi',
                'id_pegawai.required' => 'Field Pegawai  harus diisi',
            ];
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'role' => 'required',
                'id_pegawai' => 'required',
            ], $messages);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                $item = DB::table('users')->insert([
                    'username'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                    'role'=>strtolower($request->role),
                    'id_pegawai'=>$request->id_pegawai,
                    'status'=>"ACTIVE"
                ]);
                $data['status']="Berhasil Simpan";
                DB::commit();
                return Response()->json([
                    $data,
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
        $datauser = DB::table('users')
        ->where('id',$id)->first();
        $department = DB::table('tb_jabatan')
        ->whereRaw("status='ACTIVE'")
        ->get();
        $pegawai = DB::table('tb_pegawai')
        ->whereRaw("status='ACTIVE'")
        ->get();
        return view('master.mas_user_role.update',compact('datauser','pegawai','department'));
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
                'name.required' => 'Field  Username  harus diisi',
                'email.required' => 'Field  Email  harus diisi',
                'email.email' => 'Field  Email Harus format email',
                'password.required' => 'Field Password  harus diisi',
                'role.required' => 'Field Role  harus diisi',
                'id_pegawai.required' => 'Field Pegawai  harus diisi',
            ];
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'role' => 'required',
                'id_pegawai' => 'required',
            ], $messages);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                $item = DB::table('users')->where('id',$request->id)->update([
                    'username'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                    'role'=>strtolower($request->role),
                    'id_pegawai'=>$request->id_pegawai,
                    'status'=>$request->status
                ]);
                $data['status']="Berhasil Simpan";
                DB::commit();
                return Response()->json([
                    $data,
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
            DB::table('users')
                ->where('id', '=', $id)
                ->update([
                    'status' => 'DELETED',
                ]);
            DB::commit();
            $success = true;
        }catch(\Exception $e){
            dd($e);
            $success = false;
            DB::rollback();
        }
        return view('setup.master_userrole.index');
    }
    public function apiuserrole(){
        $data =DB::table('users')->selectRaw("users.id,username,email,pegawai.nama,role,users.status")->leftJoin('tb_pegawai as pegawai','pegawai.id','users.id_pegawai')->whereRaw("users.status='ACTIVE'")->orderBy("users.id","desc")->get();
        // dd($data);
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
               $btn = '';
               $btn = $btn. '<a href="'. url('/mas_data_userrole/edit/'.$data->id) .'" class="btn btn-icon btn-icon rounded-circle btn-info mr-1 mb-1"><span class="fa fa-pencil"></span> </a>&nbsp;';
               $btn = $btn. '<a href="'. url('/mas_data_userrole/delete/'.$data->id) .'" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1" ><span class="fa fa-eraser"></span> </a>&nbsp;';
               return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
