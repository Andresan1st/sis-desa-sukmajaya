<?php

namespace App\Http\Controllers;
use Validator;
use DataTables;
use Storage;
use App\Models\suratmasukModel;
use App\Models\lampiransuratmasukModel;
use File;
use Exception;
use Illuminate\Support\Facades\Log;
use League\CommonMark\Inline\Element\Strong;

use Illuminate\Http\Request;

class suratmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat_masuk = suratmasukModel::orderBy('id','desc')->limit(50)->get();
        $lampiran    = lampiransuratmasukModel::orderBy('id','desc')->limit(50)->get();
        return view('surat.masuk.index',compact('surat_masuk','lampiran'));
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
        $validator = Validator::make($request->all(), [
            'nomor_surat_masuk' => 'required|unique:Tb_surat_masuk,nomor_surat_masuk',
            'perihal_surat'     => 'required',
            'tanggal'           => 'required|max:100'
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status'    => 400,
                'message'   => 'Periksa Kembali Inputan Anda',
                'errors'    => $validator->messages(),
            ]);

        }else {

            // get file size
            $size       = $request->file->getSize();
            $ekstensi   = $request->file->extension();
            // store file in directory arsip/surat_masuk/file_surat
            $filename   = time().'_'.$request->file->getClientOriginalName();
            $request->file->move(public_path('arsip/surat_masuk/file_surat'), $filename);
            
            // store surat masuk
            $data   = suratmasukModel::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'nomor_surat_masuk'      => $request->nomor_surat_masuk,
                    'perihal_surat'          => $request->perihal_surat,
                    'file_name'              => $filename,
                    'file_size'              => $size,
                    'file_path'              => 'arsip/surat_masuk/file_surat',
                    'tanggal'                => $request->tanggal,
                    'file_ekstensi'          => $ekstensi,
                ]
            );

            
            if ($request->lampiran !== null) {
                # code...
                foreach ($request->lampiran as $key => $value) {
                    # code...
                    
                    // get file size
                    $size2       = $value->getSize();
                    $ekstensi2   = $value->extension();
                    // store file in directory arsip/surat_masuk/lampiran
                    $filename2   = time().'_'.$value->getClientOriginalName();
                    $value->move(public_path('arsip/surat_masuk/lampiran'), $filename2);
                    
                    // store file lampipran
                    $data2   = lampiransuratmasukModel::updateOrCreate(
                        [
                            'id' => $request->id
                        ],
                        [
                            'file_name'      => $filename2,
                            'file_size'      => $size2,
                            'file_path'      => 'arsip/surat_masuk/lampiran',
                            'id_surat_masuk' => $data->id,
                            'file_ekstensi'  => $ekstensi2,
                        ]
                    );
                }
            }

            return response()->json(
                [
                  'data'    => $data,
                  'status'  => 200,
                  'message' => 'Dokumen / Surat Telah Diarsipkan'
                ]
            );
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
        
    }

    public function remove(Request $request)
    {
        $id   = $request->id; 
        $data = suratmasukModel::findOrFail($id);
        
        if ($data !== null) {
            # code...
            # remove file surat from server
            unlink('arsip/surat_masuk/file_surat/'.$data->file_name);
            # remove file lampiran from server if exist
            if ($data->lampiransuratmasukModel->count() > 0) {
                # code...
                foreach ($data->lampiransuratmasukModel as $key => $value) {
                    # code...
                    unlink('arsip/surat_masuk/lampiran/'.$value->file_name);
                }
            }
            # remove database
            $data->delete();
            # send response success
            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Dokumen / Surat Telah Dihapus'
                ]
            );
            
        }else {
            # code...
            return response()->json([
                'status'    => 400,
                'message'   => 'Data tersebut tidak ditemukan',
            ]);
        }
    }

    function formatBytes($bytes) {
        if ($bytes > 0) {
            $i = floor(log($bytes) / log(1024));
            $sizes = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
            return sprintf('%.02F', round($bytes / pow(1024, $i),1)) * 1 . ' ' . @$sizes[$i];
        } else {
            return 0;
        }
    }

    public function table(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $data = suratmasukModel::orderBy('id','desc')->with('lampiransuratmasukModel');
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($data){
                $btn  = '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$data->id.'" data-target="#modaldownload" class="btn btn-icon btn-icon rounded-circle btn-info mr-1 mb-1"><span class="fa fa-light fa-download"></span> </a>';
                $btn .= '<a href="javascript:void(0)" data-id="'.$data->id.'" data-toggle="modal" data-target="#modaldel"  class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1"><span class="fa fa-light fa-trash-can"></span></a>';
                return $btn;
            })
            ->addColumn('lampiran', function($data){
                $file_lampiran = $data->lampiransuratmasukModel->count();
                if ($file_lampiran > 0) {
                    # code...
                    $lampiran = $file_lampiran.' File'; 
                }else {
                    # code...
                    $lampiran = '-'; 
                }
                return $lampiran;
            })
            ->addColumn('size', function($data){
                $size_surat     = $data->file_size;
                $size_lampiran  = 0;
                foreach ($data->lampiransuratmasukModel as $key => $value) {
                    # code...
                    $size_lampiran = $value->file_size;
                }
                $total_size = $size_surat+$size_lampiran;
                return convertsizeHelper($total_size);
            })
            ->rawColumns(['action','lampiran','size'])
            ->make(true);
        }
        return view('surat.masuk.table');
    }

    public function download(Request $request)
    {
        $file_surat = suratmasukModel::find($request->id);
        $myFile = public_path("arsip/surat_masuk/file_surat/".$file_surat->file_name);
        $lampiran  = [];
        if ($file_surat->lampiransuratmasukModel->count() > 0) {
            # code...
            foreach ($file_surat as $key => $value) {
                # code...
                $lampiran = public_path("arsip/surat_masuk/file_surat/".$file_surat->file_name); 
            }
        }
        return response()->download($myFile,implode('',$lampiran));
    }
}
