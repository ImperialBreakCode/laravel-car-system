<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view('cars.cars', ['cars' => $cars]);
    }

    public function car(Request $request)
    {
        $index = $request->index;
        $car = Car::all()->where('id', '=', $index)->first();

        return view('cars.car', ['car' => $car]);
    }
}
