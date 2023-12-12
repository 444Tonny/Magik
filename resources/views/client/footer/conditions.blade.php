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

    <section class="content column-content">
        <h5>Términos y condiciones</h3>

        <div class='column-politica'>
            <span class="text-politica">
                En Magik Tienda, nos preocupamos por proteger tus derechos como comprador y nuestro negocio. 
                Por eso, te invitamos a leer nuestros Términos y Condiciones cuidadosamente antes de realizar una compra. 
                Al utilizar nuestro sitio web y realizar una compra, aceptas los términos y condiciones que aquí se
                 establecen.
            </span>
            <span class="text-politica">
                A continuación, te presentamos los principales puntos que debes conocer de nuestros Términos y Condiciones:<br>
                - Quiénes pueden utilizar nuestro sitio web y realizar compras.<br>
                - Cómo funciona la compra a través de puntos.<br>
                - Formas de pago aceptadas en nuestra tienda online.<br>
                - Política de envío y entrega de nuestros productos.<br>
                - Garantías y responsabilidades por los servicios y productos ofrecidos en nuestra tienda online.<br>
                - Propiedad intelectual, derechos de autor y marcas registradas.<br>
                - Derecho a suspender o cancelar una cuenta o membresía.<br>
                - Política de devoluciones y reembolsos.<br>
                - Limitación de responsabilidad.<br>

                Para obtener más información sobre nuestros Términos y Condiciones, te invitamos a visitar nuestra sección de ayuda o a ponerte en contacto con nosotros a través de nuestro formulario de contacto.
            </span>
        </div>

        <span class="text-politica important">
            Es importante que tengas en cuenta que estos términos y condiciones están sujetos a cambios y 
            modificaciones en cualquier momento. Te recomendamos revisarlos periódicamente para estar informado sobre 
            cualquier actualización. Si tienes alguna duda o consulta, no dudes en contactarnos.
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
