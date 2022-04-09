<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masdatajabtanModel extends Model
{
    use HasFactory;
    protected $table = 'tb_jabatan';
    protected $guarded = ['id'];
    protected $fillable = ['nama_jabatan','status'];
    
    // public $timestamps = false;
    function jabatan(){
        return $this->hasMany('App\Models\MasdatapegawaiModel','id_jabatan','id'); 
    }
}
