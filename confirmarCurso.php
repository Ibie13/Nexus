<?php
header("location:ADM.php");
    include_once("conexao.php");
    
  $codCurso = $_GET['nome'];

 $sql = mysqli_query($conn, "SELECT * FROM tbCurso WHERE nomeCurso = '$codCurso'");
       while($linha = mysqli_fetch_array($sql)){
           
           $codCursoC = $linha['codCurso'];
        
           
               $nomeCursoC=  $linha['nomeCurso'];
                 
                 $emailCursoC= $linha['emailCurso'];
                $senhaCursoC = $linha['senhaCurso'];
           $nomeImagemCusoC = $linha['nomeImagemCurso'];
                  $cepCursoC = $linha['cepCurso'];
           
       }
$sql = mysqli_query($conn, "SELECT * FROM tblocalizacao WHERE name = '$codCurso'");
       while($linha = mysqli_fetch_array($sql)){
           
           $name = $linha['name'];
      
           
               $address =  $linha['address'];
                  
                 $lat = $linha['lat'];
                $lng = $linha['lng'];
                  $type = $linha['type'];
           
       }




$sql = mysqli_query($conn, "INSERT INTO tbcursoconfirmado(nomeCursoC, emailCursoC, senhaCursoC, nomeImagemCursoC, cepCursoC, tipo) 
              VALUES('$nomeCursoC','$emailCursoC', '$senhaCursoC','$nomeImagemCusoC', '$cepCursoC', '$type')");
        
            $sql2 = mysqli_query($conn, "INSERT INTO tblocalizacaoconfirmada(name, address, lat, lng, type) 
               VALUES(' $name','$address', '$lat','$lng', ' $type')");



    
 
?>
