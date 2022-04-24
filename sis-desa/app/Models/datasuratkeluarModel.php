<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datasuratkeluarModel extends Model
{
    use HasFactory;
    protected $table='tb_data_surat_keluar';
    protected $fillable=[
        'section_format_id','masyarakat_id'
    ];

    public function sectionformatsuratkeluarModel()
    {
        return $this->belongsTo(sectionformatsuratkeluarModel::class,'section_format_id');
    }

    public function MasdatamasyarakatModel()
    {
        return $this->belongsTo(MasdatamasyarakatModel::class,'masyarakat_id','nik');
    }
}
