<?php
    header("location:ADM.php");
    include_once("conexao.php");
    
    $codCurso = $_GET['id'];
    
    $del = mysqli_query($conn, "DELETE FROM tbCurso WHERE codCurso = $codCurso");
    $del2 = mysqli_query($conn, "DELETE FROM tbLocalizacao WHERE id = $codCurso");
?>