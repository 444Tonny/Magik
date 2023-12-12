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
        <h5>Política de reembolso</h3>
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

    <div class="orders" id="orders">
            <div class="orders-content">
                <div class="order-line border-bottom">
                    <div>Mis pedidos</div>
                </div>
                <!-- Example order lines -->
                @if(session('google_id'))
                    @foreach($currentOrders as $order)
                        <div class="order-line">
                            <img src="{{ asset($order->image_large) }}" width='60' height='60' alt="Product Image">
                            <div class="order-details">
                                <div class="order_name" style='width:55%'>{{ $order->name_product }}</div>
                                <div class="order_color" style='width:14%'>{{ $order->color }}</div>
                                <div class="order_status" style='width:23%'><b class='{{ $order->status_order }}'>{{ $order->status_order }}</b></div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p style='text-align:center;'>No tienes pedidos.</p>
                @endif
                <div class="order-line border-bottom" >
                </div>
                <!-- End of example order lines -->
                <button class="close-btn" onclick="closeOrders()">Close</button>
            </div>
        </div>
        <div class="orders-bg" id="orders-bg"></div>

        <script>
            // Commandes
            function openOrders() {
                document.getElementById('orders').style.display = 'block';
                document.getElementById('orders-bg').style.display = 'block';
            }

            function closeOrders() {
                document.getElementById('orders').style.display = 'none';
                document.getElementById('orders-bg').style.display = 'none';
            }
        </script>
</body>
</html>
