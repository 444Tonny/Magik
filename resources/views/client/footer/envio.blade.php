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
        <h5>Política de envío</h3>

        <div class='column-politica'>
            <span class="text-politica">
                La política de privacidad es una declaración que divulga una parte o la totalidad de las
                prácticas de recopilación, uso, divulgación y gestión de datos de los usuarios y clientes 
                de un sitio web. Cumple con el requisito legal de proteger la privacidad de un usuario o cliente. 
                Cada país se rige por sus propias leyes, con diferentes requisitos en cada jurisdicción respecto 
                al uso de políticas 
                de privacidad. Asegúrate de cumplir con la legislación aplicable a tus actividades y ubicación.
            </span>
            <span class="text-politica">
                En général, ¿qué debe incluir una política de privacidad?<br>
                1. ¿Qué tipo de información recopilas?<br>
                2. ¿Cómo recopilas la información?<br>
                3. ¿Por qué recopilas esa información personal?<br>
                4. ¿Cómo almacenas, utilizas, compartes y divulgas la información personal de los visitantes de tu sitio web?<br>
                5. ¿Qué comunicación tienes con los visitantes de tu sitio web (en caso de tenerla)?<br>
                6. ¿Tu servicio se dirige a menores y recopila información sobre ellos?<br>
                7. Actualizaciones de la política de privacidad<br>
                8. Información de contacto<br>

                Puedes consultar este artículo del Centro de Ayuda para recibir más información sobre cómo elaborar una política de privacidad.
            </span>
        </div>
        
        <span class="text-politica important">
            En Magik Tienda, nos esforzamos por brindarte la mejor experiencia de compra en 
            línea. Sin embargo, ten en cuenta que pueden haber interrupciones en el servicio
            debido a factores externos, como problemas climáticos o situaciones de fuerza mayor.
            Si esto sucede, te informaremos lo antes posible y 
            haremos todo lo posible para resolver el problema de la manera más eficiente posible.
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
