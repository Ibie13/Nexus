<?php
    $host="localhost";
    $user="root";
    $pass="";
    $banco="bdnexus2(3)";
    $conexao=mysqli_connect($host, $user, $pass, $banco);
?>

<?php
    header("Location: MostarCursosCadastradosAluno.php");
    $codCursoAluno = $_GET['id'];
    
    $sql = mysqli_query($conexao, "DELETE FROM tbCursoAluno WHERE codCursoAluno = $codCursoAluno");
?>