@extends('layouts.app')

@section('title')
Models
@endsection

@section('content')
    <div class="container d-flex flex-column align-items-center" data-bs-theme="dark">
        <div class="row">
            <div class="col">
                <h1 class="my-5">Models</h1>
            </div>
        </div>
        <div class="row w-100">
            <div class="col">
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Manufacturer</th>
                            <th scope="col">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($models as $model)
                            <tr>
                                <th scope="row">{{ $model->id }}</th>
                                <td>{{ $model->name }}</td>
                                <td>{{ $model->manufacturer->name }}</td>
                                <td><a href="{{ url('/model/' . $model->slug) }}" class="btn btn-primary">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection