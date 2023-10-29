<?php
include("../PHP/CONEXION.php");
session_start();
$USER = $_SESSION['USER'];

$consulta = "SELECT * FROM usuario WHERE CORREO = '$USER'";
$resultado = mysqli_query($conn,$consulta);
$contador =0;
if($resultado){
    while($row = $resultado->fetch_array()){
        $id = $row['ID_USUARIO'];
    }
}
$directorio = '../ZRECURSOS/IMAGENES_PRODUCTOS';
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
 
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
 
}

//MAGENES//
$sql = "SELECT * FROM usuario WHERE CORREO = '$USER'";
$result = mysqli_query($conn,$sql);
while($mostrar=mysqli_fetch_array($result)){
  $id_user = $mostrar['ID_USUARIO'];
 
}



$sql = "SELECT * FROM productos WHERE NOMBRE = '$nombre' AND ID_USUARIO = $id_user";
$result = mysqli_query($conn,$sql);
while($mostrar=mysqli_fetch_array($result)){
  $id_producto = $mostrar['ID_PRODUCTO'];
 
}
//IMAGENES
 if(isset($_POST['submit'])){

  foreach($_FILES['imgProducto']['tmp_name'] as $key => $value){

      if(file_exists($_FILES['imgProducto']['tmp_name'][$key])){
          if(move_uploaded_file($_FILES['imgProducto']['tmp_name'][$key],
          '../ZRECURSOS/IMAGENES_PRODUCTOS/'.$_FILES['imgProducto']['name'][$key])){
            $ruta = "../ZRECURSOS/IMAGENES_PRODUCTOS/".$_FILES['imgProducto']['name'][$key];
            $sql = $conn->query("INSERT INTO imagenes (RUTA_IMAGEN, ID_PRODUCTO) VALUES('".$ruta."', '$id_producto')");
            $contador++;
          }

      }
   }
 }
if($contador===3){
  $_SESSION['success_message'] = "Registro exitoso";
  header("location:../PHP/profile.php?success_message=Registro%20exitoso");

}
/* query para vincular productos e imagenes

 $_SESSION['success_message'] = "Registro exitoso";
  header("location:../PHP/profile.php?success_message=Registro%20exitoso");

SELECT p.id_producto, p.nombre AS nombre_producto, i.id_imagen, i.nombre_archivo AS nombre_imagen
FROM productos p
LEFT JOIN imagenes i ON p.id_producto = i.id_producto
WHERE p.id_producto = 1; -- Cambia 1 por el ID del producto que deseas mostrar*/


?>