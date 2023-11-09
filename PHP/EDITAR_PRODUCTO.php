<?php
 include("CONEXION.php");
 session_start();
 $USER = $_SESSION['USER'];


 $id = $_POST["id"] ?? null;
$sql = "SELECT * FROM productos WHERE ID_PRODUCTO = '$id'";
$result = mysqli_query($conn,$sql);
while($mostrar=mysqli_fetch_array($result)){
  $nombre = $mostrar['NOMBRE'];
  $descripcion = $mostrar['DESCRIPCION'];
  $fkcategoria = $mostrar['FK_CATEGORIA'];
  $precio= $mostrar['PRECIO'];
  $cantidad = $mostrar['CANTIDAD'];
  $estado = $mostrar['ESTADO'];
  $video = $mostrar['VIDEO'];
}


$query2="SELECT ID_CATEGORIA, NOMBRE FROM categoria";
$resultcat = mysqli_query($conn, $query2);
if (!$resultcat) {
  echo "Error en la consulta: " . mysqli_error($conn);
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
   
</head>

<body>

    <div class="wrapper">
        <form method="POST" action="../PHP/ACTUALIZAR_PRODUCTO.php">
            <h1 >EDITAR</h1>
            <div class="input-box">
                 <input type="hidden" placeholder="id" name="id" required value = "<?=$id ?>">
                <p><b>Nombre De El Producto</b></p>
                <input type="text" placeholder="Nombre" name="nombre" required value = "<?=$nombre ?>">
                <i class='bx bxs-user'></i>

            </div>
            <div class="input-box">
            <p><b>Descripcion</b></p>
                <input type="text" placeholder="Descripcion" name="descripcion" required value = "<?=$descripcion ?>">
                <i class='bx bxs-user'></i>
                <div id="username-message" class="username-message"></div>


            </div>
            <div class="input-box">
            <p><b>Precio</b></p>
                <input type="text" placeholder="Precio" name="precio" required value = "<?=$precio ?>$">
                <i class="'bx bxs-lock-alt"></i>
                <div id="password-message" class="password-message"></div>

            </div>
            <div class="input-box">
            <p><b>Cantidad</b></p>
                <input type="text" placeholder="Cantidad" name="cantidad" required value = "<?=$cantidad ?>">
                <i class="'bx bxs-lock-alt"></i>
                <div id="password-message" class="password-message"></div>

            </div>
          
            <p><b>Estado</b></p>
                <div class="Sexo">
                <label for="activo">Activo</label>
                    <input type="radio" id="activo" name="actividad" value="activo"  <?php if ($estado === '1') echo 'checked'; ?>>  
                    <label for="inactivo">Inactivo</label>
                    <input type="radio" id="inactivo" name="actividad" value="inactivo" <?php if ($estado === '2') echo 'checked'; ?> >    
                    
                </div>
                <br>
           
          <p><b>Categoria</b></p>
                <select class="select-style" name="my_select2">
                        <?php
                        while ($filacat = mysqli_fetch_assoc($resultcat))  {
                            $id_categoria = $filacat['ID_CATEGORIA'];
                            $nombre_categoria = $filacat['NOMBRE'];
                            $selected = ($id_categoria == $fkcategoria) ? 'selected' : '';

                            echo "<option value='$id_categoria' $selected>$nombre_categoria</option>";
                        }
                            ?>    
                </select> 
           
            <div class="lowerBox">
               

                <p><b>Fotos</b></p>
                <div class="subirfoto">
                    <p class="texto_foto">Subir Archivo</p>
                    <input type="file" id="fileInput" name="fileInput">
                </div>
                <br>

              
                <br>

             
              
            </div>


            <input class="subirfoto2" type="submit" value="Actualizar">
           
            
        </form>

    </div>

</body>
</html>