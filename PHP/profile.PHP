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
            <img src="../Login_and_Register/Images/pato.jpg" alt="Usuario" />
            <span></span>
          </div>
          <h2><?php echo $nombre; ?></h2>
          <p><?php echo $ROL; ?></p>
          <p><?php echo $correo; ?></p>

          <ul class="about">
            <li><span>6</span>Productos</li>
            <li><span>30</span>Reseñas Positivas</li>
            <li><span>2</span>Ordenes</li>
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
            <a href="../PHP/EDITAR_PERFIL.php">Editar</a><br>
            <a href="../PHP/CERRAR_SESSION.php">Cerrar Sesion</a>
           

          </div>
        </div>
        <div class="right__col">
          <nav>
            <ul>
              <li><a href="">Productos</a></li>
              <li><a href="">Reseñas</a></li>
            </ul>
            <button onclick="openModal()" >Crear Producto</button>
          </nav>

          <div class="photos">
            <img src="../Login_and_Register/Images/box.jpg" alt="Photo" />
            <img src="../Login_and_Register/Images/box.jpg" alt="Photo" />
            <img src="../Login_and_Register/Images/box.jpg" alt="Photo" />
            <img src="../Login_and_Register/Images/box.jpg" alt="Photo" />
            <img src="../Login_and_Register/Images/box.jpg" alt="Photo" />
            <img src="../Login_and_Register/Images/box.jpg" alt="Photo" />
          </div>
        </div>
      </div>
    </div>

    <div class="modal-overlay" id="modalOverlay"></div>

    <div class="modal" id="myModal">
        <form action="../PHP/REGISTRO_PRODUCTO.php" method="post">
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
            <input class="form-control me-2" type="file" placeholder="Imagenes" name="img"><br>
            <p>Cargar Video</p>
            <input class="form-control me-2" type="file" placeholder="Videos" name="vid"><br>
            <input class="btnenviar"  type="submit">
        </form>
    </div>


    <script src="../JAVASCRIPT/Crear_producto.js"></script>
  </body>
</html>