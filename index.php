<?php
    $host="localhost";
    $user="root";
    $pass="";
    $banco="bdnexus2(3)";
    $conexao=mysqli_connect($host, $user, $pass, $banco);
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
        height: 75%;       
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

                    <li> <br> <a href="#cursos">Cursos Próximos</a> </li>
                    <li> <br><a href="#">Sobre os Cursos</a> </li>
                    <li> <br><a href="cadastroCurso.php">Cadastar curso </a> </li>
                    <li> <br> <a href="#">Contatos da empresa</a> </li>
                    <li> <br><a href="#">Login</a>
                      <div class="btn-group">
                              <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="login.php">Login Aluno</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="loginC.php">Login Curso</a>
                              </div>
                            </div>
                    </li>
                    <li> <br><a href="#">
                            <div class="logo1"> <img src="img/kisspng-computer-icons-user-social-media-clip-art-5b011d2a069902.png"></div>
                        </a> </li>
                </ul>
            </nav>
        </div>
    </div>
  
<a href="cadastro.php">
<div class="baner">
        <picture>
            <source media="(max-width:400px)" srcset="img/web6menor.jpg">
            <source media="(min-width:769px)" srcset="img/web6.jpg">
            <img src="img/web6menor.jpg">
        </picture>
    </div>
 </a> 
