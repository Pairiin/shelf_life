
<?php
  echo $_GET[add1];

  $sql2="select MAX(numberjob) AS maxid from tbjob where iditem=".$_GET[iditem]."";
  $result2= mssql_query($sql2);
  $row2=mssql_fetch_array($result2);
  if($row2['maxid']<=0){
    $number1=1;
    }
    else{
      $number1=$row2['maxid']+1;
    }
?>
<!DOCTYPE html>
<html>
<body>

<style>
<style type="text/css">
.txt2 {width: 500px; height: 300px}
    </style>
<form action="<? echo"chaddcharacter.php?p=".$_GET[p].""?>" method="post">
<div class="container">

  <h2 class="visible-xs bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล ลักษณะ</h2>
  <h2 class="visible-sm bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล ลักษณะ</h2>
  <h2 class="visible-md bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล ลักษณะ</h2>
  <h2 class="visible-lg bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล ลักษณะ</h2>


  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table  table-striped table-hover table-condensed">
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
  <? } ?>
        </select>
      </strong></td>
    <tr>
    <td colspan="6" align="right">
      <button id="btadd" type="submit" VALUES="Add" name="btadd" class="btn btn-primary">เพิ่มข้อมูล</button>  <input class="btn btn-danger" type="reset" value="รีเซ็ท"></td>
    </tr>
</table>
</form>
         <?
	  $sql4="select * from item where iditem=".$_GET[iditem]."";
$result4= mssql_query($sql4);
$num4=mssql_num_rows($result4);
$row4=mssql_fetch_array($result4);
?>
<form action="<? echo "inserttbjob.php?iditem=".$_GET[iditem].""?>" method="POST">
<table width="100%" border="1" cellspacing="0" cellpadding="1" class="table  table-striped table-hover table-condensed">
<? $sql1="select * from tbcharacter where iditem=".$_GET[iditem]."";
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

	  $sql2="select * from detailcharacter where iditem=".$_GET[iditem]." and idcharacter=".$row1[idcharacter]." order by idcharacter ASC";
$result2= mssql_query($sql2);
$num2=mssql_num_rows($result2);
while($row2=mssql_fetch_array($result2)){

	$sql3="select * from tbstd where iditem=".$_GET[iditem]." and idcharacter=".$row1[idcharacter]." and iddetailcharacter=".$row2[iddetailcharacter]." order by iddetailcharacter ASC";
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
      <input type="text" name=<? echo "text".$row3[idstd];?> id=<? echo "text".$row3[idstd];?> onKeyPress="CheckNum()" style="width:80px"></td>
    <? }
	else{?>
		<td>
      <? $sql11="select numberstd from tbjob where iditem=".$row3[iditem]." and idcharacter=".$row3[idcharacter]."
      and iddetailcharacter=".$row3[iddetailcharacter]." and idstd=".$row3[idstd]." and numberjob=".$i13."";
      $dbquery11 = mssql_query($sql11);
      while($row11=mssql_fetch_array($dbquery11)){
        echo $row11[numberstd];
      }
      ?>


    </td>
	<?	}
	?>

<? }?>

  </tr>

  <? } }}?>
</table>
<input type="submit" name="submit">
</form>
</body>
</html>
