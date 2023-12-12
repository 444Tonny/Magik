<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Orders - Magik Tienda</title>
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/order.css?v1') }}">
    <title>Orders</title>
</head>
</head>
<body>
    <header></header>

    @extends('admin.layout')

    @section('content')

    <!-- (B) MAIN -->
    <main id="pgmain">
    <h2>ORDERS LIST</h2>

    
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
        
      <div class='order-container' style="overflow-x:auto;">
        <table>
            <tr>
                <th>No#</th>
                <th></th>
                <th>Product</th>
                <th>Color</th>
                <th>Status</th>
                <th>Order Date</th>
                <th>Customer</th>
                <th>Action</th>
            </tr>

            @foreach($orders as $order)
            <tr>
                <td>#{{ $order['id_orders'] }}</td>
                <td><img src="{{ asset($order->image_large) }}" alt="Image Produit 1" width='40' height='40'></td>
                <td>{{ $order['name_product'] }}</td>
                <td>{{ $order['color'] }}</td>
                <td><b class="{{ $order['status_order'] }}">{{ $order['status_order'] }}<b></td>
                <td> {{ date('Y-m-d', strtotime($order['date_orders'])) }} <br> {{ date('H:i', strtotime($order['date_orders'])) }} </td>
                <td>{{ $order['name_order'] }}</td>
                <td>
                    <button class="btn btn-primary edit-button"
                        data-toggle="modal"
                        data-target="#commandModal"
                        data-order-id="{{ $order['id_orders'] }}"
                        data-product-name="{{ $order['name_product'] }}"
                        data-product-color="{{ $order['color'] }}"
                        data-order-name="{{ $order['name_order'] }}"
                        data-order-email="{{ $order['email'] }}"
                        data-order-username="{{ $order['username_order'] }}"
                        data-order-address="{{ $order['address'] }}"
                        data-order-phone="{{ $order['phone'] }}">
                        View
                    </button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <!-- Modal -->

    <div class="modal fade fiche" id="commandModal" tabindex="-1" role="dialog" aria-labelledby="commandModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method='POST' action='{{ route("updateOrder") }}' id='editForm'>
                @csrf
                <input type="hidden" name="_method" value="POST" id="formMethod">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="commandModalLabel">Order Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    <p><strong>Product name :</strong> <span id="productName"></span></p>
                    <p><strong>Color :</strong> <span id="productColor"></span></p>

                        <p><strong>Status :</strong>
                            <select class="form-control select_status" name='status_order'>
                                @foreach(['Pending', 'Canceled', 'Confirmed'] as $status)
                                    <option value="{{ $status }}" {!! $order['status_order'] == $status ? 'selected' : '' !!}>{{ $status }}</option>
                                @endforeach
                            </select>
                        </p>

                        <!-- Informations du Commandeur -->
                        <h6>Customer Informations :</h6>
                        <div class="form-group">
                            <p><u>Name:</u> <span id="orderName"></span></p>
                        </div>
                        <div class="form-group">
                            <p><u>Email:</u> <span id="orderEmail"></span></p>
                        </div>
                        <div class="form-group">
                            <p><u>Discord:</u> <span id="orderUsername"></span></p>
                        </div>
                        <div class="form-group">
                            <p><u>Address:</u> <span id="orderAddress"></span></p>
                        </div>
                        <div class="form-group">
                            <p><u>Phone:</u> <span id="orderPhone"></span></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger delete_order">Delete</button>
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type='hidden' value="" name='edited_order' id='edited_order'>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.edit-button').click(function () {
                // Récupérer les données de la commande associée au bouton cliqué
                var productName = $(this).data('product-name');
                var productColor = $(this).data('product-color');
                var orderId = $(this).data('order-id');
                var orderName = $(this).data('order-name');
                var orderEmail = $(this).data('order-email');
                var orderUsername = $(this).data('order-username');
                var orderAddress = $(this).data('order-address');
                var orderPhone = $(this).data('order-phone');

                // Mettre à jour dynamiquement le contenu du modal
                $('#productName').text(productName);
                $('#productColor').text(productColor);
                $('#orderName').text(orderName);
                $('#orderEmail').text(orderEmail);
                $('#orderUsername').text(orderUsername);
                $('#orderAddress').text(orderAddress);
                $('#orderPhone').text(orderPhone);
                $('#edited_order').val(orderId);

                // Afficher le modal
                $('#commandModal').modal('show');
            });
        });

        $('.delete_order').click(function () {
            // Afficher une boîte de dialogue de confirmation
            var result = confirm("Are you sure you want to delete this order? It will be considered as 'Canceled' and the product will be returned to stock.");

            // Si l'utilisateur clique sur "OK" dans la boîte de dialogue de confirmation
            if (result) {
                // Mettez à jour la valeur de #formMethod et #edited_order pour la suppression
                $('#formMethod').val('POST');

                // Mettez à jour l'action du formulaire
                $('#editForm').attr('action', '{{ route("deleteOrder") }}');

                // Soumettre le formulaire
                $('#editForm').submit();
            }
            // Si l'utilisateur clique sur "Annuler", ne faites rien
        });
        
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </main>

    @endsection

    <footer></footer>
</body>
</html>
