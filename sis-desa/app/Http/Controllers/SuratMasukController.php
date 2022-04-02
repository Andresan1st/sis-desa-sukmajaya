<?php

namespace App\Http\Controllers;
use App\Models\Tb_surat_masuk;
use App\Models\Tb_lampiran;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function surat_masuk_page(Request $request)
    {
        if ($request->ajax()) {
    		$data = Tb_surat_masuk::orderBy('id','desc')->get();
            return response()->json($data);
        }
        return view('form.surat_masuk');
    }

    public function store_surat_masuk(Request $request)
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

            // store file in directory arsip/surat_masuk/file_surat
            $filename   = time().'_'.$request->file->getClientOriginalName();
            $request->file->move(public_path('arsip/surat_masuk/file_surat'), $filename);
            
            // store surat masuk
            $data   = Tb_surat_masuk::updateOrCreate(
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
                ]
            );

            
            if ($request->lampiran !== null) {
                # code...
                foreach ($request->lampiran as $key => $value) {
                    # code...
                    
                    // get file size
                    $size2       = $value->getSize();
                    
                    // store file in directory arsip/surat_masuk/lampiran
                    $filename2   = time().'_'.$value->getClientOriginalName();
                    $value->move(public_path('arsip/surat_masuk/lampiran'), $filename);
                    
                    // store file lampipran
                    $data   = Tb_lampiran::updateOrCreate(
                        [
                            'id' => $request->id
                        ],
                        [
                            'file_name'      => $filename2,
                            'file_size'      => $size2,
                            'file_path'      => 'arsip/surat_masuk/lampiran',
                            'id_surat_masuk' => $data->id,
                        ]
                    );
                }
            }

            return response()->json(
                [
                  'status'  => 200,
                  'message' => 'Surat Telah Diarsipkan'
                ]
            );
        }
    }
}
