<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasdatapegawaiModel extends Model
{
    use HasFactory;
    protected $table = 'tb_pegawai';
    protected $guarded = ['id'];
    protected $fillable = ['nip','nama_pegawai','alamat','alamat','no_telp','jenkel','id_jabatan'];


    function jabatan(){
        return $this->belongsTo('App\Models\masdatajabtanModel','id_jabatan','id'); 
    }
}
