<?php
include("../PHP/CONEXION.php");
session_start();
$USER = $_SESSION['USER'];

$consulta = "SELECT * FROM usuario WHERE CORREO = '$USER'";
$resultado = mysqli_query($conn,$consulta);

if($resultado){
    while($row = $resultado->fetch_array()){
        $id = $row['ID_USUARIO'];
    }
}

$nombre = $_POST["nombreprod"] ?? null;
$descripcion = $_POST["descripcion"] ?? null;
$precio = $_POST["precio"] ?? null;
$cantidad = $_POST["cantidad"] ?? null;
$cantidad_vendidos = 0;
$valoracion = "SIN VALORACION";
$estado=1;


if(isset($_POST['my_select2'])) {
    $fk_categoria = $_POST['my_select2'];
  
  }

$sql = "INSERT INTO productos (NOMBRE, DESCRIPCION, FK_IMAGENES, FK_CATEGORIA, PRECIO, CANTIDAD, VALORACION, ESTADO, CANTIDAD_VENDIDOS, FK_COMENTARIOS, ID_USUARIO)
VALUES ('$nombre','$descripcion',NULL,'$fk_categoria','$precio','$cantidad','$valoracion','$estado','$cantidad_vendidos',NULL,'$id')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['success_message'] = "Registro exitoso";
    header("location:../PHP/profile.php?success_message=Registro%20exitoso");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
 
}


?>