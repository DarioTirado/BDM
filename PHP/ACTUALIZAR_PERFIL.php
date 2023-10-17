<?php
include("CONEXION.php");
session_start();
$USER = $_SESSION['USER'];

if (isset($_POST['role'])) {
    $rolSeleccionado = $_POST['role'];
    
} else {
    echo "Ningún rol seleccionado";
}

$nombre = $_POST["nombre"] ?? null;
$username = $_POST["username"] ?? null;
$email = $_POST["correo"] ?? null;
$password = $_POST["password"] ?? null;
$fecha_nacimiento = $_POST["birthdate"] ?? null;
$sexo = $_POST["gender"] ?? null;
$rol = $_POST["role"] ?? null;

//Guardar ruta de archivos
/*
$directorioDestino = '../ZRECURSOS/IMAGENES';
$rutaArchivo = $directorioDestino . '/' . $_FILES['imagenes']['name'];
move_uploaded_file($_FILES['imagenes']['tmp_name'], $rutaArchivo);
*/


$sql = "UPDATE usuario SET CONTRASEÑA ='$password' , NOMBRE_USUARIO = '$username' , NOMBRE_PERSONAL= '$nombre', FECHA_NACIMIENTO = '$fecha_nacimiento',SEXO = '$sexo' WHERE CORREO = '$USER' ";
$success = mysqli_query($conn, $sql);

if ($success) {
    header("location:../PHP/profile.PHP");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
 
}


?>