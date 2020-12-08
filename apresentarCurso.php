<?php
    $host="localhost";
    $user="root";
    $pass="";
    $banco="bdnexus2(3)";
    $conexao=mysqli_connect($host, $user, $pass, $banco);
?>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/css.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen" />
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      /*#map {
        height: 60%;
        width: 75%;
      }
        
        .new{
            margin-left: 45px;
            height: 70%;
            width: 35%;
        }*/
    </style>
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
                    <li> <br><a href="MostarCursosCadastradosAluno.php">Seus Cadastros </a> </li>
                    <li> <br> <a href="#">Contatos da empresa</a> </li>
                    <li> <br><a href="destroy.php">Logout</a> </li>
                    <li> <br><a href="#">
                            <div class="logo1"> <img src="img/kisspng-computer-icons-user-social-media-clip-art-5b011d2a069902.png"></div>
                        </a> </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="mostrarCurso">
<div class="textoCurso">
    <?php
       $codCurso = $_GET["id"];
       $codAluno = $_GET["cod"];
       $sqla = mysqli_query($conexao, "SELECT nomeCursoC FROM tbCursoconfirmado WHERE codCursoconfirmado = $codCurso");
       while($linha = mysqli_fetch_array($sqla)){
           echo($linha['nomeCursoC']);
       }
       
    ?>
       
   </div>
       <div class="logoCurso"> 
           <?php
           $sqle = mysqli_query($conexao, "SELECT nomeImagemCursoC FROM tbCursoconfirmado WHERE codCursoconfirmado = $codCurso");
           while($linha = mysqli_fetch_array($sqle)){
                echo("<img src='upload/{$linha['nomeImagemCursoC']}'>");
           }
        ?>
    <br>
       <br>
       
            </div>
            
            
<div  class="textoCurso2"> 
  Cuso preparatório para vestibular da USP, curso apresenta vagas limitas, criado para pessoas que estão no 3° ano do ensino médio.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sodales nisl lorem, vel ornare augue rutrum pulvinar. Curabitur id euismod arcu. Etiam fringilla mollis ultricies. Donec eleifend odio odio, non rutrum tellus mollis nec. Duis nisi urna, posuere eget turpis quis, posuere sodales enim. Nam eget imperdiet quam. Mauris diam mi, dapibus vitae consectetur
  <br>
  <br>
  <?php
      $sqlo = mysqli_query($conexao, "SELECT emailCursoC FROM tbCursoconfirmado WHERE codCursoconfirmado = $codCurso");
      while($linha = mysqli_fetch_array($sqlo)){
        echo("Email: {$linha['emailCursoC']} <br>");
      }
      $sqli = mysqli_query($conexao, "SELECT address FROM tblocalizacaoconfirmada WHERE id = $codCurso"); 
      while($linha = mysqli_fetch_array($sqli)){
        echo("Endereço: {$linha['address']} <br>");
      }
  ?>
    
<?php
  
    $latC;
    $lngC;
    $latA;
    $lngA;
    $tempo;
    
    $sql1 = mysqli_query($conexao, "SELECT lat, lng FROM tblocalizacaoconfirmada where id = $codCurso");
    while($linha = mysqli_fetch_array($sql1)){
        $latC = $linha['lat'];
        $lngC = $linha['lng'];
      }
    $sql2 = mysqli_query($conexao, "SELECT lat, lng FROM tblocalizacaoaluno where idLocAluno = $codAluno");
    while($linha = mysqli_fetch_array($sql2)){
        $latA = $linha['lat'];
        $lngA = $linha['lng'];
      }
    
    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$latA,$lngA&destinations=$latC,$lngC&key=AIzaSyCoXDDC960vrS1A3b91fqGCAGLnuTUxG08";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = json_decode(curl_exec($ch));
    
    
    foreach($result->rows as $linha){
        $tempo = $linha->elements[0]->duration->text;
    }
    
    echo("Este curso está a " .$tempo. " de você");
?>
    
  <br>
   <?php
    
    $sql = mysqli_query($conexao, "SELECT * FROM tbAluno WHERE codAluno = '$codAluno'");
       while($linha = mysqli_fetch_array($sql)){
           
        
           
               $nomeA=  $linha['nome'];
                 
                 $emailA= $linha['email'];
           $cpfA = $linha['cpf'];
                  $rgA = $linha['rg'];
           
       }
    
    $sql = mysqli_query($conexao, "SELECT * FROM tblocalizacaoaluno WHERE idLocAluno = '$codAluno'");
    while($linha = mysqli_fetch_array($sql)){
        $enderecoA = $linha['address'];   
    }
    
        echo("<a href = 'cadastraAlunoNoCurso.php?id=$codCurso&cod=$codAluno&nome=$nomeA&email=$emailA&endereco=$enderecoA&cpf=$cpfA&rg=$rgA'><button type='button' class='btn btn-success'>Cadastrar-se </button></a>");
   ?>
   
  </div>
 
   
   <div class="mapaCurso">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.427536715609!2d-46.40178508595637!3d-23.553083684687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce65086d4d2757%3A0x20136740b8febae8!2sR.%20Fel%C3%ADciano%20de%20Mendon%C3%A7a%2C%20290%20-%20Jardim%20Sao%20Paulo(Zona%20Leste)%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2008460-365!5e0!3m2!1spt-BR!2sbr!4v1601593664251!5m2!1spt-BR!2sbr" width="350" height="180" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
       
       
         
        </div>
        
<!--<div class = "new"> <div  class="w-100 p-3" id="map"></div> </div>

<script>
  var customLabel = {
    restaurant: {
      label: 'R'
    },
    bar: {
      label: 'B'
    }
  };

    function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: new google.maps.LatLng(-23.552815, -46.399684),
      zoom: 10
    });
    var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP or XML file
      downloadUrl('result.php', function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('tblocalizacaoconfirmada');
        Array.prototype.forEach.call(markers, function(markerElem) {
          var id = markerElem.getAttribute('id');
          var name = markerElem.getAttribute('name');
          var address = markerElem.getAttribute('address');
          var type = markerElem.getAttribute('type');
          var point = new google.maps.LatLng(
              parseFloat(markerElem.getAttribute('lat')),
              parseFloat(markerElem.getAttribute('lng')));

          var infowincontent = document.createElement('div');
          var strong = document.createElement('strong');
          strong.textContent = name
          infowincontent.appendChild(strong);
          infowincontent.appendChild(document.createElement('br'));

          var text = document.createElement('text');
          text.textContent = address
          infowincontent.appendChild(text);
          var icon = customLabel[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            label: icon.label
          });
          marker.addListener('click', function() {
            infoWindow.setContent(infowincontent);
            infoWindow.open(map, marker);
          });
        });
      });
    }



  function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
      if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request, request.status);
      }
    };

    request.open('GET', url, true);
    request.send(null);
  }

  function doNothing() {}
</script>
<script defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoXDDC960vrS1A3b91fqGCAGLnuTUxG08&callback=initMap">
</script>-->
   
   
    </div>



    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="JS/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
