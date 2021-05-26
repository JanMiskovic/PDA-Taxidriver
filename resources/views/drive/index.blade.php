@extends('app')

@section('content')

    <div class="controls">
        <h1>Drives</h1>
        {{ $drives->links() }}
        <a class="neu-button" href="{{ route('drive.create') }}">Create new Drive</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Drive ID</th>
            <th scope="col">Driver</th>
            <th scope="col">Taxi</th>
            <th scope="col">Distance</th>
            <th scope="col">Fare</th>
            <th scope="col">Start</th>
            <th scope="col">End</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($drives as $drive)
            <tr>
                <th scope="row">{{ $drive->id }}</th>
                @if($drive->id_shift !== null)
                    @if($drive->shift->driver !== null)
                        <td scope="row">{{ $drive->shift->driver->first_name }} {{ $drive->shift->driver->last_name }} ({{ $drive->shift->driver->phone }})</td>
                    @else
                        <td scope="row">Driver Deleted</td>
                    @endif
                    @if($drive->shift->taxi !== null)
                        <td scope="row">{{ $drive->shift->taxi->model }} ({{ $drive->shift->taxi->reg_plate }})</td>
                    @else
                        <td scope="row">Taxi Deleted</td>
                    @endif
                @else
                    <td scope="row">Shift Deleted</td>
                    <td scope="row">Shift Deleted</td>
                @endif
                    
                <td scope="row">{{ $drive->distance }} km</td>
                <td scope="row">{{ $drive->fare }} €</td>
                <td scope="row">{{ $drive->start }}</td>
                <td scope="row">{{ $drive->end }}</td>
                <td>
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('drive.edit', $drive->id) }}">Edit</a>
                    <form class="d-inline-block" method="post" action="{{ route('drive.destroy', $drive->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                    <a class="btn btn-sm btn-outline-dark" href="{{ route('drive.show', $drive->id) }}">Detail</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="controls-bottom">
        {{ $drives->links() }}
        <a class="neu-button" href="{{ route('drive.create') }}">Create new Drive</a>
    </div>

@endsection
