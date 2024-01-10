@extends('layouts.app')

@section('title')
Model
@endsection

@section('content')
    <div class="container d-flex flex-column align-items-center" data-bs-theme="dark">
        <div class="row">
            <div class="col">
                <h1 class="mt-5">{{ $model->name }}</h1>
            </div>
        </div>
        <div class="row w-75 text-center">
            <div class="col">
                <ul class="list-group mt-5">
                    <li class="list-group-item"><b>Name:</b> {{ $model->name }}</li>
                    <li class="list-group-item"><b>Manufacturer:</b> {{ $model->manufacturer->name }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection