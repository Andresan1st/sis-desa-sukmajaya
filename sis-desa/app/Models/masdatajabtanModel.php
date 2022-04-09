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

}
