<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_lampiran extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'file_size',
        'id_surat_masuk',
    ];

    public function tb_surat_masuk()
    {
        return $this->belongsTo(Tb_surat_masuk::class,'id_surat_masuk');
    }
}
