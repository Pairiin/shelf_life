
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
      <center><strong>สำเร็จ!</strong> เพิ่มรายละเอียดลักษณะการตรวจสำเร็จ.</center>
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

  <h2 class="visible-xs bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล รายละเอียด</h2>
  <h2 class="visible-sm bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล รายละเอียด</h2>
  <h2 class="visible-md bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล รายละเอียด</h2>
  <h2 class="visible-lg bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล รายละเอียด</h2>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table  table-striped table-hover table-condensed">
    <tr>
    <td width="10%" align="right">รหัสรายละเอียด</td>
    <td width="30%"><input type="text" name="detailcharacter" id="detailcharacter"></td>
    <td width="10%" align="right">ชื่อรายละเอียด</td>
    <td width="30%"><label for="txticcode">
      <input type="text" name="detailcharacter" id="detailcharacter">
    </label></td>


  </tr>
    <tr>
      <td width="10%" align="right"><strong>สินค้า</strong></td>
      <td width="40%"><strong>
        <select name="txtitem" class="txt2"  id="txtitem" style="width:400px">
          <option value=""><? echo""?></option>
          <?

                    	$sql2 = "SELECT * FROM item inner join tbsize on tbsize.idsize=item.idsize inner join flavor on flavor.idflavor=item.idflavor ";
  $result2= mssql_query($sql2);
  while($row2= mssql_fetch_array($result2)){
  	?>
          <option value="<? echo $row2[iditem]?>"><? echo trim(iconv("tis-620","utf-8",$row2[itemname]))." ".trim(iconv("tis-620","utf-8",$row2[sizename]))." ".trim(iconv("tis-620","utf-8",$row2[flavorname]))?></option>
          <?
  }

  ?>
        </select>
      </strong></td>
    </tr>
  <tr>
    <td colspan="6" align="right"><button id="btadd" type="submit" VALUES="Add" name="btadd" class="btn btn-primary">เพิ่มข้อมูล</button>  <input class="btn btn-danger" type="reset" value="รีเซ็ท"></td>
    </tr>
</table>
</form>
  <table width="100%"  class="table table-bordered table-striped table-hover table-condensed">
      <tr>
        <td width="5%" height="32" align="center"><strong>ลำดับ</strong></td>
        <td width="8%" align="center"><strong>ชื่อรายละเอียด</strong></td>
        <td width="10%" align="center"><strong>-</strong></td>

      </tr>

      <?php
      $i=0;
      $sql1="select * from detailcharacter  INNER JOIN item ON item.iditem = detailcharacter.iditem INNER JOIN flavor ON flavor.idflavor=item.idflavor order by iddetailcharacter ASC";
      $result1=mssql_query($sql1);
       while($row1=mssql_fetch_array($result1))
      {
        $i++;
        ?>
      <tr>
        <td align="center"><?php echo $i ?></td>
        <td align="center"><?php echo $row1[detailcharactername] ?></td>
        <td align="center"><?php echo trim(iconv("tis-620","utf-8",$row1[itemname])).trim(iconv("tis-620","utf-8",$row1[falvorname])) ?></td>
        <td align="center"><a href="<? echo"main.php?p=editflavor&idflavor=".$row1[idflavor]."";?>"><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span></button></a> <a href="<? echo"deleteflavor.php?idflavor=".$row1[idflavor]."";?>" onclick="return confirm('คุณต้องการลบรสชาติชื่อ <? echo trim(iconv("tis-620","utf-8",$row1[flavorname]))?> ใช่หรือไม่ ?');"><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash"></span></button></a></td>


      </tr>
      <?    } ?>

  </table>

</body>
</html>
