<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_pegawai extends Model
{
    use HasFactory;
    protected $table = 'tb_pegawai';
    
    protected $fillable = [
        'nip',
        'nama_pegawai',
        'alamat',
        'no_telp',
        'jen_kel',
        'id_jabatan',
    ];
}
