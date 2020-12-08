
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




$sql="SELECT * FROM tbcursoconfirmado ";


$img= "nexus.png";

$busca = mysqli_query($conn, $sql);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image($img,6,5,52,20,'PNG');
$pdf->SetFont('Helvetica','B',16);
$pdf->Cell(190,10,('Cursos Cadastrados '),0,0,"C");

//exibir imagem no pdf


  
//$pdf->Image('bat.jpg',10,8,22);
$pdf->ln(15); // espaçamento entra linhas de 15 mm


$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(63, 7,'Nome',1,0,"C");
$pdf->Cell(63, 7,'Email',1,0,"C");
$pdf->Cell(63, 7,'CEP',1,0,"C");

$pdf->ln(); //nenhum espaçamentos entre linhas


while ($resultado = mysqli_fetch_array($busca)) {

    
    $pdf->Cell(63, 7, $resultado['nomeCursoC'],1,0,"C");
    $pdf->Cell(63, 7, $resultado['emailCursoC'],1,0,"C");
    
    $pdf->Cell(63, 7, $resultado['cepCursoC'],1,0,"C");
  $pdf->Ln();
    
    
}
$pdf->Output();
?>