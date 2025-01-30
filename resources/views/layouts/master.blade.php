<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layouts.styles')
    <title>@yield('titulo')</title>
</head>

<body>
    <x:navbar />

    <div class="container">
        @yield('contenido')

        <x:footer />
    </div>

    <x-notify::notify />
    
    @include('layouts.scripts')
</body>

</html>
