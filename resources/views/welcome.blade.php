@extends('app')

@section('content')

<div class="grid-wrapper">
  <a class="grid-item" href="{{ route('driver.index') }}">Drivers <i class="fas fa-user"></i></a>
  <a class="grid-item" href="{{ route('taxi.index') }}">Taxis <i class="fas fa-taxi"></i></a>
  <a class="grid-item" href="{{ route('shift.index') }}">Shifts <i class="fas fa-clock"></i></a>
  <a class="grid-item" href="{{ route('drive.index') }}">Drives <i class="fas fa-road"></i></a>
  <a class="grid-item stat" href="{{ route('stats.index') }}">Statistics <i class="fas fa-chart-area"></i></a>
</div>

@endsection