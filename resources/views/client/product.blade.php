<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/client/home.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/client/product.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/client/button.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/client/modal.css') }}?v={{ time() }}">
    <title>Magik Tienda</title>
</head>

<body>
    @extends('client.layout')

    @section('content')

    <div class="product section">
        <form action="{{ route('orderProduct') }}" method="POST">

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

            <div class="product_row">

                <div class="bloc1">
                    <img src="{{ asset($product->image_large) }}" alt="">
                </div>
            
                <div class="bloc2">
                    <h1>{{ $product->name_product }}</h1>
                    <span class="product_line"></span>
                    <p class="product_description">{{ $product->description }}</p>
                    @if($colors)
                        <div class="color-selector">
                            <label for="colorSelect" class="color-label">Color :</label>

                            @foreach($colors as $key => $color)
                                <div class="color-circle {{ $key === 0 ? 'active' : '' }}" style='background-color:{{ $color->hex }}'  onclick="setColor(this, '{{ $color->name_color }}')"></div>
                            @endforeach
                        </div>
                    @endif
                    <input id='selectedColor' type='hidden' name='color' value='{{ isset($colors[0]) ? $colors[0]->name_color : "N/A" }}'>
                </div>
            </div> 

            <div class="product_resume">
                <img src="{{ asset($product->image_large) }}" width='45' height='45' alt="">
                <div class="info">
                    <h5>{{ $product->name_product }}</h5>
                    <p class="stock">{{ $product->stock }} en stock</p>
                </div>
                <span class="puntos">{{ number_format($product->price, 0, ',', '.') }} puntos</span>
                <button onclick=openModal() class="canjear">Canjear</button>
            </div>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    @csrf
                    <label for="name_order">Nombre completo:</label>
                    <input type="text" name="name_order" required>

                    <label for="username_order">Discord:</label>
                    <input type="text" name="username_order" >

                    <label for="address">Dirección de entrega:</label>
                    <input type="text" name="address" required>

                    <label for="phone">Teléfono:</label>
                    <input type="text" name="phone" required>

                    <label for="email">Correo electrónico:</label>
                    <input type="email" name="email" value='{{ session("google_email") ?? "" }}' required>

                    <input id='id_product' type='hidden' name='id_product' value='{{ $product->id_product }}'>

                    <div class='modal-buttons'>
                        <button class='cancelar' onclick=closeModal()>Cancel</button>
                        <button type="submit buy">Enviar</button>
                    </div>
                </div>
            </div>
        </form>
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
        function setColor(element, color) {

            const circles = document.querySelectorAll('.color-circle');
            circles.forEach(circle => {
                circle.classList.remove('active');
            });

            element.classList.add('active');

            let colorSelected = document.getElementById('selectedColor'); 
            colorSelected.value = color;
        }

        // Fonction pour ouvrir le modal
        function openModal() {
            var modal = document.getElementById('myModal');
            modal.style.display = 'flex';
            modal.classList.add('fadeIn'); // Ajoutez une classe d'animation si nécessaire
        }

        // Fonction pour fermer le modal
        function closeModal() {
            var modal = document.getElementById('myModal');
            modal.style.display = 'none';
        }
    </script>
    

    @endsection
</body>

</html>
