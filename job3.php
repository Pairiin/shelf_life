<meta charset="utf-8">


<?php
 include"connect/dbconnect.php";

  $sql0="select iditem  from createproductqr where idcreateqr=".$_GET[idqr]."";
  $result0= mssql_query($sql0);
  $row0=mssql_fetch_array($result0);

  $sql2="select MAX(numberjob) AS maxid from tbjob where idcreateqrcode=".$_GET[idqr]."";
  $result2= mssql_query($sql2);
  $row2=mssql_fetch_array($result2);
  if($row2['maxid']<=0){
    $number1=1;
    }
    else{
      $number1=$row2['maxid']+1;
    }
?>
<style>
<style type="text/css">
.txt2 {width: 500px; height: 300px}
    </style>

         <?
	  $sql4="select * from item where iditem=".$row0[iditem]."";
$result4= mssql_query($sql4);
$num4=mssql_num_rows($result4);
$row4=mssql_fetch_array($result4);

$sql22 = "SELECT * FROM item inner join tbsize on tbsize.idsize=item.idsize inner join flavor on flavor.idflavor=item.idflavor inner join tbjob on tbjob.iditem=item.iditem inner join createproductqr on createproductqr.iditem=item.iditem
where idcreateqrcode=".$_GET[idqr]."";
  $result22= mssql_query($sql22);
  $row22= mssql_fetch_array($result22);
?>
<!-- <h3><u>ใบรายงานการตรวจ วิเคราะห์ WAWER</u></h3> -->
<table border="0">
  <tr><td colspan="3"><center><h3><u>ใบรายงานการตรวจ วิเคราะห์ WAWER</u></h3></center></td></tr>
  <tr><td colspan="3"></td></tr>
  <tr><td colspan="3"></td></tr>
<tr>
<td width="10%">ชื่อสินค้า : <? echo trim(iconv("tis-620","utf-8",$row22[itemname]))?></td>
<td width="10%">วันที่ผลิต : <? echo trim(iconv("tis-620","utf-8",date("d-m-Y",strtotime($row22[dateaddqr])))) ?></td>
<td width="10%">กะ : <? echo trim(iconv("tis-620","utf-8",$row22[shift]))?></td>
</tr>

<tr>
<td width="10%">รสชาติ : <? echo trim(iconv("tis-620","utf-8",$row22[flavorname]))?></td>
<td width="10%">วันที่ Lot ผลิต : <? echo trim(iconv("tis-620","utf-8",date("d-m-Y",strtotime($row22[lotdate])))) ?></td>
<td width="10%">เวลา: <? echo trim(iconv("tis-620","utf-8",$row22[timeshift])) ?></td>
</tr>

<tr>
<td width="10%">ขนาดสินค้า : <? echo trim(iconv("tis-620","utf-8",$row22[sizename]))?></td>
<td width="10%">วันที่หมดอายุ: <? echo trim(iconv("tis-620","utf-8",date("d-m-Y",strtotime($row22[expiredate])))) ?></td>
<td width="10%">ประเทศ : <? echo trim(iconv("tis-620","utf-8",$row22[delivery]))?> - <? echo trim(iconv("tis-620","utf-8",$row22[txtdelivery]))?></td>
</tr>
</table>
<br>
<table width="100%" border="1" cellspacing="0" cellpadding="1" class="table table-striped table-hover table-condensed">

  <?  $sql2 = "SELECT * FROM item inner join tbsize on tbsize.idsize=item.idsize inner join flavor on flavor.idflavor=item.idflavor ";
    $result2= mssql_query($sql2);
    $row2= mssql_fetch_array($result2); ?>
    <h2 class="visible-lg bg-info">ชื่อสินค้า : <? echo trim(iconv("tis-620","utf-8",$row2[itemname]))." ".trim(iconv("tis-620","utf-8",$row2[sizename]))." ".trim(iconv("tis-620","utf-8",$row2[flavorname]))?></h2>
