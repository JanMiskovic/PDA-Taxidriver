<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Monda:wght@400;700&family=Montserrat&display=swap" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
    <title>Taxidriver</title>
  </head>
  
  <body>

    <div class="sidebar">
        <a href="{{ url('/') }}" class="logo">TAXIDRIVER</a>
        <a href="#news" class="navlink">Drivers</a>
        <a href="#news" class="navlink">Taxis</a>
        <a href="#news" class="navlink">Shifts</a>
        <a href="#news" class="navlink">Drives</a>
    </div>

    <div id="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>

</html>