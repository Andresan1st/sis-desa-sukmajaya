<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasdatapegawaiModel extends Model
{
    use HasFactory;
    protected $table = 'tb_pegawai';
    protected $guarded = ['id'];
    protected $fillable = ['nip','nama','alamat','alamat','no_telp','jenkel','id_jabatan','id_organisasi','status'];


    function jabatan(){
        return $this->belongsTo('App\Models\masdatajabtanModel','id_jabatan','id'); 
    }

    // function organisasi(){
    //     return $this->hasMany('App\Models\MasstrukturoorModel','id_organisasi','id'); 
    // }
    
    function organisasi(){
        return $this->belongsTo('App\Models\MasstrukturoorModel','id_organisasi','id'); 
    }
}
