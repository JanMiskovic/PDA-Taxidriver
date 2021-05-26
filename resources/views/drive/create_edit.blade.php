@extends('app')

@section('content')

    <div class="neu-form">
        @if($drive->exists)
            <h1>Editing Drive {{ $drive->id }}</h1>
        @else
            <h1>Creating a new Drive</h1>
        @endif    
        <form method="post" action="{{ $drive->exists ? route('drive.update', $drive->id) : route('drive.store') }}">
            @csrf
            @if($drive->exists)
                @method('PATCH')
            @endif
            <label for="id_shift" class="form-label">Shift</label>
            <select id="id_shift" class="form-select" name="id_shift" id="id_shift" required>
                        @unless($drive->exists)
                            <option selected></option>
                        @endunless
                        @foreach($shifts as $shift)
                            <option value="{{ $shift->id }}"{{ $shift->id === old('id_shift', $drive->shift->id ?? '') ? ' selected' : '' }}>
                                {{ date('d. m. Y', strtotime($shift->start)) }} - 
                                @if(!empty($shift->driver))
                                    {{ $shift->driver->first_name }} {{ $shift->driver->last_name }} ({{ $shift->driver->phone }})
                                @else
                                    Driver Deleted
                                @endif
                            </option>
                        @endforeach
            </select>

            <label for="distance" class="form-label">Distance</label>
            <input value="{{ old('distance', $drive->distance) }}" type="number" step="0.01" name="distance" class="form-control" id="distance" required min="0" max="10000">
            
            <label for="fare" class="form-label">Fare</label>
            <input value="{{ old('fare', $drive->fare) }}" type="number" step="0.01" name="fare" class="form-control" id="fare" required min="0" max="100000">
            
            <label for="start" class="form-label">Start</label>
            <input value="{{ date('Y-m-d\TH:i', strtotime(old('start', $drive->start))) }}" type="datetime-local" name="start" class="form-control" id="start" required>
            
            <label for="end" class="form-label">End</label>
            <input value="{{ date('Y-m-d\TH:i', strtotime(old('end', $drive->end))) }}" type="datetime-local" name="end" class="form-control" id="end" required>
            
            <button class="neu-button submit-button" type="submit">Submit</button>
        </form>
    </div>

@endsection
