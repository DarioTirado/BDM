<?php
include("CONEXION.php");

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
    $outgoing_id = $unique_id;
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM usuario WHERE NOT unique_id = {$outgoing_id} AND (CORREO LIKE '%{$searchTerm}%' OR NOMBRE_USUARIO LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>