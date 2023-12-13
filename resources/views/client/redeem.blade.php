<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/client/home.css') }}?v=1">
    <link rel="stylesheet" href="{{ asset('css/client/button.css') }}?v=1">
    <link rel="stylesheet" href="{{ asset('css/client/redeem.css') }}?v=1">
    <link rel="stylesheet" href="{{ asset('css/client/modal.css') }}?v=1">
    <title>Magik Tienda</title>
</head>

<body>
    @extends('client.layout')

    @section('content')

    <div class="redeem">
        <form action="" method='POST'>
            @CSRF

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <span class="text_redeem">Inserta tu código aquí para reclamar tus puntos.</span>
            <input type="text" name='code' id="formattedInput" placeholder='Escribe aquí...' maxlength="10" />
            <input type="submit" value="Reclamar" class='reclamar'>
        </form>
    </div>
    
    <div class="faq section" id="como">
        <div class='faq-container'>
            <h2>Preguntas más frecuentes</h2>

            <div class="faq-content">
            <div class="faq-question">
                <input id="q1" type="checkbox" class="panel">
                <div class="plus">+</div>
                <label for="q1" class="panel-title">¿Cómo puedo comprar premios?</label>
                <div class="panel-content">Para poder comprar cualquier artículo de la tienda tienes que tener puntos en la cuenta. No es posible comprar mediante dinero real. 
                    Al jugar el mapa de Magik Boxfight's conseguirás monedas. Estas monedas podrán ser canjeadas en
                    Discord por un código que luego usarás en esta página en la sección de ''Canjea tus monedas''. Si tienes alguna duda ponte en contacto con nosotros en info@magiktienda.com
                </div>
            </div>
            
            <div class="faq-question">
                <input id="q2" type="checkbox" class="panel">
                <div class="plus">+</div>
                <label for="q2" class="panel-title">¿Cuándo llegan los pedidos?</label>
                <div class="panel-content">Nos esforzamos por conseguir una velocidad de envío lo más rápida posible. Es posible que el tiempo de envío cambie dependiendo de donde te encuentres. </div>
            </div>
            
            <div class="faq-question">
                <input id="q3" type="checkbox" class="panel">
                <div class="plus">+</div>
                <label for="q3" class="panel-title"> ¿Cuál es la forma más rápida de conseguir monedas? </label>
                <div class="panel-content">
                    Mientras que jugar al mapa es la forma más directa de conseguir monedas, ten en cuenta que utilizar Tik-Tok para conseguir 1000 monedas por cada 10.000 
                    visitas puede ayudarte a lograr tu objetivo de monedas 
                    mucho más rápido. Además, Magik pondrá códigos en sus vídeos para que puedas canjearlos por monedas, pero ten cuidado, solo los más rápidos podrán 
                    cajear esos códigos. Mucha suerte!
                </div>
            </div>

            <div class="faq-question">
                <input id="q4" type="checkbox" class="panel">
                <div class="plus">+</div>
                <label for="q4" class="panel-title">¿Dónde canjeo los puntos?</label>
                <div class="panel-content">
                    Las monedas que consigas en el mapa deberán ser canjeadas en Discord. Un moderador te atenderá para que puedas canjear la cantidad de monedas deseada. 
                </div>
            </div>
        </div>   
        
        <div class="discord">
            <p>Únete a Discord y canjea tus puntos</p>
            <button class='magik_btn white_btn'>
                <a target='_blank' href='https://discord.com/invite/qJH5e4wJWr'>DISCORD</a>
            </button>
        </div>

    </div>

    </div>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var clickableProducts = document.querySelectorAll('.clickable');

            clickableProducts.forEach(function(product) {
                product.addEventListener('click', function() {
                    var productId = this.getAttribute('data-id');

                    // Utilisez la route nommée pour construire le chemin relatif
                    var relativeURL = '{{ route("productDetail") }}' + '?id_product=' + productId;

                    // Redirigez vers le chemin relatif
                    window.location.href = relativeURL;
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            var scrollLinks = document.querySelectorAll('.scroll-link');

            scrollLinks.forEach(function (link) {
                link.addEventListener('click', function (e) {
                    e.preventDefault();

                    var targetId = this.getAttribute('href');
                    var targetElement = document.getElementById(targetId);

                    // Vérifier si l'élément cible existe
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 120, // Ajustez le décalage ici
                            behavior: 'smooth'
                        });
                    } else {
                        // Si l'élément cible n'est pas trouvé, ouvrir l'autre page
                        window.location.href = window.location.origin + '/#' + targetId;
                    }
                });
            });
        });

        function formatCode(input) {
            // Supprimer les espaces existants pour éviter les conflits
            input.value = input.value.replace(/\s/g, '');

            // Ajouter un espace après chaque groupe de 5 caractères
            input.value = input.value.replace(/(.{5})/g, '$1 ');

            // Supprimer un éventuel espace à la fin
            input.value = input.value.trim();

            // Forcer la première lettre à être en majuscule (lettre capitale)
            input.value = input.value.toUpperCase();
        }

    </script>


    @endsection
</body>

</html>
