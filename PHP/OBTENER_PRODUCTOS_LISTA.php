<?php
include("CONEXION.php");
session_start();
$USER = $_SESSION['USER'];


$id = $_POST['action_c'] ?? null;

if ($_POST['action_c2'] == 'busquedatal') {
    $data = " SELECT 
    P.ID_Producto,
    P.Nombre AS NOMBRE,
    P.Descripcion AS DESCRIPCION_PRODUCTO,
    P.Precio AS PRECIO_PROD,
    L.ID_LISTA,
    L.NOMBRE_LISTA AS NOMBRE_LISTA,
    L.Descripcion AS DESCRIPCION
    
    FROM
    Productos P
JOIN
    lista_foranea LF ON P.ID_Producto = LF.ID_Producto
JOIN
    lista L ON LF.ID_LISTA = L.ID_LISTA
WHERE
    L.ID_LISTA = $id ";
 
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
