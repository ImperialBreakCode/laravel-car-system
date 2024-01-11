<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function index()
    {
        $manufact = Manufacturer::all();

        return view('manufacturers.manufacturers', ['manufacturers' => $manufact]);
    }

    public function manufacturer(Request $request)
    {
        $slug = $request->slug;
        $manufacturer = Manufacturer::all()->where('slug', '=', $slug)->first();

        return view('manufacturers.manufacturer', ['manufacturer' => $manufacturer]);
    }
}
