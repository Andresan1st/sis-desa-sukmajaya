<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_surat_masuk extends Model
{
    use HasFactory;
    protected $table = 'tb_surat_masuk';

    protected $fillable = [
        'nomor_surat_masuk',
        'perihal_surat',
        'tanggal',
        'file_name',
        'file_path',
        'file_size'
    ];

    public function tb_lampiran()
    {
        return $this->hasMany(Tb_lampiran::class,'id_surat_masuk','id');
    }
}
