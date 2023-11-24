<?php
include("CONEXION.php");
session_start();
$USER = $_SESSION['USER'];

if ($USER == null || $USER == '') {
    header("location:../PHP/ERROR_AUTENTICACION.php");
    die();
}

$consulta = "SELECT * FROM usuario WHERE CORREO = '$USER'";
$resultado = mysqli_query($conn, $consulta);

if ($resultado) {
    while ($row = $resultado->fetch_array()) {
        $id = $row['ID_USUARIO'];
    }
}

$nombrecat = $_POST["nombrecat"] ?? null;

// Validar si el nombre de la categoría está vacío o solo contiene espacios en blanco
if (empty(trim($nombrecat))) {
    $error_message = "Error: El nombre de la categoría no puede estar vacío.";
} else {
    // Si la validación pasa, realizar la inserción en la base de datos
    $sql = "INSERT INTO categoria (NOMBRE, ID_USUARIO)
            VALUES ('$nombrecat', $id)";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success_message'] = "Registro exitoso";
        header("location:../HOME/pagInicio.html?success_message=Registro%20exitoso");
        die(); // Asegúrate de detener la ejecución después de redirigir
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Página</title>
</head>
<body>

<!-- Agrega este bloque para mostrar el mensaje de error -->
<?php if (isset($error_message)) : ?>
    <div style="color: red;"><?php echo $error_message; ?></div>
<?php endif; ?>

<!-- Resto de tu código HTML -->
<!-- ... -->

</body>
</html>
