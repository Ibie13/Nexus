<?php
  include_once("conexao.php");
$sql = mysqli_query($conn, "SELECT * FROM tblogado ");
       while($linha = mysqli_fetch_array($sql)){
           $codCursoTT = $linha['idCursoL'];
       }



$pdo = new PDO('mysql:host=localhost;dbname=bdnexus2(3);port=3306;charset=utf8','root','');
    $sql="SELECT vagasP,vagasR FROM tbvagascurso WHERE codCursoconfirmado = '$codCursoTT'";
$statement =$pdo->prepare($sql);
$statement->execute();





while($results = $statement->fetch(PDO::FETCH_ASSOC)){
           
          $result[] = $results;
           
       }
echo json_encode($result)
?>