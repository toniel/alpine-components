@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4 d-flex justify-content-end">
        <button type="button" x-data @click="$dispatch('add-movie')" class="btn btn-primary">Add Movie</button>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Movies') }}</div>

                <div class="card-body">
                <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title </th>
                                <th>Studio</th>
                                <th>Year Published</th>
                                <th>Artists</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movies as $movie)
                                <tr>
                                    <td>{{ $movie->title }}</td>
                                    <td>{{ $movie->studio?->name }}</td>
                                    <td>{{ $movie->year }}</td>
                                    <td>
                                        @foreach ($movie->artists as $artist)
                                            {{ $artist->name }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" x-data @click="$dispatch('edit-movie', {{ json_encode($movie) }})">Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('movies.modal')
@endsection
