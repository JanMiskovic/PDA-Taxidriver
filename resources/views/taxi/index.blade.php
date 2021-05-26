@extends('app')

@section('content')

    <div class="controls">
        <h1>Taxis</h1>
        {{ $taxis->links() }}
        <a class="neu-button" href="{{ route('taxi.create') }}">Create new Taxi</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Taxi ID</th>
            <th scope="col">Model</th>
            <th scope="col">Color</th>
            <th scope="col">Kilometers</th>
            <th scope="col">Registration Plate</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($taxis as $taxi)
            <tr>
                <th scope="row">{{ $taxi->id }}</th>
                <td scope="row">{{ $taxi->model }}</td>
                <td scope="row">{{ $taxi->color }}</td>
                <td scope="row">{{ $taxi->kilometers }}</td>
                <td scope="row">{{ $taxi->reg_plate }}</td>

                <td>
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('taxi.edit', $taxi->id) }}">Edit</a>
                    <form class="d-inline-block" method="post" action="{{ route('taxi.destroy', $taxi->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                    <a class="btn btn-sm btn-outline-dark" href="{{ route('taxi.show', $taxi->id) }}">Detail</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <div class="controls-bottom">
        {{ $taxis->links() }}
        <a class="neu-button" href="{{ route('taxi.create') }}">Create new Taxi</a>
    </div>

@endsection
