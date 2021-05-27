@extends('app')

@section('content')

    <h1 style="margin-bottom: 40px">Statistics</h1>
    <div class="neu-form" style="margin-bottom: 50px">
        <h2>Taxis by Kilometers Driven</h2>
        <div class="graph-container">
            {!! $tkc->container() !!}
            {!! $tkc->script() !!}
        </div>
    </div>
    <div class="neu-form" style="margin-bottom: 50px">
        <h2>Drivers by Money from Fares</h2>
        <div class="graph-container">
            {!! $dfc->container() !!}
            {!! $dfc->script() !!}
        </div>
    </div>
    <div class="neu-form" style="margin-bottom: 50px">
        <h2>Drivers by Hours Worked</h2>
        <div class="graph-container">
            {!! $dhc->container() !!}
            {!! $dhc->script() !!}
        </div>
    </div>
    <div class="neu-form" style="margin-bottom: 20px">
        <h2>Shifts by Number of Drives</h2>
        <div class="graph-container">
            {!! $sdc->container() !!}
            {!! $sdc->script() !!}
        </div>
    </div>

@endsection
