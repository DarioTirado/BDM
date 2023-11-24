<?php
include("../PHP/CONEXION.php");
session_start();
$USER = $_SESSION['USER'];
//HISTORIAL//
if($USER == null || $USER ==''){
  header("location:../PHP/ERROR_AUTENTICACION.php");
die();
}

$sql = "SELECT * FROM usuario WHERE CORREO = '$USER'";
$result = mysqli_query($conn,$sql);
while($mostrar=mysqli_fetch_array($result)){
  $id = $mostrar['ID_USUARIO'];
  
  
}

$sql2 = "UPDATE orden_compra2 SET PRODUCTOS = NULL, SUBTOTAL = 0.0, TOTAL = 0.0 WHERE ID_USUARIO = $id";
if ($conn->query($sql2) === TRUE) {

    $_SESSION['success_message2'] = "Limpieza con Éxito";
    header("location:../HOME/pagInicio.html?success_message2=Limpieza con%20Éxito");
}else{

    echo "Error: " . $sql2 . "<br>" . $conn->error;
}

?>