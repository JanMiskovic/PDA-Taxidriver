<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Monda:wght@400;700&family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/141db264a7.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <title>Taxidriver</title>
  </head>
  
  <body>

    <div class="sidebar">
        <a href="{{ url('/') }}" class="logo">TAXIDRIVER</a>
        <a href="{{ route('driver.index') }}" class="navlink {{ Request::is('driver*') ? 'active-nav' : '' }}">Drivers</a>
        <a href="{{ route('taxi.index') }}" class="navlink {{ Request::is('taxi*') ? 'active-nav' : '' }}">Taxis</a>
        <a href="{{ route('shift.index') }}" class="navlink {{ Request::is('shift*') ? 'active-nav' : '' }}">Shifts</a>
        <a href="{{ route('drive.index') }}" class="navlink {{ Request::is('drive') || Request::is('drive/*') ? 'active-nav' : '' }}">Drives</a>
        <a href="{{ route('stats.index') }}" class="navlink {{ Request::is('stats') ? 'active-nav' : '' }}" style="margin-top: auto">Statistics</a>
    </div>

    <div class="overlay"></div>

    <div id="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>

</html>