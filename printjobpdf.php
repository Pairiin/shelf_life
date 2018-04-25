<?php

require('fpdf/fpdf.php');
class PDF extends FPDF
{
	function Header(){
    include"connect/dbconnect.php";
    $sql1="select * from createproductqr  where idcreateqr=".$_GET[idqr]."";
    $result1= mssql_query($sql1);
    $row1=mssql_fetch_array($result1);

    $sql2="select * from item  where iditem=".$row1[iditem]."";
    $result2= mssql_query($sql2);
    $row2=mssql_fetch_array($result2);

		$sql3="select * from flavor  where idflavor=".$row2[idflavor]."";
		$result3= mssql_query($sql3);
		$row3=mssql_fetch_array($result3);

		$sql4="select * from tbsize  where idsize=".$row2[idsize]."";
		$result4= mssql_query($sql4);
		$row4=mssql_fetch_array($result4);

  	 $this->AddFont('angsa','','angsa.php');
  	$this->SetFont('angsa','U',24);
 $this->Cell(0,20,iconv("utf-8","tis-620",'ใบรายงานการตรวจ วิเคราะห์'),'1',1,"C");
 $this->SetFont('angsa','',18);

  $this->Text(20,40,iconv("utf-8","tis-620",'ชื่อผลิตภัฑณ์ : ').trim($row2[itemname]));
  $this->Text(85,40,iconv("utf-8","tis-620",'วันที่ผลิต : '));
  $this->Text(85,50,iconv("utf-8","tis-620",'วันที่บรรจุ : '));
  $this->Text(85,60,iconv("utf-8","tis-620",'วันที่หมดอายุ : '));
  $this->Text(145,40,iconv("utf-8","tis-620",'วันที่ : '));
  $this->Text(145,50,iconv("utf-8","tis-620",'กะ : '));
  $this->Text(145,60,iconv("utf-8","tis-620",'ประเทศ : '));
  $this->Text(20,50,iconv("utf-8","tis-620",'รสชาติ : ').trim($row3[flavorname]));
  $this->Text(20,60,iconv("utf-8","tis-620",'ขนาดบรรจุ : ').trim($row4[sizename]));
	// $this->Text(20,70,iconv("utf-8","tis-620",'สถานที่เก็บ : '));
	$this->SetFillColor(232,232,555);

	}
}
$pdf=new PDF('L','mm','A4');
$pdf->AliasNbPages('tp');
$pdf->AddPage();
$pdf->SetFillColor(232,232,000);
$Y_Table_Position = 60;
include"connect/dbconnect.php";
$sql12 = "SELECT * FROM createproductqr where idcreateqr=".$_GET[idqr]." ";
$Y_Table_Position2 = 68;
$result12= mssql_query($sql12);
$row12= mssql_fetch_array($result12);

$sql13 = "SELECT * FROM tbcharacter where iditem=".$row12[iditem]." ";
$result13= mssql_query($sql13);
while($row13= mssql_fetch_array($result13)){
	
	$Y_Table_Position +=8;
	$pdf->SetY($Y_Table_Position);
		$pdf->SetX(10);
		$pdf->Cell(35,8,trim($row13[charactername]),1,0,'C',1);
		

	$sql14 = "SELECT * FROM detailcharacter where iditem=".$row12[iditem]." and idcharacter=".$row13[idcharacter]." ";
	$result14= mssql_query($sql14);
	$num14=mssql_num_rows($result14);
	while($row14= mssql_fetch_array($result14)){
		
		 $Y_Table_Position2 +=8;
    $pdf->SetY($Y_Table_Position2);
	$pdf->SetX(50);
	$pdf->Cell(35,8,$row14[detailcharactername],1,0,'C',0);

		
		
/*$i14++;
if($i14<=$num14){
	 $Y_Table_Position2 +=8;
    $pdf->SetY($Y_Table_Position2);
	$pdf->SetX(10);
/*	$pdf->Cell(35,8,$row14[detailcharactername],1,0,'C',0);
	$pdf->Cell(35,8,$row14[detailcharactername],1,0,'C',0);
}else{
	
	 $Y_Table_Position3 +=8;
    $pdf->SetY($Y_Table_Position3);
	$pdf->SetX(10);
/*	$pdf->Cell(35,8,$row14[detailcharactername],1,0,'C',0);
	$pdf->Cell(35,8,$row14[detailcharactername],1,0,'C',0);
	}

	  $a13=$a13+1; 
}
if($i13<=1){
$Y_Table_Position +=8;
$pdf->SetY($Y_Table_Position);
	$pdf->SetX(10);
	$pdf->Cell(35,8,trim($row13[charactername]),1,0,'C',1);
	
	// $pdf->Cell(35,8,trim($row13[charactername]),1,0,'C',1);
}
else{*/
	}


	
		

	}

$pdf->Output();

?>
