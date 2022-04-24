<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formatsuratkeluarModel extends Model
{
    use HasFactory;
    protected $table='tb_format_surat_keluar';
    protected $fillable=[
        'jenis_surat_keluar_id','format_name'
    ];

    public function jenissuratkeluarModel()
    {
        return $this->belongsTo(jenissuratkeluarModel::class,'jenis_surat_keluar_id');
    }

    public function sectionformatsuratkeluarModel()
    {
        return $this->hasMany(sectionformatsuratkeluarModel::class,'format_surat_keluar_id','id');
    }

    public function suratkeluarModel()
    {
        return $this->hasOne(suratkeluarModel::class,'format_surat_id','id');
    }
}
