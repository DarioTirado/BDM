<?php






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="pagIncio.css" rel="stylesheet">
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
                            <li><a class="dropdown-item" href="../PHP/CARRITO.PHP">Carrito</a></li>
                            <li><a class="dropdown-item" href="../CONSULTA_PEDIDOS/CONSULTA_PEDIDOS.html">Consulta De Pedidos</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../CONSULTA_VENTAS/Consulta_ventas.html">Consulta De Ventas</a></li>
                        </ul>
                    </li>
                        <li>
                            <a class="nav-link" onclick="openModal()">Crear Categoria</a>
                        </li>

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="modal-overlay" id="modalOverlay"></div>

    <div class="modal" id="myModal">
        <form action="../PHP/REGISTRO_CATEGORIA.php" method="post">
            <span class="close-button" onclick="closeModal()">&times;</span>
            <h2>Crear Categoria</h2>
            <input class="form-control me-2" type="text" placeholder="Nombre" name="nombrecat">
            <input class="btnenviar"  type="submit">
        </form>
    </div>


    <div class="header__wrapper">
        <header></header>
    </div>

    <!-- Sección de los más vendidos -->
    <div class="container my-5">
      <h2 class="text-center">Los más vendidos</h2>
      <div class="row">
          <!-- Primer producto -->
          <div class="col-md-4">
              <div class="card mb-4">
                  <img src="" class="card-img-top" alt="Producto 1">
                  <div class="card-body">
                      <h5 class="card-title">Nombre del Producto 1</h5>
                      <p class="card-text">Precio: $50.00</p>
                      <a href="/productos.html" class="btn btn-primary">Ver Producto</a>
                  </div>
              </div>
          </div>
          
          <!-- Segundo producto -->
          <div class="col-md-4">
              <div class="card mb-4">
                  <img src="" class="card-img-top" alt="Producto 2">
                  <div class="card-body">
                      <h5 class="card-title">Nombre del Producto 2</h5>
                      <p class="card-text">Precio: $60.00</p>
                      <a href="/productos.html" class="btn btn-primary">Ver Producto</a>
                  </div>
              </div>
          </div>
    
       <!-- Tercer producto -->
          <div class="col-md-4">
              <div class="card mb-4">
                  <img src="" class="card-img-top" alt="Producto 3">
                  <div class="card-body">
                      <h5 class="card-title">Nombre del Producto 3</h5>
                      <p class="card-text">Precio: $70.00</p>
                      <a href="/productos.html" class="btn btn-primary">Ver Producto</a>
                  </div>
              </div>
          </div>
    
          <!-- Cuarto producto -->
          <div class="col-md-4">
              <div class="card mb-4">
                  <img src="" class="card-img-top" alt="Producto 4">
                  <div class="card-body">
                      <h5 class="card-title">Nombre del Producto 4</h5>
                      <p class="card-text">Precio: $70.00</p>
                      <a href="#" class="btn btn-primary">Ver Producto</a>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <!-- Sección de los populares -->
    <div class="container my-5">
      <h2 class="text-center">Populares</h2>
      <div class="row">
          <!-- Primer producto -->
          <div class="col-md-4">
              <div class="card mb-4">
                  <img src="" class="card-img-top" alt="Producto 1">
                  <div class="card-body">
                      <h5 class="card-title">Nombre del Producto 1</h5>
                      <p class="card-text">Precio: $50.00</p>
                      <a href="#" class="btn btn-primary">Ver Producto</a>
                  </div>
              </div>
          </div>
          
          <!-- Segundo producto -->
          <div class="col-md-4">
              <div class="card mb-4">
                  <img src="" class="card-img-top" alt="Producto 2">
                  <div class="card-body">
                      <h5 class="card-title">Nombre del Producto 2</h5>
                      <p class="card-text">Precio: $60.00</p>
                      <a href="#" class="btn btn-primary">Ver Producto</a>
                  </div>
              </div>
          </div>
    
       <!-- Tercer producto -->
          <div class="col-md-4">
              <div class="card mb-4">
                  <img src="" class="card-img-top" alt="Producto 3">
                  <div class="card-body">
                      <h5 class="card-title">Nombre del Producto 3</h5>
                      <p class="card-text">Precio: $70.00</p>
                      <a href="#" class="btn btn-primary">Ver Producto</a>
                  </div>
              </div>
          </div>
    
          <!-- Cuarto producto -->
          <div class="col-md-4">
              <div class="card mb-4">
                  <img src="" class="card-img-top" alt="Producto 4">
                  <div class="card-body">
                      <h5 class="card-title">Nombre del Producto 4</h5>
                      <p class="card-text">Precio: $70.00</p>
                      <a href="#" class="btn btn-primary">Ver Producto</a>
                  </div>
              </div>
          </div>
      </div>
    </div>


    <!-- Sección de nuevos productos -->
    <div class="container my-5" >
        <h2 class="text-center">Nuevos productos</h2>
        <div class="row" id="list-container">

        </div>
    </div>


    <script src="../JAVASCRIPT/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="paginicio.js"></script>
</body>
</html>
