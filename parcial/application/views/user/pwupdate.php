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

    <title>Recovery</title>
</head>

<body>

    <div class="container">
        <h1 class="mt-5">Cambio de Contraseña</h1>
        <form action="<?php echo base_url(); ?>index.php/actua" class="mt-4" method="POST">
            <div class="row vh-80 justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Ingresa tu Correo Electronico*</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="nombre@ejemplo.com" required>
                        <div class="invalid-feedback">
                            Ingresa una direccion de correo electronica valida
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="contrasenia" class="form-label">Ingresa la nueva Contraseña*</label>
                        <input type="password" class="form-control" name="contrasenia" id="contrasenia" placeholder="******" required>
                    </div>

                    <div class="mb-3">
                        <label for="confirmacion" class="form-label">Vuelve a Ingresar la Contraseña*</label>
                        <input type="password" class="form-control" name="confirmacion" id="confirmacion" placeholder="******" required>
                    </div>

                    <div class="clearfix">
                        <button type="submit" class="btn btn-primary">
                            <ion-icon name=""></ion-icon>CAMBIAR CONTRASEÑA
                        </button>
                    </div>

                </div>
        </form>
    </div>

    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>

</html>