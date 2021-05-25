@extends('app')

@section('content')

    <div class="neu-form">
        @if($driver->exists)
            <h1>Details of Driver <b>{{ $driver->first_name }} {{ $driver->last_name }}</b></h1>
            <h4>Database ID: <b>{{ $driver->id }}</b></h4>
            <h2>First Name: <b>{{ $driver->first_name }}</b></h2>
            <h2>Last Name: <b>{{ $driver->last_name }}</b></h2>
            <h2>Phone Number: <b>{{ $driver->phone }}</b></h2>
            <h2>Birth Date: <b>{{ $driver->birth_date }}</b></h2>
            <h4>Created at: {{ $driver->created_at }}</h4>
            <h4>Last Edited at: {{ $driver->updated_at }}</h4>

            <a class="btn btn-primary btn-md" href="{{ route('driver.edit', $driver->id) }}">Edit</a>
            <form class="d-inline-block" method="post" action="{{ route('driver.destroy', $driver->id) }}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-md">Delete</button>
            </form>
        @else
            <h1>Sorry, this Driver doesn't exist anymore.</h1>
        @endif    
    </div>

@endsection
