<?php

include("../PHP/CONEXION.php");
session_start();
$USER = $_SESSION['USER'];

if($USER == null || $USER ==''){
  header("location:../PHP/ERROR_AUTENTICACION.php");
die();
}


$sql = "SELECT * FROM usuario WHERE CORREO = '$USER'";
$result = mysqli_query($conn,$sql);
while($mostrar=mysqli_fetch_array($result)){
  $id = $mostrar['ID_USUARIO'];
  
  
}

$sql2 = "SELECT * FROM orden_compra2 WHERE ID_USUARIO = '$id'";
$result2 = mysqli_query($conn,$sql2);
while($mostrar2=mysqli_fetch_array($result2)){
  $subtotal = $mostrar2['SUBTOTAL'];
  $total = $mostrar2['TOTAL'];
  
}

$query2="SELECT ID_METODO_PAGO, NOMBRE FROM METODO_PAGO";
$resultcat = mysqli_query($conn, $query2);
if (!$resultcat) {
  echo "Error en la consulta: " . mysqli_error($conn);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Font Gilroy -->
    <link href="http://fonts.cdnfonts.com/css/gilroy-bold" rel="stylesheet">
    <!-- Bootstrap CSS -->
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Plyr CSS -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css">
    <link href="carrito_Estilo.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>Carrito</title>
</head>
<body>

    <!-- Navegacion -->
    <nav class="navbar navbar-expand-lg navbar-light py-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Eccomerce2</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
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
                            <a class="nav-link" onclick="openModal()">Crear Categoria</a>
                        </li>
                        <li>
                            <a class="nav-link" href="../ChatApp - CodingNepal/users.php">Chatear</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../BPRODUCTOS/Productos.html">Productos</a>
                        </li>

                </ul>
                
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- Contenido relacionado con productos (eliminado según tu solicitud) -->
                <form action="LLENAR_HISTORIAL.php" method="POST">
                <h1 class="titulo">Carrito</h1>
                <div id="carrito-container" class="articulos">
                    <!-- Aquí se mostrarán los productos del carrito -->
                </div>
            </div>
            <div class="col-md-4">
              <h1 class="titulo">Cuenta</h1>
                <div class="d-flex justify-content-between align-items-center BTN_PAGAR">
                   <!-- Añadir esto donde desees mostrar el total a pagar -->
                   <div >
                    <h1 class="titulo" >Total a Pagar: <?php echo $total; ?></h1>
                    
                    <br><select class="select-style" name="my_select2">
              <?php
              while ($filacat = mysqli_fetch_assoc($resultcat))  {
                echo '<option value="' . $filacat['ID_METODO_PAGO'] . '">' . $filacat['NOMBRE'] . '</option>';
              }
                ?>    
           </select>     
                
                </div>
                    
                </div>
                <input type="submit" class="btn btn-primary" value="Pagar"></input>
                </form>
                <form action="LIMPIAR_CARRITO.php" method="POST">
                <input type="submit" class="btn btn-primary" value="Limpiar"></input>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap y otros scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <!-- Tu archivo de JavaScript con la lógica del carrito -->
    <script src="carrito.js"></script>
</body>
</html>
