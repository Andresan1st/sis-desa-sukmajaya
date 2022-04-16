<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasdatamasyarakatModel extends Model
{
    use HasFactory;
    protected $table = 'tb_masyarakat';
    protected $guarded = ['id'];
    protected $fillable = ['nik','nama','tempat_lahir','tgl_lahir','jenkel','rt_rw','alamat','agama','status_kawin','no_kk','status'];

}
