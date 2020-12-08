<?php
    include_once("conexao.php");
    
    $logado = $_GET['cod'];
    
    $del = mysqli_query($conn, "DELETE FROM tblogado WHERE idCursoL = $logado");
 header("location:index.php");
?>