<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suratkeluarModel extends Model
{
    use HasFactory;
    protected $table='tb_surat_keluar';
    protected $fillable=[
        'nomor_surat_keluar','nama_pemohon','jenis_surat_id','format_surat_id'
    ];

    public function jenissuratkeluarModel()
    {
        return $this->belongsTo(jenissuratkeluarModel::class,'jenis_surat_id');
    }

    public function formatsuratkeluarModel()
    {
        return $this->belongsTo(formatsuratkeluarModel::class,'format_surat_id');
    }
}
