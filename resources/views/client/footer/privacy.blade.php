<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/client/politica.css') }}">
    <title>Layout</title>
</head>
<body>
    @extends('client.layout')

    @section('content')

    <section class="content">
        <h5>Política de privacidad</h3>
        <span class="text-politica">
            Todos los reembolsos de puntos serán tramitados por un tiquet de discord. 
            Si tienes algún  problema o deseas cambiar tu premio ponte en contacto con un moderador.
        </span>
        <span class="text-politica important">
            Por favor ten en cuenta que algunos productos pueden tener restricciones de reembolso debido 
            a su naturaleza digital. En estos casos, te proporcionaremos toda la información necesaria antes 
            de realizar tu compra. Si tienes alguna pregunta sobre nuestra política de reembolso, por favor contáctanos.
        </span>
    </section>

    @endsection
</body>
</html>
