<?php
	$host="localhost";
	$user="root";
	$pass="";
	$banco="bdnexus2(3)";
	$conexao=mysqli_connect($host, $user, $pass) or die(mysqli_error());
	mysqli_select_db($conexao,$banco) or die(mysqli_error());
	$email=$_GET['email'];
	$senha=$_GET['senha'];

 $sql = mysqli_query($conexao, "SELECT *FROM tbCursoconfirmado WHERE emailCursoC = '$email' ");
       while($linha = mysqli_fetch_array($sql)){
          $codCurso = $linha['codCursoconfirmado'];
       }
 

?>
<html>
    <head>
        <link rel="shortcut icon" href="../imagem/logo.png" style="height:200px;">
            <title>Autenticando...</title>
            <script type="text/javascript">
                function loginsuccessfully() {
                    
                    <?php
                    $sql2 = mysqli_query($conexao, "INSERT INTO tblogado(idCursoL) 
               VALUES('$codCurso')");
                    
                    header("location:curso.php?cod=$codCurso&
                    ");
                    
                    
                   ?>
                    
                }

                function loginfailed() {
                    setTimeout("window.location='login.php'", 5000);
                }
            </script>
    </head>
    <body>
     <?php
        if($sql = mysqli_query ($conexao, "SELECT * FROM tbcurso WHERE emailCurso = '$email' AND senhaCurso = '$senha'") or die (mysqli_error($conexao))){;
            
			$row = mysqli_num_rows($sql);
			if($row > 0) {
				session_start();
				$_SESSION['emailCurso']=$_GET['email'];
				$_SESSION['senhaCurso']=$_GET['senha'];
				echo("Você logou com sucesso! Você será redirecionado.");
				echo("<script>loginsuccessfully()</script>");
			} else {
				echo("Nome ou Senha incorretos! Aguarde o redirecionamento.");
               
				echo("<script>loginfailed()</script>");
			}
        }
        
		?>
    </body>
</html>