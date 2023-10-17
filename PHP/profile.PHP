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
            <button>Seguir</button>
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
  </body>
</html>