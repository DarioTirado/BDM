<?php
include("CONEXION.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica que el formulario se haya enviado por POST
    if (isset($_POST["id"])) {
        // Accede al valor del ID del producto
        $id = $_POST['id'];
    
 //   echo "El ID del producto seleccionado es: " . $id;
} else {
    echo "El campo 'id' no se encontró en el formulario.";
}
} else {
echo "La solicitud no fue realizada por el método POST.";
}




    $query = "SELECT NOMBRE, DESCRIPCION, PRECIO, VALORACION, CANTIDAD,FK_CATEGORIA, VIDEO FROM productos WHERE ID_PRODUCTO = '$id'";
    $result = mysqli_query($conn, $query);
    while($mostrar=mysqli_fetch_array($result)){
        $nombre = $mostrar['NOMBRE'];
        $descripcion = $mostrar['DESCRIPCION'];
        $precio = $mostrar['PRECIO'];
        $valoracion = $mostrar['VALORACION'];
        $cantidad = $mostrar['CANTIDAD'];
        $categoria = $mostrar['FK_CATEGORIA'];
        $video = $mostrar['VIDEO'];
      }


      $query2 = "SELECT NOMBRE FROM categoria WHERE ID_CATEGORIA = '$categoria'";
      $result2 = mysqli_query($conn, $query2);
      while($mostrar=mysqli_fetch_array($result2)){
          $nombrecat = $mostrar['NOMBRE'];
          
        }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Info Producto </title>
    <link rel="stylesheet" href="../CSS/ESTILO_INFO_PRODUCTO.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    

</head>

<body>
 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Eccomerce2</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../HOME/pagInicio.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../PHP/profile.PHP">Perfil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Consultas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../CARRITO_COMPRAS/Carrito.html">Carrito</a></li>
                            <li><a class="dropdown-item" href="../CONSULTA_PEDIDOS/CONSULTA_PEDIDOS.html">Consulta De Pedidos</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../CONSULTA_VENTAS/Consulta_ventas.html">Consulta De Ventas</a></li>
                        </ul>
                    </li>
                        <li>
                           
                        </li>

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>



<div class="card">
</div>
  <div class="img-container">
  <?php   $query3 = "SELECT RUTA_IMAGEN FROM imagenes WHERE ID_PRODUCTO = '$id'";
      $result3 = mysqli_query($conn, $query3);
      while($mostrar=mysqli_fetch_array($result3)){
          $imagen1 = $mostrar['RUTA_IMAGEN'];
          echo '<img  class="IMG" src="' . $imagen1 . '"> ';

        }
        ?>
</div>

  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text">Descripcion De El Articulo: <?php echo $nombre; ?></p>
    <p class="card-text">Puntuacion: <?php echo $valoracion; ?></p>
    <p class="card-text">Precio: <?php echo $precio; ?></p>
    <p class="card-text">Cantidad: <?php echo $cantidad; ?></p>
    <p class="card-text"><small class="text-muted">Categoria: <?php echo $nombrecat; ?></small></p>
    <input class="btn btn-primary" type="submit" Value="Agregar A Mi Lista">
</div>
<div class="info-container">

<p></p>
</div>

<div class="video-container">
        <h2>Reproductor de Video</h2>
        <div class="video">
            <!-- Coloca aquí el código para incrustar tu video, como un iframe de YouTube o un elemento de video HTML -->
            <?php echo '<iframe width="560" height="315" src="'.$video .'" frameborder="2" allowfullscreen></iframe>' ?>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>