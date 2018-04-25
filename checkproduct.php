
<html>
<body>
  <form action="#" method="post">
  <div class="container">
    <h2 class="visible-xs bg-info"><span class="glyphicon glyphicon-calendar"></span> เช็ครอบการตรวจสอบ</h2>
    <h2 class="visible-sm bg-info"><span class="glyphicon glyphicon-calendar"></span> เช็ครอบการตรวจสอบ</h2>
    <h2 class="visible-md bg-info"><span class="glyphicon glyphicon-calendar"></span> เช็ครอบการตรวจสอบ</h2>
    <h2 class="visible-lg bg-info"><span class="glyphicon glyphicon-calendar"></span> เช็ครอบการตรวจสอบ</h2>
</form>
<form action"#">
  <input type="hidden" name="p" value="checkproduct">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table  table-striped table-hover table-condensed">
    <tr>
     <td width="20%" align="right"><strong>วันเริ่มต้น</strong></td>
      <td>
<script type="text/javascript">
	$(function() {
    $( "#txtend" ).datepicker({
	dateFormat: "dd-mm-yy" ,
	changeMonth: true ,
	changeYear: true ,
	yearRange: "<? echo date("Y")-2?>:<? echo date("Y")+10?>" ,
	 monthNamesShort:  ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฏาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม']
	 });
  });
</script>

<script type="text/javascript">
$(function() {
$( "#txtstart" ).datepicker({
dateFormat: "dd-mm-yy" ,
changeMonth: true ,
changeYear: true ,
yearRange: "<? echo date("Y")-2?>:<? echo date("Y")+10?>" ,
monthNamesShort:  ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฏาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม']
  });
});
</script>
  <td width="20%" align="left">
    <strong>
        <input type="text" name="txtstart" id="txtstart">
      </strong></td>
      <td width="20%" align="right"><strong>วันสุดท้าย</strong></td>
      <td width="20%">
      <strong>
        <input type="text" name="txtend" id="txtend">
      </strong>
  </td>
  <td width="20%" align="center">
  <button id="btadd" type="submit" class="btn btn-primary">Check</button>
  </td>
    </tr>

  </form>
</table>
<? if($_GET[txtend]!=""){ ?>
<table width="100%"  class="table table-bordered table-striped table-hover table-condensed">
  <tr>
    <td width="20%" height="32" align="center"><strong>ข้อมูลระหว่างวันที่ : </strong>
    <? echo $_GET[txtstart] ." ถึง ". $_GET[txtend] ?></td>
  </tr>
</table>
<table width="100%"  class="table table-bordered table-striped table-hover table-condensed">
    <tr>
      <td width="7%" height="32" align="center"><strong>idcreateqr</strong></td>
      <td width="7%" height="32" align="center"><strong>ชื่อสินค้า</strong></td>
      <td width="7%" height="32" align="center"><strong>ขนาดสินค้า</strong></td>
      <td width="7%" height="32" align="center"><strong>รสชาติ</strong></td>
      <!-- <td width="7%" align="center"><strong>วันที่สินค้าเข้ามา</strong></td> -->
      <!-- <td width="7%" align="center"><strong>จำนวนครั้งที่ตรวจล่าสุด</strong></td>
      <td width="7%" align="center"><strong>จำนวนครั้งที่บวกแล้ว</strong></td>
      <td width="7%" align="center"><strong>จำนวนที่คูณแล้ว</strong></td> -->
      <td width="7%" align="center"><strong>วันที่ต้องตรวจสินค้า</strong></td>
      <td width="3%" align="center"><strong>-</strong></td>
    </tr>

<?php
 // $sql="SELECT * FROM createproductqr INNER JOIN item ON item.iditem=createproductqr.iditem WHERE dateaddqr BETWEEN CONVERT(DATETIME, '".date("Y-m-d",strtotime($_GET[txtstart]))."', 102) and CONVERT(DATETIME, '".date("Y-m-d",strtotime($_GET[txtend]))."', 102)";
$sql="SELECT DISTINCT tbjob.idcreateqrcode,tbjob.dateadd,tbjob.datenext,item.itemname,tbsize.sizename,flavor.flavorname FROM tbjob INNER JOIN item ON tbjob.iditem=item.iditem INNER JOIN tbsize ON item.idsize=tbsize.idsize INNER JOIN flavor ON item.idflavor=flavor.idflavor WHERE datenext BETWEEN CONVERT(DATETIME, '".date("Y-m-d",strtotime($_GET[txtstart]))."', 102) and CONVERT(DATETIME, '".date("Y-m-d",strtotime($_GET[txtend]))."', 102)";
$result1=mssql_query($sql);
$num1=mssql_num_rows($result1);
if($num1<=0){
  echo "<script>alert('ไม่พบข้อมูลที่ต้องตรวจ!');history.back();</script>";
  exit();
}
while($row1=mssql_fetch_array($result1))
{
  $idcreateqrcode = $row1[idcreateqrcode];
  $sql2="SELECT max(numberjob) AS max FROM tbjob WHERE idcreateqrcode='$idcreateqrcode'";
  $result2=mssql_query($sql2);


  while($row2=mssql_fetch_array($result2))
  {
    $max=$row2['max'];
    // echo $sql2."<br>".$row2['max']."<br>";
   ?>
  <tr>
    <td align="center"><?php echo trim(iconv("tis-620","utf-8",$idcreateqrcode)); ?></td>
    <td align="center"><?php echo trim(iconv("tis-620","utf-8",$row1[itemname])); ?></td>
    <td align="center"><?php echo trim(iconv("tis-620","utf-8",$row1[sizename])); ?></td>
    <td align="center"><?php echo trim(iconv("tis-620","utf-8",$row1[flavorname])); ?></td>
    <!-- <td align="center"><?php //echo trim(iconv("tis-620","utf-8",date("d-m-Y",strtotime($row1[dateadd])))) ?></td> -->

    <!-- <td align="center"><?php //echo $max; ?></td> -->
  <? $max2 = $max+1; ?>
    <!-- <td align="center"><?php //echo $max2; ?></td> -->
  <? $max3 = $max2*$row1[frequency]; ?>
<!-- <td align="center"><?php //echo $max3; ?></td> -->
  <?
  $dateadd=date("d-m-Y",strtotime($row1[dateadd]));
  $newdate = date("Y-m-d",(strtotime("+$max3 month",strtotime(date("Y-m-d",strtotime($row1[dateadd]))))));
  ?>
  <td align="center"><?php echo date("d-m-Y",strtotime($row1[datenext]))."<br>"."<br>"; ?></td>
  <td align="center">
    <a href="<? echo"main.php?p=job2&idqr=".$row1[idcreateqrcode]."";?>"><button type="button" class="btn btn-default btn-sm" ><span class="glyphicon glyphicon-check"></span> ตรวจ</button></a>
  </td>
  </tr>
<?
    }
  }
}
?>
  </table>
</body>
</html>
