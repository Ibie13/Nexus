<html>
    <head>
        <title>Cadastrando...</title>
    </head>
    <body>
        <?php
            $host="localhost";
            $user="root";
            $pass="";
            $banco="bdnexus2(3)";
            $conexao=mysqli_connect($host, $user, $pass) or die(mysqli_error());
            mysqli_select_db($conexao,$banco) or die(mysqli_error());
        ?>
        
        <?php
           
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $endereco = $_POST['endereco'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $curso = $_POST['curso'];
            $tipo = $_POST['tipo'];
            $cep = $_POST['cep'];
            $vagasT = $_POST['vagasT'];
            $vagasP = $_POST['vagasP'];
       
            $nomeImagem = $_FILES['image']['name'];
            $arquivoImagem = $_FILES['image']['tmp_name'];
            $diretorio = "upload/";
        
            move_uploaded_file($arquivoImagem, $diretorio.$nomeImagem);
        
            $end = $endereco . " - " . $cidade . " - " . $estado;
        
            $end_cod = str_replace(" ", "+", $end);
        
        
            $url = "https://maps.googleapis.com/maps/api/geocode/json?address=$end_cod&key=AIzaSyCoXDDC960vrS1A3b91fqGCAGLnuTUxG08";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $result = json_decode(curl_exec($ch));
            
            $lat;
            $lng;
 
            foreach($result->results as $linha){
                $lat = $linha->geometry->location->lat;
                $lng = $linha->geometry->location->lng;
            }
        
            $sql = mysqli_query($conexao, "INSERT INTO tbcurso(nomeCurso, emailCurso, senhaCurso, nomeImagemCurso, cepCurso, tipo) 
              VALUES('$curso','$email', '$senha','$nomeImagem', '$cep', '$tipo')");
        
            $sql2 = mysqli_query($conexao, "INSERT INTO tblocalizacao(name, address, lat, lng, type) 
               VALUES('$curso','$end', '$lat','$lng', '$tipo')");
        
        $sql4 = mysqli_query($conexao, "SELECT * FROM tbCurso WHERE nomeCurso = '$curso'");
       while($linha = mysqli_fetch_array($sql4)){
           $codCurso = $linha['codCurso'];
        
           
       }
        
        
        $sql3 = mysqli_query($conexao, "INSERT INTO tbvagascurso (codCursoconfirmado,vagasP,vagasR) VALUES ( $codCurso, $vagasT, $vagasP)");
        
        echo $sql3;
        
            echo("Cadastrado com sucesso!"); 
 header("location:loginC.php");
        ?>
    </body>
</html>