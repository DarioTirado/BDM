<?php
include("../PHP/CONEXION.php");

if(!empty($_POST["BTN_INGRESAR"])){
    if(empty($_POST["user"]) and empty($_POST["pass"])) {

        echo"Campos Vacios";
    }
    else{
        $usuario = $_POST["user"];
        $password = $_POST["pass"];

        $sql = $conn->query("SELECT * FROM usuario WHERE NOMBRE_USUARIO = '$usuario' and CONTRASEÑA = '$password'");
        if ($datos = $sql->fetch_assoc() ) {
            header("location:../HOME/pagInicio.html");
            

        } else {
            echo "<script>alert('Usario No Encontrado');</script>";
       

        }
        


    }



}







?>
