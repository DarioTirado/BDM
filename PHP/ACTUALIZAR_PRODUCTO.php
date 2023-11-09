<?php
 include("CONEXION.php");
 session_start();
 $USER = $_SESSION['USER'];
 

$id = $_POST["id"] ?? null;
 $nombre = $_POST["nombre"] ?? null;
 $descripcion = $_POST["descripcion"] ?? null;
 $categoria = $_POST["categoria"] ?? null;
 $cantidad = $_POST["cantidad"] ?? null;
 $estado = $_POST["actividad"] ?? null;
 $precio = $_POST["precio"] ?? null;
 $video = $_POST["video"] ?? null;

 
if(isset($_POST['my_select2'])) {
    $fk_categoria = $_POST['my_select2'];
  
}

 $sql = "UPDATE productos SET NOMBRE = '$nombre', DESCRIPCION='$descripcion', FK_CATEGORIA='$fk_categoria', PRECIO='$precio', CANTIDAD='$cantidad',ESTADO='$estado' WHERE ID_PRODUCTO=$id";
 $success = mysqli_query($conn, $sql);
 
 if ($success) {
     header("location:../PHP/profile.PHP");
 } else {
   echo "Error: " . $sql . "<br>" . $conn->error;
  
 }







 ?>