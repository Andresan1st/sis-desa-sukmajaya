<?php

namespace App\Http\Controllers;
use App\Models\ColorThemeModel;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function submit_color(Request $request)
    {
        $data   = ColorThemeModel::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'tema_color'        => $request->tema_color,
                'bg_color'          => $request->bg_color,
            ]
        );
        return redirect()->back();
    }
}
