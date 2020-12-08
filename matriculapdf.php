
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


$codM = $_GET["id"];



$sql="SELECT * FROM tbaluno WHERE codAluno = '$codM' ";




$busca = mysqli_query($conn, $sql);




$codM = $_GET["id"];



$sql2="SELECT * FROM tblocalizacaoaluno WHERE idLocAluno = '$codM' ";




$busca2 = mysqli_query($conn, $sql2);

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',20);
$pdf->Cell(190,10,('Alunos Cadrastrados '),0,0,"C");

$pdf->Cell(190,30,(''),0,0,"C");

$pdf->SetFont('Arial','B',12);

 $pdf->Image("nexus.png",90,285,35,13,'PNG');
//exibir imagem no pdf


  
//$pdf->Image('bat.jpg',10,8,22);
$pdf->ln(15); // espaçamento entra linhas de 15 mm



while ($resultado = mysqli_fetch_array($busca)) {
$pdf->Cell(90, 7,'',0,0);
    $pdf->Cell(46, 7,'Nome:',0,0);
    $pdf->Cell(46, 7, $resultado['nome'],0,0);
    
    $pdf->ln();
    $pdf->Cell(90, 7,'',0,0);
    $pdf->Cell(46, 7,'Email:',0,0);
    $pdf->Cell(46, 7, $resultado['email'],0,0);
    $pdf->ln();
    $pdf->Cell(90, 7,'',0,0);
    $pdf->Cell(46, 7,'Genero:',0,0);
    $pdf->Cell(46, 7, $resultado['sexo'],0,0);
    $pdf->ln();
    $pdf->Cell(90, 7,'',0,0);
    $pdf->Cell(46, 7,'CPF:',0,0);
    $pdf->Cell(46, 7, $resultado['cpf'],0,0);
    $pdf->ln();
    $pdf->Cell(90, 7,'',0,0);
    $pdf->Cell(46, 7,'RG:',0,0);
    $pdf->Cell(46, 7, $resultado['rg'],0,0);
    $pdf->ln();
    $pdf->Cell(90, 7,'',0,0);
    $pdf->Cell(46, 7,'Nascimento:',0,0);
    $pdf->Cell(46, 7, $resultado['nascimento'],0,0);
    $pdf->ln();
    $pdf->Cell(90, 7,'',0,0);
    $pdf->Cell(46, 7,'Renda Propia:',0,0);
    $pdf->Cell(46, 7, $resultado['rendaPropia'],0,0);
     $pdf->ln();
    $pdf->Cell(90, 7,'',0,0);
    $pdf->Cell(46, 7,'Renda:',0,0);
    $pdf->Cell(46, 7, $resultado['renda'],0,0);
    
     $pdf->ln();
    $pdf->Cell(90, 7,'',0,0);
    $pdf->Cell(46, 7,'Cor:',0,0);
    $pdf->Cell(46, 7, $resultado['cor'],0,0);
    
    
     $imagemA = "upload/".$resultado['imgAluno'];
    $pdf->Image($imagemA,18,25,35,45,'JPG');
    
   
   
}



$pdf->Output();
?>