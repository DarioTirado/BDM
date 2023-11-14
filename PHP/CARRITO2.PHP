<?php
session_start();
include("CONEXION.php");

$idUsuario = $_SESSION['ID_USUARIO'];

if (!$idUsuario) {
    echo "ID_USUARIO no está presente en la sesión.";
    exit;
}

$result = $conn->query("SELECT * FROM orden_compra2 WHERE ID_USUARIO = $idUsuario");

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $productosArray = json_decode($row['PRODUCTOS'], true);

    echo "<h2>Carrito de Compras</h2>";
    
    if (!empty($productosArray)) {
        echo "<ul>";
        foreach ($productosArray as $producto) {
            echo "<li>{$producto['NOMBRE']} - Precio: {$producto['PRECIO']} $</li>";
        }
        echo "</ul>";
    } else {
        echo "El carrito está vacío.";
    }
} else {
    echo "No se encontró el carrito para el usuario.";
}
?>
