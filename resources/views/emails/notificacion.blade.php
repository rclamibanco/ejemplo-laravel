<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejemplo de envío de correo</title>
</head>

<body>
    <h1 style="margin: 2rem 0;">Buen día, se ha registrado un nuevo auto.</h1>

    <ul style="list-style: none; margin: 2rem 0;">
        <li><b>Marca: </b>{{ $auto->marca->nombre }}</li>
        <li><b>Modelo: </b>{{ $auto->modelo }}</li>
        <li><b>Año: </b>{{ $auto->anio }}</li>
    </ul>
</body>

</html>
