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

        $sql2 = "SELECT * FROM usuario WHERE NOMBRE_USUARIO = '$usuario'";
        $result = mysqli_query($conn,$sql2);
        while($mostrar=mysqli_fetch_array($result)){       
          $correo = $mostrar['CORREO'];
        }

        if ($datos = $sql->fetch_assoc() ) {

            session_start();
            $_SESSION['USER'] = $correo;

            $sql3 = "SELECT * FROM usuario WHERE CORREO = '$correo'";
            $result3 = mysqli_query($conn,$sql3);
            while($mostrar=mysqli_fetch_array($result3)){
              $rol = $mostrar['ROL'];
              
            }

            if($rol==="1"){
                header("location:../PHP/HOME_ADMIN.php");
            }else{
            header("location:../HOME/pagInicio.html");
            }

        } else {
            echo "<script>alert('Usario No Encontrado');</script>";
       

        }
        


    }



}







?>
