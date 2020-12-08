<?php
    $host="localhost";
    $user="root";
    $pass="";
    $banco="bdnexus2(3)";
    $conexao=mysqli_connect($host, $user, $pass, $banco);
?>

<?php
session_start();
if(!isset($_SESSION["email"]) and !isset($_SESSION["senha"])) {
    header("location: index.php");
    exit;
} else {
}
?>

<html lang="pt-br">

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <!--<title>Using MySQL and PHP with Google Maps</title>-->
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 60%;
        width: 75%;
      }
    
      #carousel {
        width: 100%;
        }
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/css2.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/css.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title> NEXUS </title>


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
<link rel="icon" type="image/png" href="img/n.png" />

</head>

<body>
    <div class="container">
        <div class="content-header">
            <div class="logo">
               <a href="index.php"><img src="img/nexus3.png"></a> 
            </div>
            <button class="open-nav">
                <span class="line line_1"></span>
                <span class="line line_2"></span>
                <span class="line line_3"></span>
            </button>
            <nav class="menu">
                <ul class="list-menu">

                    <li> <br> <a href="home.php">Cursos Próximos</a> </li>
                    <li> <br><a href="#">Sobre os Cursos</a> </li>
                    <li> <br><a href="cadastroCurso.php">Seus Cadastros </a> </li>
                    <li> <br> <a href="#">Contatos da empresa</a> </li>
                    <li> <br><a href="destroy.php">Logout</a> </li>
                    <li> <br><a href="#">
                            <div class="logo1"> <img src="img/kisspng-computer-icons-user-social-media-clip-art-5b011d2a069902.png"></div>
                        </a> </li>
                </ul>
            </nav>
        </div>
    </div>
<hr>  
<br><br> 
   
    <?php
  $lala = $_SESSION['email'];
    
  
      
    
    
    $sql2 = mysqli_query($conexao, "SELECT codAluno, nome FROM tbaluno WHERE email = '$lala'  ");
       while($linha = mysqli_fetch_array($sql2)){
           $codAluno = $linha['codAluno'];
           $busca = $linha['nome'];
       }
    
   
    
    ?>
     
     <h2 style="color:#440099;"><br><br> Cursos que você se cadastrou</h2>
      <br>
      <br>
      <br>
<div style="width: 50%;height:50%; position: relative;
    left: 25%;
   ">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Endereco</th>
      <th scope="col">Remover</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $sqle = mysqli_query($conexao, "SELECT codCursoAluno, codCursoconfirmado FROM tbCursoAluno WHERE codAluno = $codAluno");
        while($linha1 = mysqli_fetch_array($sqle)){
            $codCurso = $linha1['codCursoconfirmado'];
            $codCursoAluno = $linha1['codCursoAluno'];
            $sql = mysqli_query($conexao, "SELECT nomeCursoC FROM tbcursoconfirmado WHERE codCursoconfirmado = $codCurso");
            while($linha = mysqli_fetch_array($sql)){
                $sqli = mysqli_query($conexao, "SELECT address FROM tblocalizacaoconfirmada WHERE id = $codCurso");
                while ($linha2 = mysqli_fetch_array($sqli)){
                    $enderecoC = $linha2['address'];
                }
                echo("<tr>
                  <th scope='row'>{$codCurso}</th>
                  <td>{$linha['nomeCursoC']}</td>
                  <td>{$enderecoC}</td>
                  <td><a href='removeAlunoDoCurso.php?id=$codCursoAluno'>
                    <img style='width:30px' src='img/lixo.png' />
                  </a></td>
                </tr>");
            }
        }
    ?>
  </tbody>
</table>
    
    
</div>
   
   
    
<img src="img/rodape6.jpg">

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="JS/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>