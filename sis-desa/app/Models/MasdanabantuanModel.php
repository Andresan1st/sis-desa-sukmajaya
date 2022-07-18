<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasdanabantuanModel extends Model
{
    use HasFactory;
    protected $table = 'tb_pendataan_dbantuan';
    protected $guarded = ['id'];
    protected $fillable = ['id_masyarakat','tanggal','keterangan','status'];

    function masyarakat(){
        return $this->belongsTo('App\Models\MasdatamasyarakatModel','id_masyarakat','id'); 
    }
}
