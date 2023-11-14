<?php
include("../PHP/CONEXION.php");

if (!empty($_POST["BTN_INGRESAR"])) {
    if (empty($_POST["user"]) || empty($_POST["pass"])) {
        echo "Campos Vacíos";
    } else {
        $usuario = $_POST["user"];
        $password = $_POST["pass"];

        // Utilizar sentencia preparada para evitar inyección SQL
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE NOMBRE_USUARIO = ? AND CONTRASEÑA = ?");
        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $datos = $result->fetch_assoc();

            session_start();
            $_SESSION['ID_USUARIO'] = $datos['ID_USUARIO']; // Agregamos el ID_USUARIO a la sesión
            $_SESSION['USER'] = $datos['CORREO'];

            $rol = $datos['ROL'];

            if ($rol === "1") {
                header("location:../PHP/HOME_ADMIN.php");
                exit;
            } else {
                header("location:../HOME/pagInicio.html");
                exit;
            }
        } else {
            echo "<script>alert('Usuario No Encontrado');</script>";
        }
    }
}
?>