<div  class="w-100 p-3" style="background-color:#440099" class="container" >
    <div class="row">
        <div class="col-md-12">
            <br>
            <br>
            <h2 style="color:#ffc72c;"><b>Cursos</b></h2>
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0" style="align:center">
                <!-- Carousel indicators -->

                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                    <div class="item carousel-item active">
                        <div class="row">
                                <?php
                                    $sql = mysqli_query($conexao, "SELECT codCursoconfirmado, nomeImagemCursoC, nomeCursoC FROM tbCursoConfirmado WHERE codCursoconfirmado <= 4");
                                    while($linha = mysqli_fetch_assoc($sql)){ 
                                            $nomeCurso = $linha['nomeCursoC'];?>
                                            <div class="col-sm-3">
                                                <div class="thumb-wrapper">
                                                    <div class="img-box">
                                                        <img src = "upload/<?php echo $linha['nomeImagemCursoC'];?>" class="img-responsive img-fluid" alt="">
                                                    </div>
                                                    <div class="thumb-content">
                                                        <h4><?php echo $linha['nomeCursoC'];?></h4> <?php
                                                        echo("<a href='apresentarCurso.php?id=$nomeCurso' class='btn btn-primary'>Saiba Mais</a>"); ?>
                                                    </div>
                                                </div>
                                            </div> <?php
                                     } ?>

                            </div> 
                    </div>

             
                        
                        <div class="item carousel-item">
                            <div class="row">
                                <?php
                                    $sql = mysqli_query($conexao, "SELECT codCursoconfirmado, nomeImagemCursoC, nomeCursoC FROM tbCursoConfirmado WHERE codCursoconfirmado >= 5 AND codCursoconfirmado <= 8");
                                    while($linha = mysqli_fetch_assoc($sql)){ 
                                            $nomeCurso = $linha['nomeCursoC'];?>
                                            <div class="col-sm-3">
                                                <div class="thumb-wrapper">
                                                    <div class="img-box">
                                                        <img src = "upload/<?php echo $linha['nomeImagemCursoC'];?>" class="img-responsive img-fluid" alt="">
                                                    </div>
                                                    <div class="thumb-content">
                                                        <h4><?php echo $linha['nomeCursoC'];?></h4>
                                                        <a href="apresentarCurso.php?id=$nomeCurso" class="btn btn-primary">Saiba Mais</a>
                                                    </div>
                                                </div>
                                            </div> <?php
                                } ?>
                             </div>
                    </div>

                            <!--<div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="../img/b1.jpg" class="img-responsive img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Livro Psicose</h4>
                                        <p class="item-price"><span>R$ 35,00</span></p>

                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="../img/c1.jpg" class="img-responsive img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>POP!Funko Homem-Aranha</h4>
                                        <p class="item-price"><span>R$ 89,00</span></p>

                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="../img/d1.jpg" class="img-responsive img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Luminária Estrela da Morte</h4>
                                        <p class="item-price"><span>R$ 50,00</span></p>

                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <div class="item carousel-item">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="../img/a2.jpg" class="img-responsive img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Camiseta Resident Evil</h4>
                                        <p class="item-price"><span>R$ 59,00</span></p>

                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="../img/b2.jpg" class="img-responsive img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Livro Donnie Darko</h4>
                                        <p class="item-price"><span>R$ 29,89</span></p>

                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="../img/c2.jpg" class="img-responsive img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>POP!Funko Kylo Ren</h4>
                                        <p class="item-price"><span>R$ 99,00</span></p>

                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="../img/d2.jpg" class="img-responsive img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Porta-Chave GdG</h4>
                                        <p class="item-price"><span>R$ 37,30</span></p>

                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item carousel-item">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="../img/a3.jpg" class="img-responsive img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Camiseta Godzilla</h4>
                                        <p class="item-price"> <span>R$ 43,30</span></p>

                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="../img/b3.jpg" class="img-responsive img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Livro Hellraiser</h4>
                                        <p class="item-price"><span>R$ 35,00</span></p>

                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="../img/c3.jpg" class="img-responsive img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>POP!Funko Charmander</h4>
                                        <p class="item-price"><span>R$ 81,00</span></p>

                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="thumb-wrapper">
                                    <div class="img-box">
                                        <img src="../img/d4.jpg" class="img-responsive img-fluid" alt="">
                                    </div>
                                    <div class="thumb-content">
                                        <h4>Almofada Pickle Rick</h4>
                                        <p class="item-price"><span>R$ 60,00</span></p>

                                        <a href="#" class="btn btn-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
                <!-- Carousel controls -->
                <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
    </div>
    <p id="cursos"></p>
 <div  class="w-100 p-3" id="map"></div>

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
      downloadUrl('resultado.php', function(data) {
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
</script>
    















<!--<div id = "carousel" class = "carousel slide" data-ride = "carousel">
    <ol class = "carousel-indicators">
        <?php
            /*$ativo = 1;
            $numero = 1;
            $sql = mysqli_query($conexao, "SELECT nomeImagemCurso FROM tbCurso WHERE codCurso <= 15");
            if(!$sql){
                die(mysqli_error());
            }
            while($linha = mysqli_fetch_assoc($sql)){ 
                if ($ativo ==1) {?>
                    <li data-target = "#carousel" data-slide-to = "0" class = "active"></li> <?php
                    $ativo = 0;
                }else{ ?>
                   <li data-target = "#carousel" data-slide-to = "<?php echo $numero; ?>"></li> <?php
                    $numero++;    
                }
                
            }*/
        ?>  
    </ol>
    <div class = "carousel-inner">
        <?php
            /*$ativo = 1;
            $sql = mysqli_query($conexao, "SELECT nomeImagemCurso FROM tbCurso WHERE codCurso <= 15");
            while($linha = mysqli_fetch_assoc($sql)){ 
                if ($ativo ==1) {?>
                    <div class = "carousel-item active">
                        <img src = "upload/<?php echo $linha['nomeImagemCurso'];?>" class = "img-fluid d-block">
                    </div> <?php
                    $ativo = 0;
                }else{ ?>
                    <div class = "carousel-item">
                        <img src = "upload/<?php echo $linha['nomeImagemCurso'];?>" class = "img-fluid d-block">
                    </div> <?php
                }
                
            }*/
        ?>
    </div>
    <a class = "carousel-control-prev" href = "#carousel" role = "button" data-slide = "prev">
        <span class = "carousel-control-prev-icon"></span>
        <span class = "sr-only">Anterior</span>
    </a>
    <a class = "carousel-control-next" href = "#carousel" role = "button" data-slide = "next">
        <span class = "carousel-control-next-icon"></span>
        <span class = "sr-only">Avançar</span>
    </a>
</div>-->

<img src="img/rodape6.jpg">

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="JS/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>