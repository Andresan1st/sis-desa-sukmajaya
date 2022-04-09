<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suratmasukModel extends Model
{
    use HasFactory;
    protected $table='tb_surat_masuk';
    protected $fillable=[
        'nomor_surat_masuk','perihal_surat','tanggal','file_name','file_path','file_size','file_ekstensi'
    ];

    public function lampiransuratmasukModel()
    {
        return $this->hasMany(lampiransuratmasukModel::class,'id_surat_masuk','id');
    }
}
