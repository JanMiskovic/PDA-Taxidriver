@extends('app')

@section('content')

    <div class="controls">
        <h1>Drivers</h1>
        {{ $drivers->links() }}
        <a class="neu-button" href="{{ route('driver.create') }}">Create new Driver</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Driver ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Birth Date</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($drivers as $driver)
            <tr>
                <th scope="row">{{ $driver->id }}</th>
                <td scope="row">{{ $driver->first_name }}</td>
                <td scope="row">{{ $driver->last_name }}</td>
                <td scope="row">{{ $driver->phone }}</td>
                <td scope="row">{{ $driver->birth_date }}</td>

                <td>
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('driver.edit', $driver->id) }}">Edit</a>
                    <form class="d-inline-block" method="post" action="{{ route('driver.destroy', $driver->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                    <a class="btn btn-sm btn-outline-dark" href="{{ route('driver.show', $driver->id) }}">Detail</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <div class="controls">
        {{ $drivers->links() }}
        <a class="neu-button" href="{{ route('driver.create') }}">Create new Driver</a>
    </div>

@endsection
