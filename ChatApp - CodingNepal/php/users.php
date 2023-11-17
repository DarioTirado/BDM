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
    $outgoing_id = $unique_id;
    $sql = "SELECT * FROM usuario WHERE NOT unique_id = {$outgoing_id} ORDER BY ID_USUARIO DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>