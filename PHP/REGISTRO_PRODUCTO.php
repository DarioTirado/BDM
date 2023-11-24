<?php
include("../PHP/CONEXION.php");
session_start();
$USER = $_SESSION['USER'];

$consulta = "SELECT * FROM usuario WHERE CORREO = '$USER'";
$resultado = mysqli_query($conn, $consulta);
$contador = 0;

if ($resultado) {
    while ($row = $resultado->fetch_array()) {
        $id = $row['ID_USUARIO'];
    }
}

$directorio = '../ZRECURSOS/IMAGENES_PRODUCTOS';
$nombre = $_POST["nombreprod"] ?? null;
$descripcion = $_POST["descripcion"] ?? null;
$precio = $_POST["precio"] ?? null;
$cantidad = $_POST["cantidad"] ?? null;
$cantidad_vendidos = 0;
$valoracion = "SIN VALORACION";
$estado = 1;
$directorioDestino = '../ZRECURSOS/VIDEOS';

$rutaArchivo = $directorioDestino . '/' . $_FILES['vidproducto']['name'];
move_uploaded_file($_FILES['vidproducto']['tmp_name'], $rutaArchivo);

// Validar campos no vacíos
if (empty(trim($nombre)) || empty(trim($descripcion)) || empty(trim($precio)) || empty(trim($cantidad))) {
    $error_message = "Error: Todos los campos son obligatorios.";
} else {
    // Validar que precio y cantidad sean numéricos
    if (!is_numeric($precio) || !is_numeric($cantidad)) {
        $error_message = "Error: El precio y la cantidad deben ser valores numéricos.";
    } else {
        if (isset($_POST['my_select2'])) {
            $fk_categoria = $_POST['my_select2'];
        }

        $sql = "INSERT INTO productos (NOMBRE, DESCRIPCION, FK_IMAGENES, VIDEO ,FK_CATEGORIA, PRECIO, CANTIDAD, VALORACION, ESTADO, CANTIDAD_VENDIDOS, FK_COMENTARIOS, ID_USUARIO)
        VALUES ('$nombre','$descripcion',NULL,'$rutaArchivo','$fk_categoria','$precio','$cantidad','$valoracion','$estado','$cantidad_vendidos',NULL,'$id')";

        if ($conn->query($sql) === TRUE) {
            $sql = "SELECT * FROM usuario WHERE CORREO = '$USER'";
            $result = mysqli_query($conn,$sql);
            while($mostrar=mysqli_fetch_array($result)){
              $id_user = $mostrar['ID_USUARIO'];
            }

            $sql = "SELECT * FROM productos WHERE NOMBRE = '$nombre' AND ID_USUARIO = $id_user";
            $result = mysqli_query($conn,$sql);
            while($mostrar=mysqli_fetch_array($result)){
              $id_producto = $mostrar['ID_PRODUCTO'];
            }

            if (isset($_POST['submit'])) {
                foreach ($_FILES['imgProducto']['tmp_name'] as $key => $value) {
                    if (file_exists($_FILES['imgProducto']['tmp_name'][$key])) {
                        if (move_uploaded_file($_FILES['imgProducto']['tmp_name'][$key],
                            '../ZRECURSOS/IMAGENES_PRODUCTOS/'.$_FILES['imgProducto']['name'][$key])) {
                            $ruta = "../ZRECURSOS/IMAGENES_PRODUCTOS/".$_FILES['imgProducto']['name'][$key];
                            $sql = $conn->query("INSERT INTO imagenes (RUTA_IMAGEN, ID_PRODUCTO) VALUES('".$ruta."', '$id_producto')");
                            $contador++;
                        }
                    }
                }
            }

            if ($contador === 3) {
                $success_message = "Registro exitoso";
            }
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
        }
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

<!-- Agrega este bloque para mostrar el mensaje de éxito o error -->
<?php if (isset($success_message)) : ?>
    <div style="color: green;"><?php echo $success_message; ?></div>
<?php endif; ?>

<?php if (isset($error_message)) : ?>
    <div style="color: red;"><?php echo $error_message; ?></div>
<?php endif; ?>

<!-- Resto de tu código HTML -->
<!-- ... -->

</body>
</html>
