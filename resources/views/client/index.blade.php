<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/client/home.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/client/button.css') }}?v={{ time() }}">
    <title>Magik Tienda</title>
</head>

<body>
    @extends('client.layout')

    @section('content')

    <div class="welcome">
        <div class="welcome-text">
            <div class="wt-container">
                <span class='wt1'>CANJEA TUS <br> MONEDAS</span>
                <span class='wt2'>Y consigue todo tipo de premios</span>
                <div class="wt-buttons">
                    <button class="magik_btn medium_btn white_btn">
                        <a href='premios' class='scroll-link'>Premios</a>
                    </button>
                    <button class="magik_btn medium_btn outline_btn" style='margin-left:8px;'>
                        <a href='como' class='scroll-link'>Cómo conseguir puntos</a>
                    </button>
                </div>
            </div>
        </div>
        <div class="welcome-coin">
            <img src="{{ asset('img/coin.png') }}" alt="puntos_magik">
        </div>
    </div>

    <div class="premios section" id="premios">
        <h2>PREMIOS TOP</h2>
        <div class="full-width row justify-center">
            <div class="product_prem little clickable" data-id="{{ $allProducts['Consolas'][0]->id_product }}">
                <span class="img_prem">
                    <span class="stock_prem">{{ $allProducts['Consolas'][0]->stock }} en stock</span>
                    <img src="{{ asset($allProducts['Consolas'][0]->image_large) }}" alt="">
                </span>
                <span class="name_prem">{{ $allProducts['Consolas'][0]->name_product }}</span>
                <span class="points_prem">{{ number_format($allProducts['Consolas'][0]->price, 0, ',', '.') }} Puntos</span>
            </div>

            <div class="product_prem clickable" data-id="{{ $allProducts['Experiencias'][0]->id_product }}">
                <span class="img_prem">
                    <span class="stock_prem">{{ $allProducts['Experiencias'][0]->stock }} en stock</span>
                    <img src="{{ asset($allProducts['Experiencias'][0]->image_large) }}" alt="">
                </span>
                <span class="name_prem">{{ $allProducts['Experiencias'][0]->name_product }}</span>
                <span class="points_prem">{{ number_format($allProducts['Experiencias'][0]->price, 0, ',', '.') }} Puntos</span>
            </div>

            <div class="product_prem little clickable" data-id="{{ $allProducts['PC Gaming'][0]->id_product }}">
                <span class="img_prem">
                    <span class="stock_prem">{{ $allProducts['PC Gaming'][0]->stock }} en stock</span>
                    <img src="{{ asset($allProducts['PC Gaming'][0]->image_large) }}" alt="">
                </span>
                <span class="name_prem">{{ $allProducts['PC Gaming'][0]->name_product }}</span>
                <span class="points_prem">{{ number_format($allProducts['PC Gaming'][0]->price, 0, ',', '.') }} Puntos</span>
            </div>
        </div>
    </div>

    <div class="products section">
        <h2>PRODUCTS</h2>

        <!-- Consolas -->
        <div class="products_category first_category" id="consolas">
            <span class="category_name"><b>#</b>Consolas</span>
            <span class="category_line"></span>
            <span class="category_icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30"
                    viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                    <path
                        d="M192 64C86 64 0 150 0 256S86 448 192 448H448c106 0 192-86 192-192s-86-192-192-192H192zM496 168a40 40 0 1 1 0 80 40 40 0 1 1 0-80zM392 304a40 40 0 1 1 80 0 40 40 0 1 1 -80 0zM168 200c0-13.3 10.7-24 24-24s24 10.7 24 24v32h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H216v32c0 13.3-10.7 24-24 24s-24-10.7-24-24V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h32V200z" />
                </svg>
            </span>
        </div>

        <div class="products_list">
            @foreach($allProducts['Consolas'] as $product)
            <div class="single_product clickable" data-id="{{ $product->id_product }}">
                <div class="product_left">
                    <span class="name_list">{{ $product->name_product }}</span>
                    <span class="stock_list">{{ $product->stock }} en stock</span>
                    <span class="points_list">{{ number_format($product->price, 0, ',', '.') }} Puntos</span>
                </div>
                <div class="product_right" style="background-image: url('{{ $product->image_large }}')">
                    <img src="" alt="">
                </div>
            </div>
            @endforeach
        </div>

        <!-- Accesorios -->
        <div class="products_category" id="accesorios">
            <span class="category_name"><b>#</b>Accesorios</span>
            <span class="category_line"></span>
            <span class="category_icon">
            <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M256 48C141.1 48 48 141.1 48 256v40c0 13.3-10.7 24-24 24s-24-10.7-24-24V256C0 114.6 114.6 0 256 0S512 114.6 512 256V400.1c0 48.6-39.4 88-88.1 88L313.6 488c-8.3 14.3-23.8 24-41.6 24H240c-26.5 0-48-21.5-48-48s21.5-48 48-48h32c17.8 0 33.3 9.7 41.6 24l110.4 .1c22.1 0 40-17.9 40-40V256c0-114.9-93.1-208-208-208zM144 208h16c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H144c-35.3 0-64-28.7-64-64V272c0-35.3 28.7-64 64-64zm224 0c35.3 0 64 28.7 64 64v48c0 35.3-28.7 64-64 64H352c-17.7 0-32-14.3-32-32V240c0-17.7 14.3-32 32-32h16z"/></svg>
            </span>
        </div>

        <div class="products_list">
            @foreach($allProducts['Accesorios'] as $product)
            <div class="single_product clickable" data-id="{{ $product->id_product }}">
                <div class="product_left">
                    <span class="name_list">{{ $product->name_product }}</span>
                    <span class="stock_list">{{ $product->stock }} en stock</span>
                    <span class="points_list">{{ number_format($product->price, 0, ',', '.') }} Puntos</span>
                </div>
                <div class="product_right" style="background-image: url('{{ $product->image_large }}')">
                    <img src="" alt="">
                </div>
            </div>
            @endforeach
        </div>

        <!-- PC Gaming -->
        <div class="products_category" id="pc-gaming">
            <span class="category_name"><b>#</b>PC Gaming</span>
            <span class="category_line"></span>
            <span class="category_icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M384 96V320H64L64 96H384zM64 32C28.7 32 0 60.7 0 96V320c0 35.3 28.7 64 64 64H181.3l-10.7 32H96c-17.7 0-32 14.3-32 32s14.3 32 32 32H352c17.7 0 32-14.3 32-32s-14.3-32-32-32H277.3l-10.7-32H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm464 0c-26.5 0-48 21.5-48 48V432c0 26.5 21.5 48 48 48h64c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H528zm16 64h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H544c-8.8 0-16-7.2-16-16s7.2-16 16-16zm-16 80c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H544c-8.8 0-16-7.2-16-16zm32 160a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
            </span>
        </div>

        <div class="products_list">
            @foreach($allProducts['PC Gaming'] as $product)
            <div class="single_product clickable" data-id="{{ $product->id_product }}">
                <div class="product_left">
                    <span class="name_list">{{ $product->name_product }}</span>
                    <span class="stock_list">{{ $product->stock }} en stock</span>
                    <span class="points_list">{{ number_format($product->price, 0, ',', '.') }} Puntos</span>
                </div>
                <div class="product_right" style="background-image: url('{{ $product->image_large }}')">
                    <img src="" alt="">
                </div>
            </div>
            @endforeach
        </div>

        <!-- Silla Gaming -->
        <div class="products_category" id="sillas-gaming">
            <span class="category_name"><b>#</b>Sillas Gaming</span>
            <span class="category_line"></span>
            <span class="category_icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30"
                    viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                    <path
                        d="M192 64C86 64 0 150 0 256S86 448 192 448H448c106 0 192-86 192-192s-86-192-192-192H192zM496 168a40 40 0 1 1 0 80 40 40 0 1 1 0-80zM392 304a40 40 0 1 1 80 0 40 40 0 1 1 -80 0zM168 200c0-13.3 10.7-24 24-24s24 10.7 24 24v32h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H216v32c0 13.3-10.7 24-24 24s-24-10.7-24-24V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h32V200z" />
                </svg>
            </span>
        </div>

        <div class="products_list">
            @foreach($allProducts['Sillas Gaming'] as $product)
            <div class="single_product clickable" data-id="{{ $product->id_product }}">
                <div class="product_left">
                    <span class="name_list">{{ $product->name_product }}</span>
                    <span class="stock_list">{{ $product->stock }} en stock</span>
                    <span class="points_list">{{ number_format($product->price, 0, ',', '.') }} Puntos</span>
                </div>
                <div class="product_right" style="background-image: url('{{ $product->image_large }}')">
                    <img src="" alt="">
                </div>
            </div>
            @endforeach
        </div>

        <!-- Experiencas -->
        <div class="products_category" id="experiencas">
            <span class="category_name"><b>#</b>Experencias</span>
            <span class="category_line"></span>
            <span class="category_icon">
            <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg>
            </span>
        </div>

        <div class="products_list">
            @foreach($allProducts['Experiencias'] as $product)
            <div class="single_product clickable" data-id="{{ $product->id_product }}">
                <div class="product_left">
                    <span class="name_list">{{ $product->name_product }}</span>
                    <span class="stock_list">{{ $product->stock }} en stock</span>
                    <span class="points_list">{{ number_format($product->price, 0, ',', '.') }} Puntos</span>
                </div>
                <div class="product_right" style="background-image: url('{{ $product->image_large }}')">
                    <img src="" alt="">
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="juega section">
        <h2>JUEGA Y GANA</h2>
        <p>Gana monedas gratis al jugar y consigue premios</p>
        <img src="{{ asset('img/coin.png') }}" alt="magik_coins" class="juega_coin">
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
                        window.location.href = window.location.origin + '/FortniteShop/www.magiktienda.com/public/#' + targetId;
                    }
                });
            });
        });

    </script>


    @endsection
</body>

</html>
