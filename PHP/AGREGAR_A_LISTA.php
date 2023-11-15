<?php

include("CONEXION.php");

session_start();
$USER = $_SESSION['USER'];

if($USER == null || $USER ==''){
  header("location:../PHP/ERROR_AUTENTICACION.php");
die();
}


$id_prod = $_POST["idprod"] ?? null;

if(isset($_POST['my_select2'])) {
    $fk_categoria = $_POST['my_select2'];
  
}



$sql = "INSERT INTO lista_foranea ( ID_LISTA, ID_PRODUCTO)
VALUES ('$fk_categoria','$id_prod')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['success_message'] = "Agregado Exitoso";
    header("location:../PHP/profile.php?success_message=Agregado%20exitoso");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
 
}




?>