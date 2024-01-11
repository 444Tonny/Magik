<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Stocks - Magik Tienda</title>
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/stocks.css?v1') }}">
    <title>Stocks</title>
</head>
</head>
<body>
    <header></header>

    @extends('admin.layout')

    @section('content')

    <!-- (B) MAIN -->
    <main id="pgmain">
    <h2>STOCKS</h2>

    
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    @if(session('warning'))
    <div class="alert alert-warning" role="alert">
        {{ session('warning') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif
        
    <div id='stocks-container'>
        <form id="stockForm" action="{{ route('updateStocks') }}" method="POST">
            @csrf
            <button class='update' type='submit'>Update Stock</button>
            <div class='row'>
                @foreach($products as $product)
                    <div class='stockEditor'>
                        <img src="{{ asset($product->image_large) }}" alt="{{ $product->name_product }}" style="width: 70px; height: 70px;">
                        <h4>{{ $product->name_product }}</h4>

                        <div>
                            <button type='button' class='sign' onclick="updateStock({{ $product->id_product }}, -1);">-</button>
                            <input type="text" id="stockInput" name="stock[{{ $product->id_product}}]" value="{{ $product->stock }}">
                            <button type='button' class='sign' onclick="updateStock({{ $product->id_product }}, 1);">+</button>
                        </div>

                        <p class='actual'>Actual stock: {{ $product->stock }}</p>

                    </div>
                @endforeach
            </div>
        </form>
    </div>

    <script>
        function updateStock(productId, change) {
            var stockInput = document.querySelector('input[name="stock[' + productId + ']"]');
            var currentStock = parseInt(stockInput.value);

            // Vérifier que le stock ne devient pas négatif
            if (currentStock + change >= 0) {
                stockInput.value = currentStock + change;
            }
        }


        function submitForm() {
            document.getElementById('stockForm').submit();
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </main>

    @endsection

    <footer></footer>
</body>
</html>
