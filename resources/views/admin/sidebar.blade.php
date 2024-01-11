<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css?v1') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
</head>
<body>
    <!-- (A) SIDEBAR -->
    <div id="pgside">
      <!-- (A1) BRANDING OR USER -->
      <!-- LINK TO DASHBOARD OR LOGOUT -->
      <div id="pguser">
        <img class='logo_image' alt='Magik Tienda' width='180' src="{{ asset('img/logo.png') }}">
      </div>

      <!-- (A2) MENU ITEMS -->
      <a href="{{ route('codeGenerator') }}" id="menu-code">
        <i class="ico">&#9858;</i>
        <i class="txt">Codes</i>
      </a>
      
      <a href="{{ route('orders') }}" id="menu-orders">
      <svg style='margin-right: 8px; fill: white;' xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm64 0v64h64V96H64zm384 0H192v64H448V96zM64 224v64h64V224H64zm384 0H192v64H448V224zM64 352v64h64V352H64zm384 0H192v64H448V352z"/></svg>
        <i class="txt">Orders</i>
      </a>

      <a href="{{ route('stocks') }}" id="menu-stocks">
      <svg style='margin-right: 8px; fill: white;' xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm64 0v64h64V96H64zm384 0H192v64H448V96zM64 224v64h64V224H64zm384 0H192v64H448V224zM64 352v64h64V352H64zm384 0H192v64H448V352z"/></svg>
        <i class="txt">Stocks</i>
      </a>

      <a href="{{ route('adminCredentials') }}" id="menu-credentials">
        <i class="ico">&#9432;</i>
        <i class="txt">Credentials</i>
      </a>
      
      <a class='logout' href="{{ route('logout') }}" id="menu-logout">
      <svg style='margin-right: 8px; fill: white;' xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
        <i class="txt">Logout</i>
      </a>

    </div>

    <script>
      $(document).ready(function() {
        // Sélectionnez tous les liens du menu par leur ID
        const menuItems = {
          "menu-code": "{{ route('codeGenerator') }}",  
          "menu-orders": "{{ route('orders') }}",  
          "menu-stocks": "{{ route('stocks') }}",  
          "menu-credentials": "{{ route('adminCredentials') }}",  
          "menu-logout": "{{ route('logout') }}"
        };

        // Obtenez l'URL actuelle
        const currentUrl = window.location.href;

        // Parcourez les liens du menu et ajoutez la classe "current" à l'élément actif
        for (const menuItem in menuItems) {
            if (menuItems.hasOwnProperty(menuItem) && currentUrl === menuItems[menuItem]) {
                $(`#${menuItem}`).addClass('current');
            }
        }
      });
    </script>
</body>
</html>
