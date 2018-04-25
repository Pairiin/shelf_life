<meta charset="utf8">
<?php
$idflavor = $_POST["txticcode"];
$txtname = $_POST["txtname"];
$txtsize = $_POST["txtsize"];
$txtflavor = $_POST["txtflavor"];
$txtgroup = $_POST["txtgroup"];
$txtbarcode = $_POST["txtbarcode"];
$txtfrequency = $_POST["txtfrequency"];
$txtroundnumber = $_POST["txtroundnumber"];
include"connect/dbconnect.php";

if(isset($_POST["txticcode"])){
$sql = "update flavor set txticcode='$txticcode',txtname='".iconv("utf-8","tis-620",$txtname)."',txtsize='$txtsize',txtflavor='$txtflavor',txtgroup='$txtgroup',txtbarcode='$txtbarcode',txtfrequency='$txtfrequency',txtroundnumber='$txtroundnumber' where iditem=".$_GET[iditem]."";
$dbquery = mssql_query($sql);
?>
<script lanuage ="java script">
            alert ('แก้ไขข้อมูลแล้ว');
        </script>
      <?php
        echo"<script>location.href='main.php?p=insertflavor'</script>";
      }
        ?>
<?php //echo"<script>location.href='main.php?p=insertflavor'</script>";  } ?>

<!DOCTYPE html>
<html>
<body>
<form action="<? echo "main.php?p=edititem&iditem=".$_GET[iditem].""?>" method="post">
<div class="container">
<?php $count=0; ?>
  <h2 class="visible-xs bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล สินค้า</h2>
  <h2 class="visible-sm bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล สินค้า</h2>
  <h2 class="visible-md bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล สินค้า</h2>
  <h2 class="visible-lg bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล สินค้า</h2>

  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table  table-striped table-hover table-condensed">
    <tr>
    <td width="10%" align="right">รหัสสินค้า</td>
    <?php $iditem = $_GET["iditem"];
    $sql1="SELECT * FROM item where iditem = $_GET[iditem] ";
    $result1=mssql_query($sql1);
    $record1=mssql_fetch_array($result1);
    { ?>
    <td width="30%"><input type="text" name="txticcode" id="txticcode"></td>
    <?  } ?>
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
      <? } ?>
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
      <td><input type="text" name="txtbarcode" id="txtbarcode"></td>
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

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="btadd" name="save" type="submit" VALUES="Add" class="btn btn-primary">แก้ไขข้อมูล</button>
</form>

</form>
  <div class="container">
  <div class="col-md-12">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>รหัสรสชาติ</th>
        <th>ชื่อรสชาติ</th>
        <th>แก้ไขข้อมูล</th>
        <th>ลบข้อมูล</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql1="select * from flavor order by idflavor ASC";
      $result1=mssql_query($sql1);
       while($row1=mssql_fetch_array($result1))
      { ?>
      <tr>
        <td><?php echo $row1[idflavor] ?></td>
        <td><?php echo iconv("tis-620","utf-8",$row1[flavorname]) ?></td>
        <td><button type="button" class="btn btn-default btn-sm" onclick="window.location.href='main.php?p=insertflavor'">
          <span class="glyphicon glyphicon-pencil"></span> Edit
        </button></td>
        <td>
          <a href="<? echo"deleteflavor.php?idflavor=".$row1[idflavor]."";?>" onclick="return confirm('คุณต้องการลบรสชาติชื่อ <? echo trim(iconv("tis-620","utf-8",$row1[flavorname]))?> ใช่หรือไม่ ?');"><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</button></a>
        </td>
      </tr>
      <?    } ?>
    </tbody>
  </table>
  </div>
</div>
</div>
</body>
</html>
