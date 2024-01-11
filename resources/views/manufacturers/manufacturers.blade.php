@extends('layouts.app')

@section('title')
Manufacturers
@endsection

@section('content')
    <div class="container d-flex flex-column align-items-center" data-bs-theme="dark">
        <div class="row">
            <div class="col">
                <h1 class="my-5">Manufacturers</h1>
            </div>
        </div>
        <div class="row w-100">
            <div class="col">
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Founded</th>
                            <th scope="col">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($manufacturers as $manufacturer)
                            <tr>
                                <th scope="row">{{ $manufacturer->id }}</th>
                                <td>{{ $manufacturer->name }}</td>
                                <td>{{ $manufacturer->founded }}</td>
                                <td><a href="{{ url('/manufacturer/' . $manufacturer->slug) }}" class="btn btn-primary">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection