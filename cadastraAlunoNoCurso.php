<?php
    header("Location: home.php");
    $host="localhost";
    $user="root";
    $pass="";
    $banco="bdnexus2(3)";
    $conexao=mysqli_connect($host, $user, $pass, $banco);

    $codCurso = $_GET['id'];
    $codAluno = $_GET['cod'];
    $nomeAluno = $_GET['nome'];
    $emailAluno = $_GET['email'];
    $enderecoAluno = $_GET['endereco'];
    $cpfAluno = $_GET['cpf'];
    $rgAluno = $_GET['rg'];

    $sqli = mysqli_query($conexao, "SELECT vagasP, vagasR FROM tbvagascurso WHERE codCursoconfirmado = $codCurso");
    while($linha = mysqli_fetch_array($sqli)){
        $vagasP = $linha['vagasP'];
        $vagasR = $linha['vagasR'];
    }
    
    $vagasP--;
    $vagasR++;

    $sqle = mysqli_query($conexao, "UPDATE tbvagascurso 
                                    SET vagasP = $vagasP
                                    WHERE codCursoconfirmado = $codCurso");

    $sqlu = mysqli_query($conexao, "UPDATE tbvagascurso 
                                    SET vagasR = $vagasR
                                    WHERE codCursoconfirmado = $codCurso");

    $sql = mysqli_query($conexao, "INSERT INTO tbCursoAluno(codCursoconfirmado, codAluno,nomeAluno,emailAluno,enderecoAluno,cpfAluno,rgAluno) 
              VALUES('$codCurso','$codAluno','$nomeAluno','$emailAluno','$enderecoAluno','$cpfAluno','$rgAluno')");
?>