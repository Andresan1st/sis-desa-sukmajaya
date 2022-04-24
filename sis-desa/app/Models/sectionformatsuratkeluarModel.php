<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sectionformatsuratkeluarModel extends Model
{
    use HasFactory;
    protected $table='tb_section_format_surat_keluar';
    protected $fillable=[
        'format_surat_keluar_id','section_name','status'
    ];

    public function formatsuratkeluarModel()
    {
        return $this->belongsTo(formatsuratkeluarModel::class,'format_surat_keluar_id');
    }

    public function staticsectionModel()
    {
        return $this->hasOne(staticsectionModel::class,'section_format_id','id');
    }

    public function datasuratkeluarModel()
    {
        return $this->hasOne(datasuratkeluarModel::class,'section_format_id','id');
    }

    public function objectsectionModel()
    {
        return $this->hasOne(objectsectionModel::class,'section_format_id','id');
    }
}
