@extends('app')

@section('content')

<div class="grid-wrapper">
  <a class="grid-item" href="{{ route('driver.index') }}">Drivers</a>
  <a class="grid-item" href="{{ route('taxi.index') }}">Taxis</a>
  <a class="grid-item" href="{{ route('shift.index') }}">Shifts</a>
  <a class="grid-item" href="{{ route('drive.index') }}">Drives</a>
  <a class="grid-item stat" href="{{ route('stats.index') }}">Statistics</a>
</div>

@endsection