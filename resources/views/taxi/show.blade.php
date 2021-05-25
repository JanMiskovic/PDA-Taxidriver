@extends('app')

@section('content')

    <div class="neu-form">
        @if($taxi->exists)
            <h1>Details of Taxi <b>{{ $taxi->reg_plate }}</b></h1>
            <h4>Database ID: <b>{{ $taxi->id }}</b></h4>
            <h2>Model: <b>{{ $taxi->model }}</b></h2>
            <h2>Color: <b>{{ $taxi->color }}</b></h2>
            <h2>Kilometers: <b>{{ $taxi->kilometers }}</b></h2>
            <h2>Registration plate: <b>{{ $taxi->reg_plate }}</b></h2>
            <h4>Created at: {{ $taxi->created_at }}</h4>
            <h4>Last Edited at: {{ $taxi->updated_at }}</h4>

            <a class="btn btn-primary btn-md" href="{{ route('taxi.edit', $taxi->id) }}">Edit</a>
            <form class="d-inline-block" method="post" action="{{ route('taxi.destroy', $taxi->id) }}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-md">Delete</button>
            </form>
        @else
            <h1>Sorry, this Taxi doesn't exist anymore.</h1>
        @endif    
    </div>

@endsection
