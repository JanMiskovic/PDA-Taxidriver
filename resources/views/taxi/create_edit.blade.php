@extends('app')

@section('content')

    <div class="neu-form">
        @if($taxi->exists)
            <h1>Editing Taxi {{ $taxi->reg_plate }}</h1>
        @else
            <h1>Creating a new Taxi</h1>
        @endif    
        <form method="post" action="{{ $taxi->exists ? route('taxi.update', $taxi->id) : route('taxi.store') }}">
            @csrf
            @if($taxi->exists)
                @method('PATCH')
            @endif
            <label for="model" class="form-label">Model</label>
            <input value="{{ old('model', $taxi->model) }}" type="text" name="model" class="form-control" id="model" required maxlength="50">
            <label for="color" class="form-label">Color</label>
            <input value="{{ old('color', $taxi->color) }}" type="text" name="color" class="form-control" id="color" maxlength="20">
            <label for="kilometers" class="form-label">Kilometers</label>
            <input value="{{ old('kilometers', $taxi->kilometers) }}" type="number" name="kilometers" class="form-control" id="kilometers" required max="1000000">
            <label for="reg_plate" class="form-label">Registration Plate</label>
            <input value="{{ old('reg_plate', $taxi->reg_plate) }}" type="text" name="reg_plate" class="form-control" id="reg_plate" required maxlength="20">
            <button class="neu-button submit-button" type="submit">Submit</button>
        </form>
    </div>

@endsection
