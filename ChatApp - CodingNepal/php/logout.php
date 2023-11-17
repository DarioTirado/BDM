<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pruebaphp";
        
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        else
        {
         
        }

        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "0";
            $sql = mysqli_query($conn, "UPDATE usuario SET Estado = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
        }else{
            header("location: ../users.php");
        }
    }else{  
        header("location: ../login.php");
    }
?>