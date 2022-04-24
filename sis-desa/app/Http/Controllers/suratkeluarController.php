<?php

namespace App\Http\Controllers;
use App\Models\jenissuratkeluarModel;
use App\Models\formatsuratkeluarModel;
use App\Models\MasdatamasyarakatModel;
use App\Models\suratkeluarModel;
use App\Models\datasuratkeluarModel;
use App\Models\staticsectionModel;
use App\Models\objectsectionModel;
use App\Models\sectionformatsuratkeluarModel;
use DataTables;
use Validator;
use PDF;
use Illuminate\Http\Request;

class suratkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = jenissuratkeluarModel::all();
        return view('surat.keluar.index',compact('jenis'));
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
        // $validator = Validator::make($request->all(), [
        //     'jenis_surat_name'  => 'required',
        //     'nomor'             => 'required',
        //     'bagan'             => 'required'
        // ]);

        // if ($validator->fails()) {

        //     return response()->json([
        //         'status'    => 400,
        //         'message'   => 'Periksa Kembali Inputan Anda',
        //         'errors'    => $validator->messages(),
        //     ]);

        // }else {
            
            
        // }

        $check  = MasdatamasyarakatModel::where('nik', $request->nik)->first();
        if ($check == null) {
            # code belum terdaftar...
            // store jenis surat keluar
            $data   = suratkeluarModel::updateOrCreate(
                [
                    'id' => $request->id // null create new one first
                ],
                [
                    'nomor_surat_keluar'      => $request->nomor_surat_keluar,
                    'nama_pemohon'          => $request->nama_pemohon,
                    'jenis_surat_id'          => $request->jenis_surat_id,
                    'format_surat_id'       => $request->format_surat_id
                ]
            );
            // foreach (count($request->nama) as $key => $value) {
            //     # code...
            //     // store data masyarakat multiple dari input surat
            //     $data2  = MasdatamasyarakatModel::updateOrCreate(
            //         [
            //             'id' => $value->id // null create new one first
            //         ],
            //         [
            //             'nik' => $value->nik,
            //             'nama' => $value->nama,
            //             'tempat_lahir' => $value->tempat_lahir,
            //             'tgl_lahir' => $value->tgl_lahir,
            //             'kewarganegaraan' => $value->kewarganegaraan,
            //             'jenkel' => $value->jenkel,
            //             'alamat' => $value->alamat,
            //             'agama' => $value->agama,
            //             'pekerjaan' => $value->pekerjaan,
            //             'status_kawin' => $value->status_kawin,
            //         ]
            //     );

            // }
            for ($subject = 0; $subject < count($request->nama); $subject++) { 
                # code...
                $data2 = array(
                    'nik' => $request->nik[$subject],
                    'nama' => $request->nama[$subject],
                    'tempat_lahir' => $request->tempat_lahir[$subject],
                    'tgl_lahir' => $request->tgl_lahir[$subject],
                    'kewarganegaraan' => $request->kewarganegaraan[$subject],
                    'jenkel' => $request->jenkel[$subject],
                    'alamat' => $request->alamat[$subject],
                    'agama' => $request->agama[$subject],
                    'pekerjaan' => $request->pekerjaan[$subject],
                    'status_kawin' => $request->status_kawin[$subject],
                );

                $data3 = array(
                    'masyarakat_id' => $request->nik[$subject],
                    'section_format_id' => $request->section_format_subject_id[$subject],
                );

                $insert_data2[] = $data2;
                $insert_data3[] = $data3;
            }
            $dataz = MasdatamasyarakatModel::insert($insert_data2);
            $datay = datasuratkeluarModel::insert($insert_data3);
            // store penghubung antara surat dan masyarakat
            // $data3  = datasuratkeluarModel::updateOrCreate(
            //     [
            //         'id' => $request->id,
            //     ],
            //     [
            //         'masyarakat_id' => $data2->id,
            //         'section_format_id' => $request->section_format_subject_id,
            //     ]
            // );

            if ($request->section_format_id !== null) {
                # ada object isian code...
                $datax  = objectsectionModel::updateOrCreate(
                    [
                        'id' => $request->id,
                    ],
                    [
                        'section_format_id' => $request->section_format_id,
                        'value'             => $request->object_value
                    ]
                );
            }
        }
        
        

        return response()->json(
            [
              'status'  => 200,
              'message' => 'Surat Baru Berhasil Diarsipkan'
            ]
        );
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

    public function jenis_surat(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $data = jenissuratkeluarModel::orderBy('id','desc');
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($data){
                $btn  = '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$data->id.'" data-jenis_surat_name="'.$data->jenis_surat_name.'" data-nomor="'.$data->nomor.'" data-bagan="'.$data->bagan.'" data-target="#modaledit" class="btn btn-icon btn-icon rounded-circle btn-info mr-1 mb-1"><span class="fa fa-light fa-edit"></span> </a>';
                $btn .= '<a href="javascript:void(0)" data-id="'.$data->id.'" data-toggle="modal" data-target="#modaldel"  class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1"><span class="fa fa-light fa-trash"></span></a>';
                return $btn;
                
            })
            ->addColumn('format', function($data){
                $total_format = $data->formatsuratkeluarModel->count();
                if ($total_format > 0 && $total_format > 1) {
                    # code...
                    $format_name = [];
                    foreach ($data->formatsuratkeluarModel as $key => $value) {
                        # code...
                        $format_name[] = $value->format_surat_name;
                    }
                    return implode('<br>',$format_name);
                }
                elseif($total_format > 0 && $total_format == 1)
                {
                    return '<span class="text-primary" style="font-size:12px">'.$data->formatsuratkeluarModel->count().' Format </span>';
                }
                else {
                   # code...
                   return '<code style="font-size:12px"> Kosong </code>';
                }
            })
            ->rawColumns(['action','format'])
            ->make(true);
        }
        return view('surat.keluar.jenis');
    }

    public function store_jenis_surat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_surat_name'  => 'required',
            'nomor'             => 'required',
            'bagan'             => 'required'
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status'    => 400,
                'message'   => 'Periksa Kembali Inputan Anda',
                'errors'    => $validator->messages(),
            ]);

        }else {
            
            // store jenis surat keluar
            $data   = jenissuratkeluarModel::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'jenis_surat_name'      => $request->jenis_surat_name,
                    'nomor'          => $request->nomor,
                    'bagan'          => $request->bagan,
                ]
            );


            return response()->json(
                [
                  'data'    => $data,
                  'status'  => 200,
                  'message' => 'Jenis Surat Baru Diarsipkan'
                ]
            );
        }
    }

    public function store_format_surat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_surat_keluar_id'  => 'required',
            'format_name'            => 'required'
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status'    => 400,
                'message'   => 'Periksa Kembali Inputan Anda',
                'errors'    => $validator->messages(),
            ]);

        }else {
            
            // store format surat keluar
            $data   = formatsuratkeluarModel::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'jenis_surat_keluar_id'      => $request->jenis_surat_keluar_id,
                    'format_name'                => $request->format_name
                ]
            );


            return response()->json(
                [
                  'data'    => $data,
                  'status'  => 200,
                  'message' => 'Format Surat Baru Diarsipkan'
                ]
            );
        }
    }

    public function store_struktur_surat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'format_surat_keluar_id'  => 'required',
            'section_name'            => 'required',
            'status'                  => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status'    => 400,
                'message'   => 'Periksa Kembali Inputan Anda',
                'errors'    => $validator->messages(),
            ]);

        }else {
            
            $data   = sectionformatsuratkeluarModel::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'format_surat_keluar_id'      => $request->format_surat_keluar_id,
                    'section_name'                => $request->section_name,
                    'status'                      => $request->status,
                ]
            );

            if ($data->status == 'static') {
                # code...
                staticsectionModel::updateOrCreate(
                    [
                        'id' => $request->static_id // null create new one
                    ],
                    [
                        'section_format_id' => $data->id,
                        'value'             => $request->value,
                    ]
                );
            }
            return response()->json(
                [
                  'data'    => $data,
                  'status'  => 200,
                  'message' => 'Struktur Format Surat Baru Diarsipkan'
                ]
            );
        }
    }

    public function dell_jenis_surat(Request $request)
    {
        $id   = $request->id; 
        $data = jenissuratkeluarModel::findOrFail($id)->delete();
        return response()->json([
            'status'    => 200,
            'message'   => 'Doccument Surat Keluar Tersebut Telah Dihapus',
        ]);
    }

    public function dell_format_surat(Request $request)
    {
        $id   = $request->id; 
        $data = formatsuratkeluarModel::findOrFail($id);
        if ($data->sectionformatsuratkeluarModel->count() > 0) {
            # code...
            sectionformatsuratkeluarModel::where('format_surat_keluar_id', $id)->delete();
            $data->delete();
        }else {
            # code...
            $data->delete();
        }
        return response()->json([
            'status'    => 200,
            'message'   => 'Doccument Surat Keluar Tersebut Telah Dihapus',
        ]);
    }

    public function format_surat(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $data = formatsuratkeluarModel::orderBy('id','desc')->with('jenissuratkeluarModel');
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($data){
                $btn  = '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$data->id.'" data-jenis_surat_name="'.$data->jenis_surat_name.'" data-nomor="'.$data->nomor.'" data-bagan="'.$data->bagan.'" data-target="#modaledit" class="btn btn-icon btn-icon rounded-circle btn-info mr-1 mb-1"><span class="fa fa-light fa-plus"></span> </a>';
                $btn .= '<a href="javascript:void(0)" data-id="'.$data->id.'" data-toggle="modal" data-target="#modaldel"  class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1"><span class="fa fa-light fa-trash"></span></a>';
                return $btn;
                
            })
            ->addColumn('jenis', function($data){
                return $data->jenissuratkeluarModel->jenis_surat_name;
            })
            ->addColumn('section', function($data){
                if ($data->sectionformatsuratkeluarModel->count() > 0) {
                    # code...
                    $struktur =[];
                    foreach ($data->sectionformatsuratkeluarModel as $key => $value) {
                        # code...
                        // $struktur[] = '<a data-id="'.$value->id.'" data-section_name="'.$value->section_name.'" data-format_surat_keluar_id="'.$value->format_surat_keluar_id.'" data-toggle="modal" data-target="#modalstruktur" class="text-primary">'.$value->section_name.'</a>';
                        $struktur[] = '<a data-id="'.$value->id.'" data-section_name="'.$value->section_name.'" data-format_surat_keluar_id="'.$value->format_surat_keluar_id.'" data-toggle="modal" class="text-primary">'.$value->section_name.'</a>';
                    }
                    return implode('<br>',$struktur);
                }else {
                    # code...
                    return '<code style="font-size:12px">Kosong</code>';
                }
            })
            ->rawColumns(['action','section','jenis'])
            ->make(true);
        }

        $jenis = jenissuratkeluarModel::all();
        return view('surat.keluar.format',compact('jenis'));
    }

    public function buat_surat($id)
    {
        $jenis = jenissuratkeluarModel::all();
        $data  = jenissuratkeluarModel::find($id);
        $surat = suratkeluarModel::where('jenis_surat_id',$id);
        $masya = MasdatamasyarakatModel::all()->count();
        $bulan = bulanromawiHelper(date('m'));
        $len   = strlen($surat->count()+1);
        $urut;
        if ($len == 1) {
            # code...
            $urut = '00'.$surat->count()+1;
        }elseif ($len == 2) {
            # code...
            $urut = '0'.$surat->count()+1;
        }else {
            # code...
            $urut = $surat->count();
        }
        
        return view('surat.keluar.buat',compact('jenis','data','urut','bulan','masya'));
    }

    public function database(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $data = suratkeluarModel::orderBy('id','desc');
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($data){
                $btn = '<a href="/preview_surat_keluar/'.$data->id.'" data-id="'.$data->id.'" class="btn btn-icon btn-icon rounded-circle btn-info mr-1 mb-1"><span class="fa fa-light fa-eye"></span> </a>';
                $btn .= '<a target="_blank" href="/cetak_surat_keluar/'.$data->id.'" data-id="'.$data->id.'" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1 mb-1"><span class="fa fa-light fa-print"></span> </a>';
                return $btn;
                
            })
            ->addColumn('jenis', function($data){
                return $data->jenissuratkeluarModel->jenis_surat_name;
            })
            ->rawColumns(['action','jenis'])
            ->make(true);
        }

        $jenis = jenissuratkeluarModel::all();
        return view('surat.keluar.database',compact('jenis'));
    }

    public function preview(Request $request,$id)
    {
        $surat = suratkeluarModel::find($id);
        $jenis = jenissuratkeluarModel::all();
        $data  = $surat->jenissuratkeluarModel;
        $bulan = bulanromawiHelper(date('m'));
        
        return view('surat.keluar.preview',compact('jenis','data','bulan','surat'));
    }

    public function cetak(Request $request, $id)
    {
        $surat  = suratkeluarModel::find($id);
        $jenis = jenissuratkeluarModel::all();
        $data   = $surat->jenissuratkeluarModel;
        $pdf    = PDF::loadview('surat.keluar.cetak',compact('surat','data','jenis'));
        return $pdf->stream($data->jenis_surat_name.'.pdf','I');
    }
}
