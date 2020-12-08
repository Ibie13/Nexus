<?php
    include_once("conexao.php");
    
    $codAluno = $_GET['id'];
    
    $del = mysqli_query($conn, "DELETE FROM tbAluno WHERE codAluno = $codAluno");
 header("location:ADM.php");
?>