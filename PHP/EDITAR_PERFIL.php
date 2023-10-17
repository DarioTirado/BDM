<?php
include("CONEXION.php");
session_start();
$USER = $_SESSION['USER'];

$sql = "SELECT * FROM usuario WHERE CORREO = '$USER'";
$result = mysqli_query($conn,$sql);
while($mostrar=mysqli_fetch_array($result)){
  $username = $mostrar['NOMBRE_USUARIO'];
  $rol = $mostrar['ROL'];
  $correo = $mostrar['CORREO'];
  $nombre= $mostrar['NOMBRE_PERSONAL'];
  $fecha = $mostrar['FECHA_NACIMIENTO'];
  $pass = $mostrar['CONTRASEÑA'];
  $sexo = $mostrar['SEXO'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Register </title>
    <link rel="stylesheet" href="../Login_and_Register/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <div class="wrapper">
        <form method="POST" action="../PHP/ACTUALIZAR_PERFIL.php">
            <h1 >EDITAR</h1>
            <div class="input-box">
                <input type="text" placeholder="Name" name="nombre" required value = "<?=$nombre ?>">
                <i class='bx bxs-user'></i>

            </div>
            <div class="input-box">
                <input type="text" placeholder="Username" name="username" required value = "<?= $username ?>">
                <i class='bx bxs-user'></i>
                <div id="username-message" class="username-message"></div>


            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" required value = "<?=$pass ?>">
                <i class="'bx bxs-lock-alt"></i>
                <div id="password-message" class="password-message"></div>

            </div>
           
       

            <div class="lowerBox">
               

                <p><b>Foto De Perfil</b></p>
                <div class="subirfoto">
                    <p class="texto_foto">Subir Archivo</p>
                    <input type="file" id="fileInput" name="fileInput">
                </div>
                <br>

                <br><p><b>Fecha De Nacimiento</b></p>
                <div>
                    
                    <input class="date" type="date" id="birthdate" name="birthdate" value = "<?=$fecha ?>">
                </div>
                <br>

                <p><b>Sexo</b></p>
                <div class="Sexo">
                    
                    <input type="radio" id="male" name="gender" value="masculino"  <?php if ($sexo === 'masculino') echo 'checked'; ?>>
                    <label for="male">Masculino</label>
                    
                    <input type="radio" id="female" name="gender" value="femenino" <?php if ($sexo === 'femenino') echo 'checked'; ?> >
                    <label for="female">Femenino</label>
                    
                    <input type="radio" id="other" name="gender" value="otro"      <?php if ($sexo === 'otro') echo 'checked'; ?>>
                    <label for="other">Otro</label>
                </div>
                <br>
              
            </div>


            <input class="subirfoto2" type="submit" value="Actualizar">
            
        </form>

    </div>

</body>
</html>