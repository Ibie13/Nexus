<?php
header("location:index.php");
 session_start();
   unset( $_SESSION['email']);
    unset( $_SESSION['senha']);
session_destroy();
?>
