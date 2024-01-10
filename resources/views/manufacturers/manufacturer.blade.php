@extends('layouts.app')

@section('title')
Manufacturer
@endsection

@section('content')
    <div class="container d-flex flex-column align-items-center" data-bs-theme="dark">
        <div class="row">
            <div class="col">
                <h1 class="mt-5">{{ $manufacturer->name }}</h1>
            </div>
        </div>
        <div class="row w-75 text-center">
            <div class="col">
                <ul class="list-group mt-5">
                    <li class="list-group-item"><b>Name:</b> {{ $manufacturer->name }}</li>
                    <li class="list-group-item"><b>Founded:</b> {{ $manufacturer->founded }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection