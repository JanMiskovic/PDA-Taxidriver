@extends('app')

@section('content')

    <div class="neu-form">
        @if($shift->exists)
            <h1>Editing Shift {{ $shift->id }}</h1>
        @else
            <h1>Creating a new Shift</h1>
        @endif    
        <form method="post" action="{{ $shift->exists ? route('shift.update', $shift->id) : route('shift.store') }}">
            @csrf
            @if($shift->exists)
                @method('PATCH')
            @endif
            <label for="id_driver" class="form-label">Driver</label>
            <select class="form-select" name="id_driver" id="id_driver" required>
                        @unless($shift->exists)
                            <option selected></option>
                        @endunless
                        @foreach($drivers as $driver)
                            <option value="{{ $driver->id }}"{{ $driver->id === old('id_driver', $shift->driver->id ?? '') ? ' selected' : '' }}>
                                {{ $driver->first_name }} {{ $driver->last_name }} ({{ $driver->phone }})
                            </option>
                        @endforeach
            </select>            
            
            <label for="id_taxi" class="form-label">Taxi</label>
            <select class="form-select" id="id_taxi" name="id_taxi" required>
                        @unless($shift->exists)
                            <option selected></option>
                        @endunless
                        @foreach($taxis as $taxi)
                            <option value="{{ $taxi->id }}"{{ $taxi->id === old('id_taxi', $shift->taxi->id ?? '') ? ' selected' : '' }}>
                                {{ $taxi->model }} ({{ $taxi->reg_plate }})
                            </option>
                        @endforeach
            </select>

            <label for="start" class="form-label">Start</label>
            <input value="{{ date('Y-m-d\TH:i', strtotime(old('start', $shift->start))) }}" type="datetime-local" name="start" class="form-control" id="start" required>
            
            <label for="end" class="form-label">End</label>
            <input value="{{ date('Y-m-d\TH:i', strtotime(old('end', $shift->end))) }}" type="datetime-local" name="end" class="form-control" id="end" required>
            
            <button class="neu-button submit-button" type="submit">Submit</button>
        </form>
    </div>

@endsection
