@extends('layouts.app')

@section('title')
Cars
@endsection

@section('content')
<h1 class="text-center text-capitalize my-5">Cars</h1>

<div class="container" data-bs-theme="dark">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="w-75 my-5">
                <form action="#">
                    <div class="input-group">
                        <input class="form-control" placeholder="Type to search...">
                        <input class="btn btn-primary" type="submit" value="search">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container car-grid" data-bs-theme="dark">

    @foreach ($cars as $car)

        <div class="d-flex justify-content-center my-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset($car->image) }}" class="card-img-top"
                    alt="car image">
                <div class="card-body">
                    <ul class="list-group mb-3">
                        <li class="list-group-item"><b>year:</b> {{ $car->year_of_manufacturing }}</li>
                        <li class="list-group-item"><b>km traveled:</b> {{ $car->kilometers_traveled }}</li>
                        <li class="list-group-item"><b>manufacturer:</b> {{ $car->manufacturer->name }}</li>
                        <li class="list-group-item"><b>model:</b> {{ $car->manufacturerModel->name }}</li>
                    </ul>
                    <a href="{{ url('/car/' . $car->id) }}" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>

    @endforeach
</div>
@endsection
