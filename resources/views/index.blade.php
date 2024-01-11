@extends('layouts.app')

@section('title')
Home
@endsection

@section('content')
    <h1 class="text-center text-capitalize mt-5">Car system</h1>
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <a href="cars" class="btn btn-primary text-center w-50 my-5">Cars</a>
            </div>
            <div class="col d-flex justify-content-center">
                <a href="models" class="btn btn-primary text-center w-50 my-5">Models</a>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <a href="manufacturers" class="btn btn-primary text-center w-50 my-5">Car manufacturer</a>
            </div>
            <div class="col d-flex justify-content-center">
                <a href="admin" class="btn btn-primary text-center w-50 my-5">Admin panel</a>
            </div>
        </div>
    </div>
@endsection