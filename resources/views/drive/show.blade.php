@extends('app')

@section('content')

    <div class="neu-form">
        @if($drive->exists)
            <h1>Details of Drive <b>{{ $drive->id }}</b></h1>
            <h4>Database ID: <b>{{ $drive->id }}</b></h4>
            @if(!empty($drive->id_shift))
                <h2>Shift ID: <b>{{ $drive->id_shift }}</b></h2>
                
                @if(!empty($drive->shift->driver))
                    <h2>Driver: <b>{{ $drive->shift->driver->first_name }} {{ $drive->shift->driver->last_name }} ({{ $drive->shift->driver->phone }})</b></h2>
                @else
                    <h2>Driver: <b>Driver Deleted</b></h2>
                @endif

                @if(!empty($drive->shift->taxi))
                    <h2>Taxi: <b>{{ $drive->shift->taxi->model }} ({{ $drive->shift->taxi->reg_plate }})</b></h2>
                @else
                    <h2>Taxi: <b>Taxi Deleted</b></h2>
                @endif

            @else
                <h2>Shift ID: <b>Shift Deleted</b></h2>
            @endif

            <h2>Start: <b>{{ $drive->start }}</b></h2>
            <h2>End: <b>{{ $drive->end }}</b></h2>
            <h2>Length: <b>{{ date('H:i', strtotime($drive->end) - strtotime($drive->start)) }}</b></h2>
            
            <h4>Created at: {{ $drive->created_at }}</h4>
            <h4>Last Edited at: {{ $drive->updated_at }}</h4>

            <a class="btn btn-primary btn-md" href="{{ route('drive.edit', $drive->id) }}">Edit</a>
            <form class="d-inline-block" method="post" action="{{ route('drive.destroy', $drive->id) }}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-md">Delete</button>
            </form>
        @else
            <h1>Sorry, this Drive doesn't exist anymore.</h1>
        @endif    
    </div>

@endsection
