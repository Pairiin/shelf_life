<?php
  if($_POST[txticcode]<>"" and $_POST["txtname"]<>""){
	  $sql0="select MAX(iditem) as maxid from item";
	 $dbquery0 = mssql_query($sql0);
	  if(!mssql_num_rows($dbquery0)){  $maxiditem="1";}else{ $row0=mssql_fetch_array($dbquery0);
$maxiditem=$row0[maxid]+1;
	    }
  $sql = "INSERT INTO item (iditem,iccode,itemname,idflavor,idsize,idgroup,barcode,frequency,roundnumber)
  VALUES (".$maxiditem.",".$_POST[txticcode].",'".iconv("utf-8","tis-620",$_POST[txtname])."',".$_POST[txtflavor].",".$_POST[txtsize].",".$_POST[txtgroup].",'".$_POST[txtbarcode]."',".$_POST[txtfrequency].",".$_POST[txtroundnumber].")";

  $dbquery = mssql_query($sql);
	 ?>
  <div class="alert alert-success fade in">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <center><strong>สำเร็จ!</strong> เพิ่มสินค้าสำเร็จ.</center>
  </div>

<? }?>
<!DOCTYPE html>
<html>
<body>
<style>
<style type="text/css">
.txt2 {width: 500px; height: 300px}
    </style>
<form action="#" method="post">
<div class="container">

  <h2 class="visible-xs bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล สินค้า</h2>
  <h2 class="visible-sm bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล สินค้า</h2>
  <h2 class="visible-md bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล สินค้า</h2>
  <h2 class="visible-lg bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล สินค้า</h2>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table  table-striped table-hover table-condensed">
    <tr>
    <td width="10%" align="right">รหัสสินค้า</td>
    <td width="30%"><input type="text" name="txticcode" id="txticcode"></td>
    <td width="10%" align="right">ชื่อสินค้า</td>
    <td width="30%"><label for="txticcode">
      <input type="text" name="txtname" id="txtname">
    </label></td>
    <td width="10%" align="right">ขนาดบรรจุ</td>
    <td width="30%"><select name="txtsize" class="txt2"  id="txtsize" style="width:200px">
      <option value=""><? echo""?></option>
      <?
                  $sql3 = "SELECT * FROM tbsize";
$result3= mssql_query($sql3);
while($row3= mssql_fetch_array($result3)){
	?>
      <option value="<? echo $row3[idsize]?>"><? echo trim(iconv("tis-620","utf-8",$row3[sizename])) ?></option>
      <?
}
?>
    </select></td>
  </tr>
    <tr>
      <td align="right">รสชาติ</td>
      <td><select name="txtflavor" class="txt2"  id="txtflavor" style="width:200px">
        <option value=""><? echo""?></option>
        <?
                  	$sql2 = "SELECT * FROM flavor";
$result2= mssql_query($sql2);
while($row2= mssql_fetch_array($result2)){
	?>
        <option value="<? echo $row2[idflavor]?>"><? echo trim(iconv("tis-620","utf-8",$row2[flavorname])) ?></option>
        <?
}

?>
      </select></td>
      <td align="right">กลุ่มสินค้า</td>
      <td><select name="txtgroup" class="txt2"  id="txtgroup" style="width:200px">
        <option value=""><? echo""?></option>
        <?
                  	$sql4 = "SELECT * FROM itemgroup";
$result4= mssql_query($sql4);
while($row4= mssql_fetch_array($result4)){
	?>
        <option value="<? echo $row4[idgroup]?>"><? echo trim(iconv("tis-620","utf-8",$row4[groupname])) ?></option>
        <?
}
?>
      </select></td>
      <td align="right">บาร์โค้ด</td>
      <td><input type="text" name="txtbarcode" id="txtbarcode" ></td>
    </tr>
    <tr>
    <td align="right">ความถี่</td>
    <td><input type="text" name="txtfrequency" id="txtfrequency"></td>
    <td align="right">จำนวนรอบ</td>
    <td><input type="text" name="txtroundnumber" id="txtroundnumber"></td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td colspan="6" align="right"><button id="btadd" type="submit" VALUES="Add" name="btadd" class="btn btn-primary">เพิ่มข้อมูล</button>  <input class="btn btn-danger" type="reset" value="รีเซ็ท"></td>
    </tr>
