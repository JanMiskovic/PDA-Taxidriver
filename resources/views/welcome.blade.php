@extends('app')

@section('content')

<div class="grid-wrapper">
  <a href="{{ route('driver.index') }}"><div class="grid-item">Drivers</div></a>
  <a href="{{ route('taxi.index') }}"><div class="grid-item">Taxis</div></a>
  <a href="{{ route('shift.index') }}"><div class="grid-item">Shifts</div></a>
  <a href="{{ route('drive.index') }}"><div class="grid-item">Drives</div></a>
</div>

@endsection