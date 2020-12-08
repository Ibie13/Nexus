<?php
    include_once("conexao.php");
?>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/css.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen" />
    <title> NEXUS </title>



    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

    <link rel="icon" type="image/png" href="img/n.png" />
</head>

<body>
    <br>
        <div style="padding-left:10px" class="logoADM">
            <a href="index.php"><img src="img/nexus3.png"></a> 
        </div>
   <hr>
  <div class="row">
  <div style="border-right : 3px solid lightgray" class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Alunos Cadastrados</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Cursos Pendentes </a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Cursos Cadastrados</a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Logout</a>
        
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
       <div class="table-responsive-md">
          <div id='busca'>
              <form action="ADM.php" class="search" method="get">
                <input style="height:40px" id="txtbusca" name="pesq" type="text" value="" placeholder="Digite o que você procura" />
                <input style="height:40px" id="btnBusca" type="submit" value="Pesquisar"/>
              </form>
          </div>
          
          <?php
            
          ?>
      
        <table class="table">
          <thead>
            <tr>
               
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">CPF</th>
              <th scope="col">RG</th>
              <th scope="col">Nascimento</th>
              <th scope="col">Endereço</th>
              <th scope="col">CEP</th>
               <th scope="col">Remover</th>
            </tr>
      </thead>
      <tbody>  
        <?php
            if(isset($_GET['pesq'])){
                $busca = $_GET['pesq'];
                $sqli = mysqli_query($conn, "SELECT * FROM tbaluno WHERE nome LIKE '$busca'");
                while ($linha = mysqli_fetch_array($sqli)){
                    $codAluno = $linha['codAluno'];
                    $sql = mysqli_query($conn, "SELECT address FROM tblocalizacaoaluno WHERE idLocAluno = $codAluno");
                    while ($linha1 = mysqli_fetch_array($sql)){
                        $enderecoA = $linha1['address'];
                    }
                    echo("<tr>
                        
                        <td><a href='matriculapdf.php?id=$codAluno'>{$linha['nome']}</a></td>
                        <td>{$linha['email']}</td>
                        <td>{$linha['cpf']}</td>
                        <td>{$linha['rg']}</td>
                        <td>{$linha['nascimento']}</td>
                        <td>{$enderecoA}</td>
                        <td>{$linha['cep']}</td>
                        <td><a href='removerAluno.php?id=$codAluno'>Remover</a></td>
                    </tr>");
                }
            } else {
                $sqli = mysqli_query($conn, "SELECT * FROM tbaluno");
                while ($linha = mysqli_fetch_array($sqli)){
                    $codAluno = $linha['codAluno'];
                    $sql = mysqli_query($conn, "SELECT address FROM tblocalizacaoaluno WHERE idLocAluno = $codAluno");
                    while ($linha1 = mysqli_fetch_array($sql)){
                        $enderecoA = $linha1['address'];
                    }
                    echo("<tr>
                        
<td><a href='matriculapdf.php?id=$codAluno'>{$linha['nome']}</a></td>
                        <td>{$linha['email']}</td>
                        <td>{$linha['cpf']}</td>
                        <td>{$linha['rg']}</td>
                        <td>{$linha['nascimento']}</td>
                        <td>{$enderecoA}</td>
                        <td>{$linha['cep']}</td>
    <td>
      <a href='removerAluno.php?id=$codAluno'>
        <img style='width:30px' src='img/lixo.png' />
      </a>
    </td>
                    </tr>");
                }
            }
        ?>

                </tbody>
                
           </table>
           <form id="form1" name="form1" method="get" action="alunopdf.php">


 <label>
          <br />
          <center>
          
          <input style="background-image: linear-gradient( 135deg, #dc4588 10%, #440099 100%);border:none;color:#fff;border-radius: 20px;font-size:20px;width:80px" type="submit" name="Pesquisar" id="Pesquisar" type="submit" name="Pesquisar" id="Pesquisar" value="PDF"/>
          
          
          </center>
        </label>
      </form>
       </div>
    </div>
    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    
         <div class="table-responsive-md">
         <div id='busca'>
             <form action="ADM.php" class="search" method="get">
                    <input style="height:40px" id="txtbusca" name="q" type="text" value="" placeholder="Digite o que você procura" />
                    <input style="height:40px" id="btnBusca" type="submit" value="Pesquisar"/>
             </form>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">-</th>
              <th scope="col"> Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Senha</th>
              <th scope="col">CEP</th>
              <th scope="col">Remover</th>
              <th scope="col">Confirmar</th>

            </tr>
          </thead>
          <tbody>
            <?php
              if(isset($_GET['q'])){
                  $busca = $_GET['q'];
                  $sqli = mysqli_query($conn, "SELECT * FROM tbcurso WHERE nomeCurso LIKE '$busca'");
                  while ($linha = mysqli_fetch_array($sqli)){
                      $codCurso = $linha['codCurso'];
                       $nomeCurso = $linha['nomeCurso'];
                      echo("<tr>
                          <th scope='row'>{$linha['codCurso']}</th>
                          <td>{$linha['nomeCurso']}</td>
                          <td>{$linha['emailCurso']}</td>
                          <td>{$linha['senhaCurso']}</td>
                          <td>{$linha['cepCurso']}</td>
                          <td><a href='removerCurso.php?id=$codCurso'>Remover</a></td>
                          <td><a href='confirmarCurso.php?nome=$nomeCurso'>Confirmar</a></td>
                      </tr>");
                  }
              } else {
                  $sqli = mysqli_query($conn, "SELECT * FROM tbcurso");
                  while ($linha = mysqli_fetch_array($sqli)){
                      $codCurso = $linha['codCurso'];
                      $nomeCurso = $linha['nomeCurso'];
                      echo("<tr>
                          <th scope='row'>{$linha['codCurso']}</th>
                          <td>{$linha['nomeCurso']}</td>
                          <td>{$linha['emailCurso']}</td>
                          <td>{$linha['senhaCurso']}</td>
                          <td>{$linha['cepCurso']}</td>
                          <td>
                            <a href='removerCurso.php?id=$codCurso'>
                              <img style='width:30px' src='img/lixo.png' />
                            </a>
                          </td>
                           <td>
                              <a href='confirmarCurso.php?nome=$nomeCurso'>
                                  <img style='width:30px' src='img/sim.png' />
                              </a>
                          </td>
                      </tr>");
                  }
              }
            ?>
          </tbody>
        </table>
        
       
        </div>
        </div>
        
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
         <div class="table-responsive-md">
         <div id='busca'>
             <form action="ADM.php" class="search" method="get">
                    <input style="height:40px" id="txtbusca" name="q" type="text" value="" placeholder="Digite o que você procura" />
                    <input style="height:40px" id="btnBusca" type="submit" value="Pesquisar"/>
             </form>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">-</th>
              <th scope="col"> Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Senha</th>
              <th scope="col">CEP</th>
              <th scope="col">Remover</th>

            </tr>
          </thead>
          <tbody>
            <?php
              if(isset($_GET['q'])){
                  $busca = $_GET['q'];
                  $sqli = mysqli_query($conn, "SELECT * FROM tbcursoconfirmado WHERE nomeCursoC LIKE '$busca'");
                  while ($linha = mysqli_fetch_array($sqli)){
                      $codCurso = $linha['codCursoconfirmado'];
                      echo("<tr>
                          <th scope='row'>{$linha['codCursoconfirmado']}</th>
                          <td>{$linha['nomeCursoC']}</td>
                          <td>{$linha['emailCursoC']}</td>
                          <td>{$linha['senhaCursoC']}</td>
                          <td>{$linha['cepCursoC']}</td>
                          <td><a href='removerCurso.php?id=$codCurso'>Remover</a></td>
                      </tr>");
                  }
              } else {
                  $sqli = mysqli_query($conn, "SELECT * FROM tbcursoconfirmado");
                  while ($linha = mysqli_fetch_array($sqli)){
                      $codCurso = $linha['codCursoconfirmado'];
                      echo("<tr>
                          <th scope='row'>{$linha['codCursoconfirmado']}</th>
                          <td>{$linha['nomeCursoC']}</td>
                          <td>{$linha['emailCursoC']}</td>
                          <td>{$linha['senhaCursoC']}</td>
                          <td>{$linha['cepCursoC']}</td>
                          <td>
                              <a href='removerCurso.php?id=$codCurso'>
                                  <img style='width:30px' src='img/lixo.png' />
                              </a>
                          </td>
                      </tr>");
                  }
              }
            ?>
          </tbody>
        </table>
         <form id="form1" name="form1" method="get" action="cursosCpdf.php">


 <label>
          <br>
          <center>
          
          <input style="background-image: linear-gradient( 135deg, #dc4588 10%, #440099 100%);border:none;color:#fff;border-radius: 20px;font-size:20px;width:80px" type="submit" name="Pesquisar" id="Pesquisar" value="PDF"/>
          
          
          </center>
        </label>
      </form>
        </div>
     </div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
      <?php echo("<a class='nav-link' id='v-pills-settings-tab' data-toggle='pill' role='tab' aria-controls='v-pills-settings' aria-selected='false'><a href='logout.php'> Logout</a></a>")?>
      </div>
    </div>
  </div>
</div>

   


    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="JS/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
