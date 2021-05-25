@extends('app')

@section('content')

    <div class="controls">
        <h1>Shifts</h1>
        {{ $shifts->links() }}
        <a class="neu-button" href="{{ route('shift.create') }}">Create new Shift</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Shift ID</th>
            <th scope="col">Driver</th>
            <th scope="col">Taxi</th>
            <th scope="col">Start</th>
            <th scope="col">End</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($shifts as $shift)
            <tr>
                <th scope="row">{{ $shift->id }}</th>
                @if($shift->id_driver !== null)
                    <td scope="row">{{ $shift->driver->first_name }} {{ $shift->driver->last_name }} ({{ $shift->driver->phone }})</td>
                @else
                <td scope="row">Driver Deleted</td>
                @endif
                @if($shift->id_taxi !== null)
                    <td scope="row">{{ $shift->taxi->model }} ({{ $shift->taxi->reg_plate }})</td>
                @else
                <td scope="row">Taxi Deleted</td>
                @endif
                <td scope="row">{{ $shift->start }}</td>
                <td scope="row">{{ $shift->end }}</td>
                <td>
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('shift.edit', $shift->id) }}">Edit</a>
                    <form class="d-inline-block" method="post" action="{{ route('shift.destroy', $shift->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                    <a class="btn btn-sm btn-outline-dark" href="{{ route('shift.show', $shift->id) }}">Detail</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <div class="controls">
        {{ $shifts->links() }}
        <a class="neu-button" href="{{ route('driver.create') }}">Create new Shift</a>
    </div>

@endsection
