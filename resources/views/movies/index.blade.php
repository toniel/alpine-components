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

                </div>
            </div>
        </div>
    </div>
</div>
@include('movies.modal')
@endsection
