<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasstrukturoorModel extends Model
{
    use HasFactory;
    protected $table = 'tbstrukturoor';
    protected $guarded = ['id'];
    protected $fillable = ['nama_organisasi','status'];


    function organisasi(){
        return $this->belongsTo('App\Models\MasdatapegawaiModel','id_organisasi','id'); 
    }

}
