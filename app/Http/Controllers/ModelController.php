<?php

namespace App\Http\Controllers;

use App\Models\ManufacturerModel;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function index(){
        $models = ManufacturerModel::all();
        return view('models.models', ['models' => $models]);
    }

    public function model(Request $request)
    {
        $slug = $request->slug;
        $model = ManufacturerModel::all()->where('slug', '=', $slug)->first();

        return view('models.model', ['model' => $model]);
    }
}
