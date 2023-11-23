<?php

include("CONEXION.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_c']) && $_POST['action_c'] == 'busquedatal') {
    // Verificar la conexión a la base de datos
    if ($conn->connect_error) {
        echo json_encode(['status' => 'error', 'message' => 'Error de conexión a la base de datos']);
        exit;
    }

    $sql = "SELECT ID_PRODUCTO, NOMBRE, DESCRIPCION, PRECIO, VALORACION FROM productos WHERE 1=1";

    // Array para almacenar los tipos de parámetros y los valores
    $paramTypes = '';
    $paramValues = array();

    if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
        $nombre = '%' . $_POST['nombre'] . '%'; // Agregamos comodines para la búsqueda
        $sql .= " AND NOMBRE LIKE ?";
        $paramTypes .= 's';
        $paramValues[] = $nombre;
    }

    // Preparamos la consulta
    $stmt = $conn->prepare($sql);

    // Vinculamos los parámetros dinámicamente
    if (!empty($paramValues)) {
        $params = array_merge(array($paramTypes), $paramValues);
        $stmt->bind_param(...$params);
    }

    // Ejecutamos la consulta
    if ($stmt->execute()) {
        // Obtenemos los resultados
        $result = $stmt->get_result();

        $arrcurso = array();

        while ($row = $result->fetch_assoc()) {
            $arrcurso[] = $row;
        }

        // Devolvemos los resultados como JSON
        if (!empty($arrcurso)) {
            echo json_encode(['status' => 'success', 'data' => $arrcurso], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['status' => 'no_results', 'message' => 'No se encontraron resultados para la búsqueda']);
        }
    } else {
        // Si hay un error en la ejecución de la consulta
        echo json_encode(['status' => 'error', 'message' => 'Error al ejecutar la consulta']);
    }

    // Cerramos la conexión y liberamos los recursos
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Solicitud no válida']);
}
?>
