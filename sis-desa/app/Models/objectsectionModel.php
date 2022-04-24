<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class objectsectionModel extends Model
{
    protected $table='tb_object_section_format';
    protected $fillable=[
        'section_format_id','value'
    ];

    public function sectionformatsuratkeluarModel()
    {
        return $this->belongsTo(sectionformatsuratkeluarModel::class,'section_format_id');
    }
}
