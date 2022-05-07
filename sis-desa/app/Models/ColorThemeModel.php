<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorThemeModel extends Model
{
    use HasFactory;
    protected $table='color_theme_models';
    protected $fillable=[
        'tema_color','bg_color'
    ];
}
