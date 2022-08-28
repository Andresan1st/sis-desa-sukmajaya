<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasabsenModel extends Model
{
    use HasFactory;
    protected $table = 'mas_absen';
    protected $guarded = ['id'];
    protected $fillable = ['nip','tanggal','jam_masuk','jam_keluar','status'];


}
