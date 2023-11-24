<?php
include("CONEXION.php");
session_start();
$USER = $_SESSION['USER'];


$sql = "SELECT * FROM usuario WHERE CORREO = '$USER'";
$result = mysqli_query($conn,$sql);
while($mostrar=mysqli_fetch_array($result)){
  $id = $mostrar['ID_USUARIO'];
 
}


if ($_POST['action_c'] == 'busquedatal') {
    $data = "SELECT ID_PRODUCTO, NOMBRE, DESCRIPCION ,PRECIO , CANTIDAD, CANTIDAD_VENDIDOS FROM productos WHERE ID_USUARIO = $id" ;
 
    $result = mysqli_query($conn, $data);
    $num_rows = mysqli_num_rows($result);
    $arrcurso = array();
    if ($num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)){
            $arrcurso[] = $row;
        }
            echo json_encode($arrcurso, JSON_UNESCAPED_UNICODE);
    } else {
        echo "notData";
    }

}















?>