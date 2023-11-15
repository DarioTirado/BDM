<?php
include("../PHP/CONEXION.php");
session_start();
$USER = $_SESSION['USER'];

if($USER == null || $USER ==''){
  header("location:../PHP/ERROR_AUTENTICACION.php");
die();
}


$consulta = "SELECT * FROM usuario WHERE CORREO = '$USER'";
$resultado = mysqli_query($conn,$consulta);

if($resultado){
    while($row = $resultado->fetch_array()){
        $id = $row['ID_USUARIO'];
    }
}

$direccion= $_POST["nombredir"] ?? null;
$estado = $_POST["Estado"] ?? null;
$ciudad = $_POST["ciudad"] ?? null;
$pais = $_POST["Pais"] ?? null;


$sql = "INSERT INTO direccion_usuario (DIRECCION, PAIS, CIUDAD, ESTADO, ID_USUARIO)
VALUES ('$direccion','$estado','$ciudad','$pais', $id)";


if ($conn->query($sql) === TRUE) {
    $_SESSION['success_message'] = "Registro exitoso";
    header("location:../HOME/pagInicio.html?success_message=Registro%20exitoso");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
 
}
?>