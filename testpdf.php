<?php
require('fpdf/fpdf.php');
class PDF extends FPDF
{
	function Header(){
  	 $this->AddFont('angsa','','angsa.php');
  	$this->SetFont('angsa','',14);
	 $this->Image('fileqr/1234.png',1,1,70,0);
	}
}
$pdf=new PDF('L','mm', array(70,110));
$pdf->AliasNbPages( 'tp' );
$pdf->AddPage();
$pdf->AddFont('angsa','','angsa.php');
	$pdf->SetFont('angsa','',16);

$pdf->Output();

?>
