<?php
namespace App\Repositories\Pegawai;
use App\Interfaces\MasdatapegawaiRepoInterfaces;
use DB;
use Response;
use PDF;
use Validator;
use Auth;
use Carbon\Carbon;
use App\Models\MasdatapegawaiModel;
use App\Models\masdatajabtanModel;
use App\Models\MasstrukturoorModel;
class MasDatapegawaiRepo implements MasdatapegawaiRepoInterfaces {
    public function createpegawai(array $pegawai){
     
       return MasdatapegawaiModel::create([
            "nip"=>$pegawai["nip"],
            "nama"=> $pegawai["data"]["nama"],
            "alamat"=>$pegawai["data"]["alamat"],
            "no_telp"=>"62".$pegawai["data"]["no_telp"],
            "jenkel"=>$pegawai["data"]["jenkel"],
            "id_jabatan"=>$pegawai["data"]["id_jabatan"],
            "id_organisasi"=>$pegawai["data"]["id_organisasi"],
            "status"=>"ACTIVE"
        ]);
    }
   
}

?>