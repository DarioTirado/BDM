<?php
session_start();
include("CONEXION.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['index'])) {
    $index = $_POST['index'];

    // Obtener la información del producto desde la base de datos según el índice recibido
    $query = "SELECT ID_PRODUCTO, NOMBRE, PRECIO FROM productos WHERE ID_PRODUCTO = $index";
    
    // Imprimir la consulta SQL para depuración (elimina o comenta esta línea en producción)
    // echo 'Consulta SQL: ' . $query . '<br>';

    $result = $conn->query($query);

    // Imprimir información sobre los resultados para depuración (elimina o comenta esta línea en producción)
    // echo 'Número de filas: ' . $result->num_rows . '<br>';
    
    if ($result && $result->num_rows > 0) {
        $producto = $result->fetch_assoc();

        // Obtener el ID de usuario desde la sesión
        $idUsuario = $_SESSION['ID_USUARIO'];

        // Verificar si el ID de usuario está presente en la sesión
        if (!$idUsuario) {
            echo json_encode(['status' => 'error', 'message' => 'ID_USUARIO no está presente en la sesión.']);
            exit;
        }

        // Obtener la orden de compra actual del usuario
        $queryOrden = "SELECT * FROM orden_compra2 WHERE ID_USUARIO = $idUsuario";
        $resultOrden = $conn->query($queryOrden);

        if ($resultOrden && $resultOrden->num_rows > 0) {
            // Actualizar la orden de compra existente con el nuevo producto
            $rowOrden = $resultOrden->fetch_assoc();
            $idOrdenCompra = $rowOrden['ID_ORDEN_COMPRA'];
            $productosArray = json_decode($rowOrden['PRODUCTOS'], true);

            // Agregar el nuevo producto al arreglo de productos
            $productosArray[] = $producto;

            // Calcular subtotal y total
            $subtotal = $rowOrden['SUBTOTAL'] + $producto['PRECIO'];
            $total = $rowOrden['TOTAL'] + $producto['PRECIO'];

            // Actualizar la columna PRODUCTOS, SUBTOTAL y TOTAL en la tabla
            $updateQuery = "UPDATE orden_compra2 SET PRODUCTOS = '" . json_encode($productosArray) . "', SUBTOTAL = $subtotal, TOTAL = $total WHERE ID_ORDEN_COMPRA = $idOrdenCompra";
            $conn->query($updateQuery);
        } else {
            // Crear una nueva orden de compra si no existe
            $productosArray = [$producto];

            // Calcular subtotal y total
            $subtotal = $producto['PRECIO'];
            $total = $producto['PRECIO'];

            // Insertar la nueva orden de compra en la tabla
            $insertQuery = "INSERT INTO orden_compra2 (ID_USUARIO, SUBTOTAL, TOTAL, PRODUCTOS) VALUES ($idUsuario, $subtotal, $total, '" . json_encode($productosArray) . "')";
            $conn->query($insertQuery);
        }

        // Respondemos al cliente (JS) con un mensaje de éxito
        echo json_encode(['status' => 'success', 'message' => 'Producto agregado al carrito.']);
        exit;
    }  else {
        // Producto no encontrado en la base de datos
        $errorMessage = $conn->error ? $conn->error : 'El producto no se encontró en la base de datos.';
        echo json_encode(['status' => 'error', 'message' => $errorMessage]);
        exit;
    }
    
} else {
    // Si se accede al script directamente sin una solicitud POST válida, responder con un mensaje de error
    echo json_encode(['status' => 'error', 'message' => 'Acceso no válido.']);
    exit;
}
?>
