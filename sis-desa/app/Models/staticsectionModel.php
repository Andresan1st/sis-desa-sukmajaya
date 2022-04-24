<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staticsectionModel extends Model
{
    use HasFactory;
    protected $table='tb_static_section_format';
    protected $fillable=[
        'section_format_id','value'
    ];

    public function sectionformatsuratkeluarModel()
    {
        return $this->belongsTo(sectionformatsuratkeluarModel::class,'section_format_id');
    }
}
