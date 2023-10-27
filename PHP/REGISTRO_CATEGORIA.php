<?php
include("CONEXION.php");
session_start();
$USER = $_SESSION['USER'];

$consulta = "SELECT * FROM usuario WHERE CORREO = '$USER'";
$resultado = mysqli_query($conn,$consulta);

if($resultado){
    while($row = $resultado->fetch_array()){
        $id = $row['ID_USUARIO'];
    }
}

$nombrecat = $_POST["nombrecat"] ?? null;

$sql = "INSERT INTO categoria ( NOMBRE, ID_USUARIO)
VALUES ('$nombrecat', $id)";

if ($conn->query($sql) === TRUE) {
    $_SESSION['success_message'] = "Registro exitoso";
    header("location:../HOME/pagInicio.html?success_message=Registro%20exitoso");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
 
}

?>