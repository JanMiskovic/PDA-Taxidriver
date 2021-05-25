@extends('app')

@section('content')

    <div class="neu-form">
        @if($driver->exists)
            <h1>Editing Driver {{ $driver->first_name }} {{ $driver->last_name }}</h1>
        @else
            <h1>Creating a new Driver</h1>
        @endif    
        <form method="post" action="{{ $driver->exists ? route('driver.update', $driver->id) : route('driver.store') }}">
            @csrf
            @if($driver->exists)
                @method('PATCH')
            @endif
            <label for="first_name" class="form-label">First Name</label>
            <input value="{{ old('first_name', $driver->first_name) }}" type="text" name="first_name" class="form-control" id="first_name" required maxlength="45">
            <label for="last_name" class="form-label">Last Name</label>
            <input value="{{ old('last_name', $driver->last_name) }}" type="text" name="last_name" class="form-control" id="last_name" required maxlength="45">
            <label for="phone" class="form-label">Phone</label>
            <input value="{{ old('phone', $driver->phone) }}" type="text" name="phone" class="form-control" id="phone" required maxlength="15">
            <label for="birth_date" class="form-label">Birth Date</label>
            <input value="{{ old('birth_date', $driver->birth_date) }}" type="date" name="birth_date" class="form-control" id="birth_date" required>
            <button class="neu-button submit-button" type="submit">Submit</button>
        </form>
    </div>

@endsection
