<?php
include("CONEXION.php");
session_start();
$USER = $_SESSION['USER'];

$consulta = "SELECT * FROM usuario WHERE CORREO = '$USER'";
$resultado = mysqli_query($conn, $consulta);

if ($resultado) {
    while ($row = $resultado->fetch_array()) {
        $id = $row['ID_USUARIO'];
    }
}

$priv = 0;
$nombrelista = $_POST["nombrelist"] ?? null;
$descripcion = $_POST["descripcionlist"] ?? null;
$privacidad = $_POST["lista"] ?? null;

// Validar campos no vacíos y sin espacios en blanco
if (empty(trim($nombrelista)) || empty(trim($descripcion))) {
    echo "Error: Todos los campos son obligatorios.";
} else {
    if ($privacidad === "publica") {
        $priv = 1;
    } else {
        $priv = 0;
    }

    $sql = "INSERT INTO lista (NOMBRE_LISTA, DESCRIPCION, ESTADO, ID_USUARIO)
            VALUES ('$nombrelista', '$descripcion', '$priv', '$id')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success_message'] = "Registro exitoso";
        header("location:../HOME/pagInicio.html?success_message=Registro%20exitoso");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
