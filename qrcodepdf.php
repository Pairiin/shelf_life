<?php
require('fpdf/fpdf.php');
class PDF extends FPDF
{
	function Header(){
		include"connect/dbconnect.php";
		  $sql1="select * from createproductqr inner join item on item.iditem=createproductqr.iditem inner join tbsize on tbsize.idsize=item.idsize inner join flavor on flavor.idflavor=item.idflavor inner join place on place.idplace=createproductqr.idplace where idcreateqr=".$_GET[id]."";
      $result1=mssql_query($sql1);
       $row1=mssql_fetch_array($result1);
  	 $this->AddFont('angsa','','angsa.php');
  	$this->SetFont('angsa','',24);
	 $this->Image('QRCODE/'.trim($row1[qrpic]),1,1,70,0);
 $this->Text(20,60,$row1[idcreateqr]);
 	$this->SetFont('angsa','',20);
 $this->Text(60,20,iconv("utf-8","tis-620",'วันที่ผลิต : ').date("d-m-Y",strtotime($row1[dateaddqr])));
  $this->Text(60,30,iconv("utf-8","tis-620",'Lot ผลิต : ').date("d-m-Y",strtotime($row1[lotdate])));
    $this->Text(60,40,iconv("utf-8","tis-620",'วันหมดอายุ : ').date("d-m-Y",strtotime($row1[expiredate])));
	$this->Text(60,50,iconv("utf-8","tis-620",'สถานที่เก็บ : ').iconv("tis-620","utf-8",$row1[placename]));

	}
}
$pdf=new PDF('L','mm', array(70,110));
$pdf->AliasNbPages( 'tp' );
$pdf->AddPage();
$pdf->Output();

?>
