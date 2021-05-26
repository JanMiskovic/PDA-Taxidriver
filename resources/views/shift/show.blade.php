@extends('app')

@section('content')

    <div class="neu-form">
        @if($shift->exists)
            <h1>Details of Shift <b>{{ $shift->id }}</b></h1>
            <h4>Database ID: <b>{{ $shift->id }}</b></h4>
            <h2>Start: <b>{{ $shift->start }}</b></h2>
            <h2>End: <b>{{ $shift->end }}</b></h2>
            <h2>Length: <b>{{ date('H:i', strtotime($shift->end) - strtotime($shift->start)) }}</b></h2>
            @if(!empty($shift->driver))
            <h2>Driver: <b>{{ $shift->driver->first_name }} {{ $shift->driver->last_name }} ({{ $shift->driver->phone }})</b></h2>
            @else
            <h2>Driver: <b>Driver Deleted</b></h2>
            @endif
            @if(!empty($shift->taxi))
            <h2>Taxi: <b>{{ $shift->taxi->model }} ({{ $shift->taxi->reg_plate }})</b></h2>
            @else
            <h2>Taxi: <b>Taxi Deleted</b></h2>
            @endif
            <h4>Created at: {{ $shift->created_at }}</h4>
            <h4>Last Edited at: {{ $shift->updated_at }}</h4>

            <a class="btn btn-primary btn-md" href="{{ route('shift.edit', $shift->id) }}">Edit</a>
            <form class="d-inline-block" method="post" action="{{ route('shift.destroy', $shift->id) }}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-md">Delete</button>
            </form>
        @else
            <h1>Sorry, this Shift doesn't exist anymore.</h1>
        @endif    
    </div>

@endsection
