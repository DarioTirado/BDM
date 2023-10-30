<?php

include("CONEXION.php");

if ($_POST['action_c'] == 'busquedatal') {
    $data = "SELECT ID_PRODUCTO, NOMBRE, DESCRIPCION, PRECIO, VALORACION FROM productos";
 
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
