<?php
include("../PHP/CONEXION.php");
session_start();
$USER = $_SESSION['USER'];
//HISTORIAL//
if($USER == null || $USER ==''){
  header("location:../PHP/ERROR_AUTENTICACION.php");
die();
}


$sql = "SELECT * FROM usuario WHERE CORREO = '$USER'";
$result = mysqli_query($conn,$sql);
while($mostrar=mysqli_fetch_array($result)){
  $id = $mostrar['ID_USUARIO'];
  
  
}

$sql2 = "SELECT * FROM orden_compra2 WHERE ID_USUARIO = '$id'";
$result2 = mysqli_query($conn,$sql2);
while($mostrar2=mysqli_fetch_array($result2)){

$productos = $mostrar2['PRODUCTOS'];
  $subtotal = $mostrar2['SUBTOTAL'];
  $total = $mostrar2['TOTAL'];
  
}
$productos_serializado = json_encode($productos);
$ran_id = rand(time(), 100000000);

$sql3 = "INSERT INTO orden_compra ( ID_USUARIO, PRODUCTOS, SUBTOTAL, TOTAL, ESTADO, RANID)
VALUES ('$id', $productos_serializado, $subtotal, $total,'COMPLETADA', $ran_id)";

if ($conn->query($sql3) === TRUE) {
  
//FATURA//


if(isset($_POST['my_select2'])) {
    $fk_metodopago = $_POST['my_select2'];
  
}

$fecha_actual = date("Y-m-d");

$sql4 = "INSERT INTO factura ( PRECIO_SUBTOTAL, PRECIO_TOTAL,FECHA, ID_METODO_PAGO, ID_USUARIO, ID_ORDEN_COMPRA)
VALUES ('$subtotal', '$total','$fecha_actual','$fk_metodopago', '$id','$ran_id' )";

if ($conn->query($sql4) === TRUE) {
    $cantidad_total_por_producto = [];
    $productos_decodificados = json_decode($productos, true);

    // Calcular la cantidad total vendida por producto
    foreach ($productos_decodificados as $producto) {
        $id_producto = $producto['ID_PRODUCTO'];

        if (!isset($cantidad_total_por_producto[$id_producto])) {
            $cantidad_total_por_producto[$id_producto] = 0;
        }

        $cantidad_total_por_producto[$id_producto]++;
    }

    // Actualizar la cantidad y la cantidad vendida para cada producto en la base de datos
    foreach ($cantidad_total_por_producto as $id_producto => $cantidad_total) {
        // Consulta SQL para actualizar la cantidad y la cantidad vendida
        $sql5 = "UPDATE productos SET CANTIDAD = CANTIDAD - $cantidad_total, CANTIDAD_VENDIDOS = CANTIDAD_VENDIDOS + $cantidad_total WHERE ID_PRODUCTO = $id_producto";

        if ($conn->query($sql5) === TRUE) {
            
            echo "Actualización exitosa para el producto con ID $id_producto.<br>";
            $_SESSION['success_message'] = "Compra Con Éxito";
            header("location:../HOME/pagInicio.html?success_message=Compra Con%20Éxito");
        } else {
            echo "Error al actualizar para el producto con ID $id_producto: " . $conn->error . "<br>";
        }
    }

    // Redireccionar si las actualizaciones fueron exitosas
} else {
    echo "Error: " . $sql4 . "<br>" . $conn->error;
}
}




?>