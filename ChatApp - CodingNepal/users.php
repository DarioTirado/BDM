<?php 
include("../PHP/CONEXION.php");

  session_start(); //se reanuda la sesion existente
  $USER = $_SESSION['USER'];

if($USER == null || $USER ==''){
  header("location:../PHP/ERROR_AUTENTICACION.php");
die();
}

$consulta = "SELECT * FROM usuario WHERE CORREO = '$USER'";
$resultado = mysqli_query($conn,$consulta);

if($resultado && mysqli_num_rows($resultado) > 0){
  while($row = $resultado->fetch_array()){
      $unique_id = $row['unique_id'];
      
  }
}




 include_once "header.php"; 
?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM usuario WHERE unique_id = '$unique_id'");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          
          <div class="details">
            <span><?php echo $row['NOMBRE_USUARIO']. " " . $row['CORREO'] ?></span>
          </div>
        </div>
        <a href="../HOME/pagInicio.html" class="logout">Home</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>


  <script src="../ChatApp - CodingNepal/javascript/users.js"></script>
</body>
</html>
