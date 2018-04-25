
<?php
  if($_POST[txtitem]<>""){
	 $sql1="select MAX(idcreateqr) AS maxid from createproductqr where month='".date("m")."' and year='".date("Y")."'";
$result1= mssql_query($sql1);
$num1=mssql_num_rows($result1);
$row1=mssql_fetch_array($result1);
if($row1['maxid']<=0){
	$max1=date("Y").date("m")."00001";
	}
	else{
		$max1=$row1['maxid']+1;
	}
	   $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'QRCODE'.DIRECTORY_SEPARATOR;
    $PNG_WEB_DIR = 'QRCODE/';
	  include "php_qrcode/qrlib.php";
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    $filename = $PNG_TEMP_DIR.'test.png';
       if (isset($max1)) {
        if (trim($max1) == '')
            die('data cannot be empty! <a href="?">back</a>');
        $filename = $PNG_TEMP_DIR.md5($max1.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
		        QRcode::png($max1,$filename, $errorCorrectionLevel, $matrixPointSize, 12);
    }
	function left($str, $length) {
     return substr($str, 0, $length);
}
function right($str, $length) {
     return substr($str, -$length);
}

  $sql = "INSERT INTO createproductqr (idcreateqr,qrpic,month,year,iditem,dateaddqr,expiredate,lotdate,shift,timeshift,delivery,txtdelivery,idplace)
  VALUES (".$max1.",'".basename($filename)."','".date("m")."','".date(Y)."',".$_POST[txtitem].",'".date("Y-m-d",strtotime($_POST[txtdateadd]))."','".date("Y-m-d",strtotime($_POST[txtexpiredate]))."','".date("Y-m-d",strtotime($_POST[txtlotdate]))."','".$_POST[txtshift]."','".iconv("utf-8","tis-620",$_POST[txttimeshift])."','".$_POST[txtdelivery]."','".iconv("utf-8","tis-620",$_POST[txtdelivery1])."',".$_POST[txtplace].")";

  $dbquery = mssql_query($sql);
	 ?>
  <div class="alert alert-success fade in">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <center><strong>สำเร็จ!</strong> เพิ่ม QR CODE สำเร็จ.</center>
  </div>
  <?

 }
 ?>
<!DOCTYPE html>
<html>
<body>

<style>
<style type="text/css">
.txt2 {width: 500px; height: 300px}
    </style>
<form action="#" method="post">
<div class="container">

  <h2 class="visible-xs bg-info"><span class="glyphicon glyphicon-plus-sign"></span> สร้าง QR Code</h2>
  <h2 class="visible-sm bg-info"><span class="glyphicon glyphicon-plus-sign"></span> สร้าง QR Code</h2>
  <h2 class="visible-md bg-info"><span class="glyphicon glyphicon-plus-sign"></span> สร้าง QR Code</h2>
  <h2 class="visible-lg bg-info"><span class="glyphicon glyphicon-plus-sign"></span> สร้าง QR Code</h2>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table  table-striped table-hover table-condensed">
    <tr>
    <td width="10%" align="right"><strong>สินค้า</strong></td>
    <td width="40%"><strong>
      <select name="txtitem" class="txt2"  id="txtitem" style="width:400px">
        <option value=""><? echo""?></option>
        <?

                  	$sql2 = "SELECT * FROM item inner join tbsize on tbsize.idsize=item.idsize inner join flavor on flavor.idflavor=item.idflavor";
$result2= mssql_query($sql2);
while($row2= mssql_fetch_array($result2)){
	?>
        <option value="<? echo $row2[iditem]?>"><? echo trim(iconv("tis-620","utf-8",$row2[itemname]))." ".trim(iconv("tis-620","utf-8",$row2[sizename]))." ".trim(iconv("tis-620","utf-8",$row2[flavorname]))?></option>
        <?
}
?>
      </select>
    </strong></td>
    <td width="10%" align="right"><strong>วันที่ผลิต</strong></td>
    <td width="50%"><strong>
      <label for="txtexpircedate">
        <input name="txtdateadd" type="text" id="txtdateadd" value="<? echo date("d-m-Y")?>" readonly>
        </label>
    </strong></td>
    </tr>

    <tr>
     <td align="right"><strong>Lot วันที่ผลิต</strong></td>
      <td><strong>
        <script type="text/javascript">
	$(function() {
    $( "#txtlotdate" ).datepicker({
	dateFormat: "dd-mm-yy" ,
	changeMonth: true ,
	changeYear: true ,
	yearRange: "<? echo date("Y")-2?>:<? echo date("Y")+10?>" ,
	 monthNamesShort:  ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฏาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม']
	});
  });
</script>
        <input type="text" name="txtlotdate" id="txtlotdate">
      </strong></td>
      <td align="right"><strong>วันหมดอายุ</strong></td>
      <td><strong>
        <script type="text/javascript">
	$(function() {
    $( "#txtexpiredate" ).datepicker({
	dateFormat: "dd-mm-yy" ,
	changeMonth: true ,
	changeYear: true ,
	yearRange: "<? echo date("Y")-2?>:<? echo date("Y")+10?>" ,
	 monthNamesShort:  ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฏาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม']
	});
  });
</script>
        <input type="text" name="txtexpiredate" id="txtexpiredate">
      </strong></td>

    </tr>
    <tr>
    <td align="right"><strong>กะผลิต</strong></td>
    <td><strong>
      <select name="txtshift" class="txt2"  id="txtshift" style="width:100px">
        <option value=""><? echo""?></option>
        <option value="DAY"><? echo"กลางวัน"?></option>
        <option value="NIGHT"><? echo"กลางคืน"?></option>
      </select>
เวลา
<input type="text" name="txttimeshift" id="txttimeshift" style="width:100px">
    </strong></td>
    <td align="right"><strong>ประเทศ</strong></td>
    <td><strong>
      <select name="txtdelivery" class="txt2"  id="txtdelivery" style="width:100px">
        <option value=""><? echo""?></option>
        <option value="THAI"><? echo"ไทย"?></option>
        <option value="EXPORT"><? echo"ต่างประเทศ"?></option>
        </select>
      </strong>-<strong>
        <input type="text" name="txtdelivery1" id="txtdelivery1" style="width:150px">
      </strong></td>
    </tr>

    <tr>
      <td align="right">สถานที่เก็บ</td>
      <td><select name="txtplace" class="txt2"  id="txtplace" style="width:200px">
        <option value=""><? echo""?></option>
        <?
                    $sql12 = "SELECT * FROM place";
  $result12= mssql_query($sql12);
  while($row12= mssql_fetch_array($result12)){
  ?>
        <option value="<? echo $row12[idplace]?>"><? echo trim(iconv("tis-620","utf-8",$row12[placename])) ?></option>
        <?
  }
  ?>
      </select></td>
    </tr>

  <tr>
    <td colspan="4" align="right"><button id="btadd" type="submit" VALUES="Add" name="btadd" class="btn btn-primary">เพิ่มข้อมูล</button>  <input class="btn btn-danger" type="reset" value="รีเซ็ท"></td>
    </tr>
</table>
</form>

<form action="" method="get" class="navbar-form" role="search" align="right">
          <input name="p" type="hidden" value="insertqrcode">
            <div class="input-group">
              <input type="text" class="search-query form-control"  name="txtKeyword" id="txtKeyword" value="<?php echo $_GET["txtKeyword"];?>" placeholder="Search">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit">ค้นหา</button>
              </div>
            </div>

</form>

  <table width="100%"  class="table table-bordered table-striped table-hover table-condensed">

      <tr>
        <td width="7%" height="32" align="center"><strong>ลำดับ</strong></td>
        <td width="32%" align="center"><strong>ชื่อสินค้า</strong></td>
        <td width="9%" align="center"><strong>ผลิต</strong></td>
           <td width="9%" align="center"><strong>Lot</strong></td>
         <td width="9%" align="center"><strong>หมดอายุ</strong></td>
          <td width="9%" align="center"><strong>สถานที่เก็บ</strong></td>
        <td width="12%" align="center"><strong>กะ/เวลา</strong></td>
         <td width="11%" align="center"><strong>ประเทศ</strong></td>
        <td width="11%" align="center"><strong>-</strong></td>

      </tr>

      <?php

      if($_GET[txtKeyword]==""){

              $sql1="select * from createproductqr inner join item on item.iditem=createproductqr.iditem inner join tbsize on tbsize.idsize=item.idsize inner join flavor on flavor.idflavor=item.idflavor inner join place on place.idplace=createproductqr.idplace order by idcreateqr DESC";
      }
      else{
              $sql1 = "SELECT * FROM createproductqr inner join item on item.iditem=createproductqr.iditem inner join tbsize on tbsize.idsize=item.idsize inner join flavor on flavor.idflavor=item.idflavor inner join place on place.idplace=createproductqr.idplace WHERE (item.itemname LIKE '%".iconv("utf-8","tis-620",$_GET["txtKeyword"])."%' or tbsize.sizename LIKE '%".iconv("utf-8","tis-620",$_GET["txtKeyword"])."%' or flavor.flavorname LIKE '%".iconv("utf-8","tis-620",$_GET["txtKeyword"])."%' or dateaddqr = CONVERT(DATETIME, '".date("Y-m-d",strtotime($_GET["txtKeyword"]))."', 102) or lotdate = CONVERT(DATETIME, '".date("Y-m-d",strtotime($_GET["txtKeyword"]))."', 102) or lotdate = CONVERT(DATETIME, '".date("Y-m-d",strtotime($_GET["txtKeyword"]))."', 102) or expiredate = CONVERT(DATETIME, '".date("Y-m-d",strtotime($_GET["txtKeyword"]))."', 102) or txtdelivery LIKE '%".iconv("utf-8","tis-620",$_GET["txtKeyword"])."%')";

      }
      $result1=mssql_query($sql1);
	  $i=0;
       while($row1=mssql_fetch_array($result1))
      {
	  $i++;
	  ?>
      <tr>
        <td align="center"><?php echo $i;?></td>
        <td align="left"><?php echo trim(iconv("tis-620","utf-8",$row1[itemname]))." ".trim(iconv("tis-620","utf-8",$row1[sizename]))." ".trim(iconv("tis-620","utf-8",$row1[flavorname]))?></td>
        <td align="center"><?php echo trim(iconv("tis-620","utf-8",date("d-m-Y",strtotime($row1[dateaddqr])))) ?></td>
        <td align="center"><?php echo trim(iconv("tis-620","utf-8",date("d-m-Y",strtotime($row1[lotdate])))) ?></td>
        <td align="center"><?php echo trim(iconv("tis-620","utf-8",date("d-m-Y",strtotime($row1[expiredate])))) ?></td>
        <td align="center"><?php echo trim(iconv("tis-620","utf-8",$row1[placename])) ?></td>
        <td align="center"><?php if(trim($row1[shift])=="DAY"){$shiftshow="กลางวัน";}if(trim($row1[shift])=="NIGHT"){$shiftshow="กลางคืน";}echo $shiftshow." / ".trim(iconv("tis-620","utf-8",$row1[timeshift]))?></td>
        <td align="center"><?php if(trim($row1[delivery])=="THAI"){$deliveryshow="ไทย";}if(trim($row1[delivery])=="EXPORT"){$deliveryshow="ต่างประเทศ";}echo $deliveryshow." / ".trim(iconv("tis-620","utf-8",($row1[txtdelivery])))?></td>

        <td><a href="<? echo"qrcodepdf.php?id=".$row1[idcreateqr]."";?>" onclick="return confirm('คุณต้องการพิมพ์ QRCODE ใช่หรือไม่?');" target="_blank"><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-print"></span></button></a></td>
      </tr>
      <?    } ?>

  </table>

</body>
</html>