<? $sql1="select * from tbcharacter where iditem=".$row0[iditem]."";
$result1= mssql_query($sql1);
$num1=mssql_num_rows($result1);
while($row1=mssql_fetch_array($result1)){?>
  <tr>

    <th width="14%" rowspan="2" bgcolor="#FFFFCC" scope="col"><? echo trim(iconv("tis-620","utf-8",$row1[charactername]))?></th>
    <th width="22%" rowspan="2" bgcolor="#FFFFCC" scope="col">มาตรฐาน</th>
    <th width="64%" colspan="<? echo $row4[roundnumber]+1?>" bgcolor="#FFFFCC" scope="col">อายุผลิตภัณฑ์</th>
  </tr>
  <tr>
  <td bgcolor="#FFFFCC"><? echo "1วัน";?></td>
   <? for($i12=0;$i12<=$row4[roundnumber]-1;$i12++){?>
    <td bgcolor="#FFFFCC"><? echo ($row4[frequency]*$i12) + $row4[frequency]."เดือน";?></td>
    <? }?>

  </tr>
  <? /*for($i2=1;$i2<=$a2;$i2++){*/


	  $sql2="select * from detailcharacter where iditem=".$row0[iditem]." and idcharacter=".$row1[idcharacter]." order by idcharacter ASC";
$result2= mssql_query($sql2);
$num2=mssql_num_rows($result2);
while($row2=mssql_fetch_array($result2)){

	$sql3="select * from tbstd where iditem=".$row0[iditem]." and idcharacter=".$row1[idcharacter]." and iddetailcharacter=".$row2[iddetailcharacter]." order by iddetailcharacter ASC";
$result3= mssql_query($sql3);
 $num3=mssql_num_rows($result3);;
$i=0;
$i9=0;
while($row3=mssql_fetch_array($result3))
{
	$i++;
	$i9++;

  ?>
  <tr>

<?

if($i<=1){
 /*
    <td <? if($countstd>1){echo "rowspan=$countstd";}?>><? echo trim(iconv("tis-620","utf-8",$row2[detailcharactername]))?></td>  */?>
<td rowspan="<? echo"$num3"?>"><? echo trim(iconv("tis-620","utf-8",$row2[detailcharactername]))?></td>
<? }?>
          <td><? echo trim(iconv("tis-620","utf-8",$row3[stdname]))?></td>

          <script language="javascript">
          function CheckNum(){
          		if (event.keyCode < 46 || event.keyCode > 57){
          		      event.returnValue = false;
          	    	}
          	}
          </script>

<? for($i13=1;$i13<=$row4[roundnumber]+1;$i13++){?>
<? if($i13==$number1){?>
    <td>
      </td>
    <? }
	else{?>
		<td>
      <? $sql11="select idcharacter,numberstd,stdjob from tbjob where iditem=".$row3[iditem]." and idcharacter=".$row3[idcharacter]."
      and iddetailcharacter=".$row3[iddetailcharacter]." and idstd=".$row3[idstd]." and numberjob=".$i13." and idcreateqrcode=".$_GET[idqr]." ";
      $dbquery11 = mssql_query($sql11);
      while($row11=mssql_fetch_array($dbquery11)){

$sql7="select calculation from tbcharacter where idcharacter=".$row11[idcharacter]."";
$dbquery7=mssql_query($sql7);
$row7=mssql_fetch_array($dbquery7);
if(trim($row7[calculation])=="NUMBER"){
       echo "<center>".$row11[numberstd]."</center>";
      }else{
  echo "<center>".trim(iconv("tis-620","utf-8",$row11[stdjob]))."</center>";
        }
      }
      ?>
    </td>
	<?	}
 }?>
  </tr>
  <? } ?>


 <?}?>

<?}?>

  <tr>
    <td rowspan="2" colspan="2"><center>ผลการตรวจสอบ Shelf Life</center></td>
    <? for($i13=1;$i13<=$row4[roundnumber]+1;$i13++){?>
    <td><img src=img/Re2.png width="15"><center>ผ่าน</center></td>
<? }?>
  </tr>
  <tr>
    <? for($i13=1;$i13<=$row4[roundnumber]+1;$i13++){?>
    <td><img src=img/Re2.png width="15"><center>ไม่ผ่าน</center></td>
    <? }?>

  </tr>

</table>