</table>
</form>

<form action="" method="get" class="navbar-form" role="search" align="right">
          <input name="p" type="hidden" value="insertitem">
            <div class="input-group">
              <input type="text" class="search-query form-control"  name="txtKeyword" id="txtKeyword" value="<?php echo $_GET["txtKeyword"];?>" placeholder="Search">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit">ค้นหา</button>
              </div>
            </div>

</form>

  <table width="100%"  class="table table-bordered table-striped table-hover table-condensed">

      <tr>
        <td width="5%" height="32" align="center"><strong>ลำดับ</strong></td>
        <td width="10%" align="center"><strong>รหัสสินค้า</strong></td>
        <td width="30%" align="center"><strong>ชื่อสินค้า</strong></td>
        <td width="8%" align="center"><strong>รสชาติ</strong></td>
         <td width="8%" align="center"><strong>ขนาดบรรจุ</strong></td>
        <td width="8$" align="center"><strong>กลุ่มสินค้า</strong></td>
        <td width="10%" align="center"><strong>บาร์โค้ด</strong></td>
         <td width="8%" align="center"><strong>ความถี่/รอบ</strong></td>

        <td width="10%" align="center"><strong>-</strong></td>
      </tr>

      <?php

      if($_GET[txtKeyword]==""){

              $sql1="select * from item INNER JOIN itemgroup ON itemgroup.idgroup = item.idgroup INNER JOIN tbsize ON tbsize.idsize = item.idsize INNER JOIN flavor ON flavor.idflavor = item.idflavor order by iditem ASC";
      }
      else{
              $sql1 = "SELECT * FROM item INNER JOIN itemgroup ON itemgroup.idgroup = item.idgroup INNER JOIN tbsize ON tbsize.idsize = item.idsize INNER JOIN flavor ON flavor.idflavor = item.idflavor WHERE (iccode LIKE '%".$_GET["txtKeyword"]."%' or itemname LIKE '%".iconv("utf-8","tis-620",$_GET["txtKeyword"])."%' or flavor.flavorname LIKE '%".iconv("utf-8","tis-620",$_GET["txtKeyword"])."%' or tbsize.sizename LIKE '%".iconv("utf-8","tis-620",$_GET["txtKeyword"])."%' or itemgroup.groupname LIKE '%".iconv("utf-8","tis620",$_GET["txtKeyword"])."%' or barcode LIKE '%".iconv("utf-8","tis620",$_GET["txtKeyword"])."%' or frequency LIKE '%".$_GET["txtKeyword"]."%' or roundnumber LIKE '%".$_GET["txtKeyword"]."%')";

      }
      $result1=mssql_query($sql1);
       while($row1=mssql_fetch_array($result1))
      { ?>
      <tr>
        <td align="center"><?php echo $row1[iditem] ?></td>
        <td align="center"><?php echo $row1[iccode] ?></td>
        <td align="left"> <?php echo trim(iconv("tis-620","utf-8",$row1[itemname])) ?></td>
        <td align="center"><?php echo trim(iconv("tis-620","utf-8",$row1[flavorname])) ?></td>
        <td align="center"><?php echo trim(iconv("tis-620","utf-8",$row1[sizename])) ?></td>
        <td align="center"><?php echo trim(iconv("tis-620","utf-8",$row1[groupname])) ?></td>
        <td align="center"><?php echo $row1[barcode]?></td>
        <td align="center"><?php echo $row1[frequency]." / ".$row1[roundnumber] ?></td>

         <td><center><a href="<? echo"deleteitem.php?iditem=".$row1[iditem]."";?>" onclick="return confirm('คุณต้องการลบรสชาติชื่อ <? echo trim(iconv("tis-620","utf-8",$row1[itemname]))?> ใช่หรือไม่ ?');"><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash"></span></button></a></center></td>
      </tr>
      <?    } ?>
  </table>
</body>
</html>
