<?php 
   include("../PHP/CONEXION.php");

   session_start(); //se reanuda la sesion existente
   $USER = $_SESSION['USER'];
 
 if($USER == null || $USER ==''){
   header("location:../PHP/ERROR_AUTENTICACION.php");
 die();
 }
 
 $consulta = "SELECT * FROM usuario WHERE CORREO = '$USER'";
 $resultado = mysqli_query($conn,$consulta);
 
 if($resultado && mysqli_num_rows($resultado) > 0){
   while($row = $resultado->fetch_array()){
       $unique_id = $row['unique_id'];
       
   }
 }
 

        $outgoing_id = $unique_id;
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    


    
?>