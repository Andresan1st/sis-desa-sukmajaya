<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasdatamasyarakatModel extends Model
{
    use HasFactory;
    protected $table = 'tb_masyarakat';
    protected $guarded = ['id'];
    protected $fillable = ['nik','nama','tempat_lahir','tgl_lahir','jenkel','rt_rw','alamat','agama','status_kawin','no_kk','status','pekerjaan','kewarganegaraan'];

    public function datasuratkeluarModel()
    {
        return $this->hasMany(datasuratkeluarModel::class,'masyarakat_id','nik');
    }

    function masyarakat(){
        return $this->hasOne('App\Models\MasdanabantuanModel','id_masyarakat','id'); 
    }
}
