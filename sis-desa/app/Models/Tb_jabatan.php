<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_jabatan extends Model
{
    use HasFactory;
    protected $table = 'tb_jabatan';
    
    protected $fillable = [
        'nama_jabatan',
        'status',
    ];

    public function tb_pegawai()
    {
        return $this->belongsTo(Tb_pegawai::class);
    }
}
