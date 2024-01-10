@extends('layouts.app')

@section('title')
Car
@endsection

@section('content')
    <div class="container d-flex flex-column align-items-center" data-bs-theme="dark">
        <div class="row">
            <div class="col">
                <img class="mt-5" width="400px" src="/{{ $car->image }}" alt="car">
            </div>
        </div>
        <div class="row w-75 text-center">
            <div class="col">
                <ul class="list-group mt-5">
                    <li class="list-group-item"><b>year:</b> {{ $car->year_of_manufacturing }}</li>
                    <li class="list-group-item"><b>km traveled:</b> {{ $car->kilometers_traveled }}</li>
                    <li class="list-group-item"><b>manufacturer:</b> {{ $car->manufacturer->name }}</li>
                    <li class="list-group-item"><b>model:</b> {{ $car->manufacturerModel->name }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection