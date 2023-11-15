<?php
include("CONEXION.php");
session_start();
$USER = $_SESSION['USER'];

$id_lista = $_POST["idlista"] ?? null;
$nombre = $_POST["nombrelista"] ?? null;
$descripcionlista = $_POST["descripcionlista"] ?? null;

if($nombre==null){
    echo"mamaste";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Font awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
     <!-- Font Gilroy -->
     
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <!-- Plyr CSS -->
     <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css">    <link href="../CONSULTA_PEDIDOS/CONSULTA_PEDIDOS_ESTILO.css" rel="stylesheet">
    <title>LISTA</title>
</head>
<body>
    
<h1 class="titulo"><?php echo $nombre; ?></h1>
<h1 class="titulo"><?php echo $descripcionlista; ?></h1>
<div class="container2">
  <form method="POST" class="date-form">
      <div class="form-row">
         
          <div class="col">
              <a href="../PHP/profile.PHP"  style="width: 200px;" class="btn btn-primary"> VOLVER</a>
          </div>
      </div>
  </form>
</div>

<form id="form1" action="OBTENER_PRODUCTOS_LISTA.php" method="post">
        <input type="hidden" id="IDLISTA" placeholder="Dato 1 Formulario 1" value="<?php echo $id_lista; ?>">
    </form>

<div class="pedidos" id="pedidos">

</div>






</body>
<script src="../JAVASCRIPT/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="../JAVASCRIPT/AJAX_INFO_LISTA.js"></script>
</html>