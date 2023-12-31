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
  $nombre = $mostrar['NOMBRE_USUARIO'];
  $rol = $mostrar['ROL'];
  $correo = $mostrar['CORREO'];
  $imagen = $mostrar['IMAGEN'];
  
}

if($rol == 1){
$ROL = "ADMIN";
}
if($rol == 2){
  $ROL = "COMPRADOR";
}
if($rol == 3){
  $ROL = "VENDEDOR";
}


$query2="SELECT ID_CATEGORIA, NOMBRE FROM categoria";
$resultcat = mysqli_query($conn, $query2);
if (!$resultcat) {
  echo "Error en la consulta: " . mysqli_error($conn);
}

$sql3 = "SELECT * FROM usuario WHERE CORREO = '$USER'";
$result3 = mysqli_query($conn,$sql3);
while($mostrar=mysqli_fetch_array($result3)){
  $id = $mostrar['ID_USUARIO'];
 
}



$sql = "SELECT COUNT(*) as total FROM productos WHERE ID_USUARIO=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // Recuperar el resultado de la consulta
  $row = $result->fetch_assoc();
  $totalRegistros = $row["total"];
 
} else {
  $totalRegistros =0;
}



$sql = "SELECT COUNT(*) as total FROM lista WHERE ID_USUARIO=$id";
$result2 = $conn->query($sql);
if ($result2->num_rows > 0) {
  // Recuperar el resultado de la consulta
  $row = $result2->fetch_assoc();
  $totalListas = $row["total"];
 
} else {
  $totalListas =0;
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Profile Page</title>
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../Login_and_Register/profile_style.css" />
  </head>
  <body>

  <div class="header__wrapper">
      <header></header>
      <div class="cols__container">
        <div class="left__col">
          <div class="img__container">
          <?php echo '<img src="' . $imagen . '" alt="Usuario">'; ?>
            <span></span>
          </div>
          <h2><?php echo $nombre; ?></h2>
          <p><?php echo $ROL; ?></p>
          <p><?php echo $correo; ?></p>

          <ul class="about">
            <li><span><?php echo $totalRegistros; ?></span>Productos</li>
            <li><span><?php echo $totalListas; ?></span>Listas</li>
            <li><span>0</span>Reseñas Positivas</li>
          </ul>

          <div class="content">
            <p>
              Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam
              erat volutpat. Morbi imperdiet, mauris ac auctor dictum, nisl
              ligula egestas nulla.
            </p>

            <ul>
              <li><i class="fab fa-twitter"></i></li>
              <i class="fab fa-pinterest"></i>
              <i class="fab fa-facebook"></i>
              <i class="fab fa-amazon"></i>
            </ul>          
            <a href="../HOME/pagInicio.html">Home</a><br>
            <a href="../PHP/EDITAR_PERFIL.php">Editar</a><br>
            <a href="../PHP/CERRAR_SESSION.php">Cerrar Sesion</a>
           

          </div>
        </div>
        <div class="right__col">
          <nav>
            <ul>
              <li><a href="">Productos</a></li>
            </ul>
            <button onclick="openModal()" >Crear Producto</button>
            <button onclick="openModal2()" >Crear Lista</button>
            <button onclick="openModal3()" >Agregar Direccion</button>
          </nav>

          <div class="photos" id="photos">
                    
          </div>
          <div class="right__col">
          <nav>
            <ul>
              <li><a href="">Listas</a></li>
            </ul>
            </nav>
            <div class="photos2" id="photos2">
                    
            </div>
            </div>
        </div>
      </div>
    </div>

    <div class="modal-overlay" id="modalOverlay"></div>

    <div class="modal" id="myModal">
        <form action="../PHP/REGISTRO_PRODUCTO.php" method="post" enctype="multipart/form-data">>
            <span class="close-button" onclick="closeModal()">&times;</span>
            <h2>Crear Producto</h2>
            <input class="form-control me-2" type="text" placeholder="Nombre" name="nombreprod" required><br>
            <input class="form-control me-2" type="text" placeholder="Descripcion" name="descripcion" required><br>
            <input class="form-control me-2" type="text" placeholder="Cantidad" name="cantidad" required><br>
            <input class="form-control me-2" type="text" placeholder="Precio" name="precio" required><br>
            <label for="">Seleccione Una Categoria</label>
            <select class="select-style" name="my_select2">
              <?php
              while ($filacat = mysqli_fetch_assoc($resultcat))  {
                echo '<option value="' . $filacat['ID_CATEGORIA'] . '">' . $filacat['NOMBRE'] . '</option>';
              }
                ?>    
           </select>        
            <p>Cargar Imagenes</p>
            <input class="form-control me-2" type="file" multiple placeholder="Imagenes" name="imgProducto[]"><br>
            <p>Cargar Video</p>
            <input class="form-control me-2" type="file" placeholder="Videos" name="vidproducto"><br>
            <input class="btnenviar" name="submit" type="submit">
        </form>
    </div>




    <div class="modal-overlay" id="modalOverlay2"></div>

<div class="modal" id="myModal2">
    <form action="../PHP/REGISTRAR_LISTA.php" method="post" enctype="multipart/form-data">>
        <span class="close-button" onclick="closeModal2()">&times;</span>
        <h2>Crear Lista</h2>
        <input class="form-control me-2" type="text" placeholder="Nombre" name="nombrelist" required><br>
        <input class="form-control me-2" type="text" placeholder="Descripcion" name="descripcionlist" required><br>
        <div class="Privacidad">
                    
                    <input type="radio" id="privada" name="lista" value="Privada"  >
                    <label for="priv">Privada</label>
                    
                    <input type="radio" id="publica" name="lista" value="Publica" checked>
                    <label for="public">Publica</label>
                </div>
            
        <input class="btnenviar" name="submit" type="submit" value="Crear">
    </form>
</div>


<div class="modal-overlay" id="modalOverlay3"></div>

<div class="modal" id="myModal3">
    <form action="../PHP/REGISTRO_DIRECCION.php" method="post">
        <span class="close-button" onclick="closeModal3()">&times;</span>
        <h2>Direccion De Entrega</h2>
        <input class="form-control me-2" type="text" placeholder="Direccion" name="nombredir" required><br>
        <input class="form-control me-2" type="text" placeholder="Estado" name="Estado" required><br>
        <input class="form-control me-2" type="text" placeholder="Ciudad" name="ciudad" required><br>
        <input class="form-control me-2" type="text" placeholder="Pais" name="Pais" required><br>

            
        <input class="btnenviar" name="submit" type="submit" value="Guardar">
    </form>
</div>

    <script src="../JAVASCRIPT/jquery.js"></script>
    <script src="../JAVASCRIPT/Crear_producto.js"></script>
  </body>
</html>