<?php
include("CONEXION.php");

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


$sql = "INSERT INTO usuario (CORREO, CONTRASEÑA , NOMBRE_USUARIO, NOMBRE_PERSONAL, FECHA_NACIMIENTO, SEXO, ROL)
VALUES ('$email','$password' ,'$username' , '$nombre', '$fecha_nacimiento', '$sexo', $rol)";

if ($conn->query($sql) === TRUE) {
    header("location:../Login_and_Register/index.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
 
}

?>

