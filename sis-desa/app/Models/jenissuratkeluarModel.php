<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenissuratkeluarModel extends Model
{
    use HasFactory;
    protected $table='tb_jenis_surat_keluar';
    protected $fillable=[
        'jenis_surat_name','nomor','bagan'
    ];

    public function formatsuratkeluarModel()
    {
        return $this->hasMany(formatsuratkeluarModel::class,'jenis_surat_keluar_id','id');
    }

    public function suratkeluarModel()
    {
        return $this->hasOne(suratkeluarModel::class,'jenis_surat_id','id');
    }
}
