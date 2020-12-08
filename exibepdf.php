
<?php
define('FPDF_FONTPATH', 'font/');
require('./fpdf/fpdf.php');

//conexão com banco de dados
 $host="localhost";
    $user="root";
    $pass="";
    $banco="bdnexus2(3)";
    $conn=mysqli_connect($host, $user, $pass, $banco);
//pesquisar na tabela
$sql2 = mysqli_query($conn, "SELECT * FROM tblogado ");
       while($linha = mysqli_fetch_array($sql2)){
           $codCursoTT = $linha['idCursoL'];
       }



$sql="SELECT * FROM tbCursoaluno WHERE codCursoconfirmado= '$codCursoTT' ";




$busca = mysqli_query($conn, $sql);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('nexus.png',5,5,52,20,'PNG');
$pdf->SetFont('Helvetica','B',16);
$pdf->Cell(190,10,('Alunos Cadrastrados '),0,0,"C");

//exibir imagem no pdf


  
//$pdf->Image('bat.jpg',10,8,22);
$pdf->ln(15); // espaçamento entra linhas de 15 mm


$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(47, 7,'Nome',1,0,"C");
$pdf->Cell(47, 7,'Email',1,0,"C");

$pdf->Cell(47, 7,'CPF',1,0,"C");
$pdf->Cell(47, 7,'RG',1,0,"C");
$pdf->ln(); //nenhum espaçamentos entre linhas


while ($resultado = mysqli_fetch_array($busca)) {

    
    $pdf->Cell(47, 7, $resultado['nomeAluno'],1,0,"C");
    $pdf->Cell(47, 7, $resultado['emailAluno'],1,0,"C");
    
    $pdf->Cell(47, 7, $resultado['cpfAluno'],1,0,"C");
    $pdf->Cell(47, 7, $resultado['rgAluno'],1,0,"C");
    
    $pdf->Ln();
    
}
$pdf->Output();
?>