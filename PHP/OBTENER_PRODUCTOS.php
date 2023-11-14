<?php

include("CONEXION.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_c']) && $_POST['action_c'] == 'busquedatal') {
    // Verificar la conexión a la base de datos
    if ($conn->connect_error) {
        echo "notData";
        exit;
    }

    $data = "SELECT ID_PRODUCTO, NOMBRE, DESCRIPCION, PRECIO, VALORACION FROM productos";

    $result = mysqli_query($conn, $data);
    $num_rows = mysqli_num_rows($result);
    $arrcurso = array();
    if ($num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $arrcurso[] = $row;
        }
        echo json_encode($arrcurso, JSON_UNESCAPED_UNICODE);
    } else {
        echo "notData";
    }
} else {
    echo "notData";
}
?>
