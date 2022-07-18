<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasdatakeuanganModel extends Model
{
    use HasFactory;
    protected $table = 'tb_keuangan_desa';
    protected $guarded = ['id'];
    protected $fillable = ['tanggal','total_keuangan'];

   
}
