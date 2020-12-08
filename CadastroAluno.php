<?php 

include_once("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$sexo = $_POST['sexo'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$nascimento = $_POST['nascimento'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$rendaPropia = $_POST['rendaPropia'];
$renda = $_POST['renda'];
$cor = $_POST['Cor'];

 $nomeImagem = $_FILES['image']['name'];
 $arquivoImagem = $_FILES['image']['tmp_name'];
 $diretorio = "upload/";

/*echo($nomeImagem);*/

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

$sql = mysqli_query($conn, "INSERT INTO tblocalizacaoaluno(name, address, lat, lng) 
    VALUES('$nome','$end', '$lat','$lng')");

$result_usuario= "INSERT INTO tbaluno(nome,email,alunoSenha,sexo,cpf,rg,nascimento,cep,imgAluno,rendaPropia,renda,cor)
VALUES('$nome','$email','$senha','$sexo','$cpf','$rg','$nascimento','$cep','$nomeImagem','$rendaPropia','$renda','$cor')";
/*echo $result_usuario;*/
$result_usuario=mysqli_query($conn,$result_usuario);

header("Location:login.php");
?>
