<?php
session_start();
session_destroy();
header("location:../Login_and_Register/index.php");
?>