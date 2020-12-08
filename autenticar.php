<?php
	$host="localhost";
	$user="root";
	$pass="";
	$banco="bdnexus2(3)";
	$conexao=mysqli_connect($host, $user, $pass) or die(mysqli_error());
	mysqli_select_db($conexao,$banco) or die(mysqli_error());
	$email=$_GET['email'];
	$senha=$_GET['senha'];
?>
<html>
    <head>
        <link rel="shortcut icon" href="../imagem/logo.png" style="height:200px;">
            <title>Autenticando...</title>
            <script type="text/javascript">
                function loginsuccessfully() {
                    setTimeout("window.location='home.php'", 5000);
                }

                function loginfailed() {
                    setTimeout("window.location='login.php'", 5000);
                }
                 function loginadm() {
                    setTimeout("window.location='ADM.php'", 5000);
                }
               
            </script>
    </head>
    <body>
     <?php
        if($email=="adm@gmail.com" && $senha= "adm123"){
            echo("<script>loginadm()</script>");
        }else{
			$sql = mysqli_query ($conexao, "SELECT * FROM tbaluno WHERE email = '$email' AND alunoSenha = '$senha'") or die (mysqli_error($conexao));
            
			$row = mysqli_num_rows($sql);
			if($row > 0) {
				session_start();
				$_SESSION['email']=$_GET['email'];
				$_SESSION['alunoSenha']=$_GET['senha'];
				echo("<script>loginsuccessfully()</script>");
			} else {
				echo("Nome ou Senha incorretos! Aguarde o redirecionamento.");
               
				echo("<script>loginfailed()</script>");
			}
        }
        
		?>
    </body>
</html>