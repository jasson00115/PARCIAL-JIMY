<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Roboto" !important;
        }
    </style>

    <title>Inicio Sesion</title>
</head>

<body>

    <div class="container">
        <form action="<?php echo base_url(); ?>index.php/vistaprin" class="mt-4" method="POST">
            <h2>Registro</h2>
            </br>
            <div id="output2">
                <p>BIENVENIDO AL SISTEMA DE USUARIOS</p>

                <p>Eres el elegido!!!</p>
            </div>

            <div class="clearfix">
                <button type="submit" class="btn btn-primary">
                    <ion-icon name="close"></ion-icon>Cerrar Sesion
                </button>
            </div>
        </form>
    </div>

    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>

</html>