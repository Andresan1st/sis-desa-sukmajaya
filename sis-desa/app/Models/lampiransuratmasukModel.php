<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lampiransuratmasukModel extends Model
{
    use HasFactory;
    protected $table='tb_lampiran';
    protected $fillable=[
        'file_name','file_size','id_surat_masuk','file_ekstensi'
    ];

    public function tb_surat_masuk()
    {
        return $this->belongsTo(suratmasukModel::class,'id_surat_masuk');
    }
}
