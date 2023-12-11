
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Code generator</title>
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/code.css?v1') }}">
</head>
<body>
    <header></header>

    @extends('admin.layout')

    @section('content')

    <!-- (B) MAIN -->
    <main id="pgmain">
      <h2>CODE GENERATOR</h2>
      
         <!-- Formulaire -->
        <form id="codeGeneratorForm" method="POST" action="{{ route('generateCode') }}">
            @csrf

            <!-- Liste déroulante de choix de somme -->
            <label for="amountSelect">Number of points:</label>
            
            <select id="amountSelect" name="amount">
                <option value="1000">1.000 Puntos</option>
                <option value="5000">5.000 Puntos</option>
                <option value="10000">10.000 Puntos</option>
                <option value="25000">25.000 Puntos</option>
                <option value="50000">50.000 Puntos</option>
                <option value="100000">100.000 Puntos</option>
            </select>
            
            <button id="generateButton" type="button" class="mt-primary-admin">Generate</button>

            <!-- Champ texte pour afficher le code généré -->
            <label for="generatedCode">Generated Code :</label>
            <div class="row">
                <input id="generatedCode" type="text" class="form-control" value="{{ isset($generatedCode) ? $generatedCode : '' }}" oninput=formatCode(this) readonly>
                <button id="copyButton" type="button" class="btn btn-primary mb-3" disabled>COPY</button>
            </div>

        </form>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function () {

            // Appeler la fonction generateCode via Ajax
            $("#generateButton").click(function () {
                $.ajax({
                    type: "POST",
                    url: "/FortniteShop/www.magiktienda.com/public/magikadmin/code", // Remplacez cela par l'URL de votre route
                    data: {
                        amount: $("#amountSelect").val(),
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        var generatedCode = response.generatedCode;

                        // Faites quelque chose avec le code généré, par exemple, l'afficher sur la page
                        document.getElementById("generatedCode").value = generatedCode;
                        document.getElementById("copyButton").disabled = false;

                        alert("New code generated");
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            })
        });
    </script>

    <script>
        // Gestionnaire d'événement pour le bouton Copier
        $("#copyButton").click(function () {
        
            $("#generatedCode").select();
            document.execCommand("copy");

            alert("Code copied !");
        });

        function formatCode(input) {
            // Supprimer les espaces existants pour éviter les conflits
            input.value = input.value.replace(/\s/g, '');

            // Ajouter un espace après chaque groupe de 5 caractères
            input.value = input.value.replace(/(.{5})/g, '$1 ');

            // Supprimer un éventuel espace à la fin
            input.value = input.value.trim();
        }
    </script>

    @endsection

    <footer></footer>
</body>
</html>
