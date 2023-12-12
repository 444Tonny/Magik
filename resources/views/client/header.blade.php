<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{ asset('css/client/layout.css?v1') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&family=Sora:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>MAGIK</title>
</head>
<body>
    <header>
        <div class="logo">
            <div class='logo_container' onclick="window.location.href=window.location.origin + '/'">
                <img class='logo_image' alt='Magik Tienda' width='80' src="{{ asset('img/logo.png') }}">
                <h1 class='logo_text'>MAGIK TIENDA</h1>
            </div>

            <button id='hamburger' class="menubtn hamburger">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
            </button>
        </div>

        <div id='menu' class="menu">
            <div class="dropdown">
                <button class="dropbtn menubtn">Productos</button>
                <div class="dropdown-content">
                    <a class="scroll-link" href="consolas">Consolas</a>
                    <a class="scroll-link" href="accesorios">Accesorios</a>
                    <a class="scroll-link" href="pc-gaming">PC Gaming</a>
                    <a class="scroll-link" href="sillas-gaming">Sillas Gaming</a>
                    <a class="scroll-link" href="experiencas">Experiencas</a>
                </div>
            </div> 

            <div class="single">
                <button class="menubtn">
                    <a href='reclamar'>Reclamar</a>
                </button>
            </div>

            <div class="single">
                <button class="menubtn">
                    <a target='_blank' href='https://discord.com/invite/qJH5e4wJWr'>Discord</a>
                </button>
            </div>

            <div class="dropdown">
                <button class="dropbtn menubtn">
                    <span>Entar</span>
                    @if(session()->has('givenName'))
                    <img src="{{ session('avatar') }}" width='40' height='40' alt="">
                    @else
                    <img src="{{ asset('img/empty.jpg') }}" width='40' height='40' alt="">
                    @endif
                </button>
                <div class="dropdown-content profile_info" style='height:160px !important;'>
                    @CSRF
                    @if(session()->has('givenName'))
                        <form method="GET" action="{{ url('auth/logout') }}">
                            <b class='google_username'>{{ session('givenName') }} </b> 
                            <b class='google_puntos'> {{ number_format(session('points'), 0, ',', '.') }} Puntos</b>
                            <button onclick=openOrders() class='myorder' type="button" style='height: 40px !important'>
                            <svg xmlns="http://www.w3.org/2000/svg" height="13" width="14.5" style='fill:#a027ec; margin-right: 7px;' viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                                Mis pedidos
                            </button>
                            <button class='gmailbtn' type="submit">Logout</button>
                        </form>
                    @else
                        <form method="GET" action="{{ url('auth/google') }}" style='padding-top: 22px !important;'>
                            <b class='google_puntos' style='font-size:14px;'>0 Puntos</b>
                            
                            <button onclick=openOrders() class='myorder' type="button" style='height: 40px !important'>
                            <svg xmlns="http://www.w3.org/2000/svg" height="13" width="14.5" style='fill:#a027ec; margin-right: 7px;' viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                                Mis pedidos
                            </button>

                            <button class='gmailbtn' type="submit" style='height: 40px !important'>
                                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="13.5" style='fill:white; margin-right: 7px;' viewBox="0 0 488 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg> 
                                Entrar con Google
                            </button>
                        </form>
                    @endif
                </div>
            </div> 
        </div>
    </header>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var hamburgerButton = document.getElementById("hamburger");
            var menu = document.getElementById("menu");

            hamburgerButton.addEventListener("click", function() {
               menu.style.display = (menu.style.display === "none" || menu.style.display === "") ? "flex" : "none";
            });

            document.addEventListener("click", function(e) {
                // Masquez le menu si l'élément cliqué n'est pas le bouton hamburger et n'est pas à l'intérieur du menu
                if (!menu.contains(e.target) && e.target !== hamburgerButton) {
                    //menu.style.display = "none";
                }
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
    </script>

</body>
</html>