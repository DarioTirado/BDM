<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Bootstrap 5 404 page with image</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../ERRORES/estilo_error.css" />
    </head>

    <body>
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center row">
                <div class=" col-md-6">
                    
                    <img class="imgperr" src="../ZRECURSOS/IMG_DE_PROGRAMA/perrito.jpg" alt=""
                        class="img-fluid">
                </div>
                <div class=" col-md-6 mt-5">
                    <p class="fs-3"> <span class="text-danger">Opps!</span> ERROR DE AUTENTICACION.</p>
                    <p class="lead">
                        Se necesita iniciar sesion para ver este contenido.
                    </p>
                    <a href="../Login_and_Register/index.php" class="btn btn-primary">Go Home</a>
                </div>

            </div>
        </div>
    </body>