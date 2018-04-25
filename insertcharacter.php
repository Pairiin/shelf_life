
<!DOCTYPE html>
<html>
<body>
<style>
<style type="text/css">
.txt2 {width: 500px; height: 300px}

.btn-glyphicon {
    padding:8px;
    background:#ffffff;
    margin-right:4px;
}
.icon-btn {
    padding: 1px 15px 3px 2px;
    border-radius:50px;
}
    </style>
<form action="<? echo"chaddcharacter.php?p=".$_GET[p].""?>" method="post">
<div class="container">
  <h2 class="visible-xs bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล ลักษณะการตรวจสอบ</h2>
  <h2 class="visible-sm bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล ลักษณะการตรวจสอบ</h2>
  <h2 class="visible-md bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล ลักษณะการตรวจสอบ</h2>
  <h2 class="visible-lg bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล ลักษณะการตรวจสอบ</h2>
  <?

   if($_GET[iditem]<=0){?>
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
          <?
}
?>
        </select>
      </strong></td>
    <tr>
    <td colspan="6" align="right"><button id="btadd" type="submit" VALUES="Add" name="btadd" class="btn btn-primary">เพิ่มข้อมูล</button>  <input class="btn btn-danger" type="reset" value="รีเซ็ท"></td>
    </tr>
</table>
<?
  }else{
  ?>
</form>

  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table  table-striped table-hover table-condensed">
  <tr>
    <td colspan="4">
      <?
                $sql2 = "SELECT * FROM item inner join tbsize on tbsize.idsize=item.idsize inner join flavor on flavor.idflavor=item.idflavor where iditem=".$_GET[iditem]."";
$result2= mssql_query($sql2);
$row2= mssql_fetch_array($result2);
echo "<strong>รายการสินค้า : </strong> ".trim(iconv("tis-620","utf-8",$row2[itemname]))." ".trim(iconv("tis-620","utf-8",$row2[sizename]))." ".trim(iconv("tis-620","utf-8",$row2[flavorname]));
?>
<td width="54" align="left">&nbsp;</td>
</tr>
  <tr>
    <td width="286" align="left"><strong><font color="#FF0000">ลักษณะ</strong></td>
    <td width="476" align="left">&nbsp;</td>
    <td width="760" align="left">&nbsp;</td>
    <td width="67"></td>
<td align="left"><a href="<? echo"main.php?p=insertcharacter&iditem=".$_GET[iditem]."&character=ADD"?>" class="btn icon-btn btn-success">
<span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success"></span>
Add
</a></td>
</tr>
  <?
     $sql3 = "SELECT * FROM tbcharacter where iditem=".$_GET[iditem]."";
$result3= mssql_query($sql3);
while($row3= mssql_fetch_array($result3)){
  ?>
   <tr>
    <td width="286" align="left"><? echo trim(iconv("tis-620","utf-8",$row3[charactername]))?></td>
    <td width="476" align="left"><? if(trim(iconv("tis-620","utf-8",$row3[calculation]))=="TEXT"){$textst="ตัวหนังสือ";}else{$textst="ตัวเลข";} echo "รูปแบบ : ".$textst;?></td>
    <td width="760" align="left">&nbsp;</td>
  <td></td>
    <td align="left"><a class="btn icon-btn btn-danger btn-xs" href="<? echo "deletecharacter.php?idcharacter=".$row3[idcharacter]."&p=".$_GET[p]."&iditem=".$_GET[iditem]."" ?>">
      <span class="glyphicon btn-glyphicon glyphicon-trash img-circle text-danger"></span>
      Delete
    </a></td>
    </tr>
  <?
}?>
<?
if($_GET[character]=="ADD"){
?>
  <form action="<? echo"cnn_addcharacter.php?p=".$_GET[p]."&iditem=".$_GET[iditem]."&character=".$_GET[character].""?>" method="post">
    <tr>
    <td width="286" align="left"><input name="txtcharacter" type="text" id="txtcharacter"></td>
    <td width="476" align="left">รูปแบบ
      <label for="textst"></label>
      <select name="textst" id="textst" style="width:150px">
        <option value="TEXT">ตัวหนังสือ</option>
        <option value="NUMBER">ตัวเลข</option>
      </select></td>
    <td width="760" align="left">&nbsp;</td>
  <td></td>
    <td><input class="btn btn-primary" type="submit" value="SAVE"></td>
  </tr>
  </form>
  <? }?>
  <tr>
    <td align="left">&nbsp;</td>
    <td align="left"><strong><font color="#0000FF">รายละเอียดลักษณะ</strong></td>
    <td align="left">&nbsp;</td>
    <td width="67"></td>
    <td align="left"><a href="<? echo"main.php?p=insertcharacter&iditem=".$_GET[iditem]."&detail=ADD"?>" class="btn icon-btn btn-success">
    <span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success"></span>
    Add
    </a></td>
    </tr>

  <?

    $sql3 = "SELECT * FROM detailcharacter inner join tbcharacter on detailcharacter.idcharacter=tbcharacter.idcharacter where tbcharacter.iditem=".$_GET[iditem]."";
$result3= mssql_query($sql3);
while($row3= mssql_fetch_array($result3)){
?>

  <tr>
    <td align="left"><? echo trim(iconv("tis-620","utf-8",$row3[charactername]))?></td>
    <td align="left"><? echo trim(iconv("tis-620","utf-8",$row3[detailcharactername]))?></td>
    <td></td>
      <td></td>
    <td align="left"><a class="btn icon-btn btn-danger btn-xs" href="<? echo "deletedetailcharacter.php?iddetailcharacter=".$row3[iddetailcharacter]."&p=".$_GET[p]."&iditem=".$_GET[iditem]."" ?>">
      <span class="glyphicon btn-glyphicon glyphicon-trash img-circle text-danger"></span>
      Delete
      </a></td>
    </tr>

  <? }?>
    <?
if($_GET[detail]=="ADD"){
?>

     <form action="<? echo"cnn_adddetailcharacter.php?p=".$_GET[p]."&iditem=".$_GET[iditem]."&detail=".$_GET[detail].""?>" method="post">
    <tr>
    <td width="286" align="left"><select name="idcharacter" class="txt2"  id="idcharacter" style="width:200px">
      <option value=""><? echo""?></option>
      <?

                  	$sql2 = "SELECT * FROM tbcharacter where iditem=".$_GET[iditem]."";
$result2= mssql_query($sql2);
while($row2= mssql_fetch_array($result2)){
	?>
      <option value="<? echo $row2[idcharacter]?>"><? echo trim(iconv("tis-620","utf-8",$row2[charactername])) ?></option>
      <?
}
?>
    </select></td>
    <td width="476" align="left"><input name="txtdetailcharacter" type="text"></td>
    <td width="760" align="left">&nbsp;</td>
    <td width="67"></td>
        <td width="67"><input class="btn btn-primary" type="submit" value="SAVE"></td>
  </tr>
  </form>
    <? }?>
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left"><strong><font color="#9400D3">มาตรฐาน</strong></td>
      <td></td>
      <td align="left"><a href="<? echo"main.php?p=insertcharacter&iditem=".$_GET[iditem]."&std=ADD"?>" class="btn icon-btn btn-success">
        <span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success"></span>
      Add
      </a></td>
    </tr><?
                  	$sql2 = "SELECT * FROM tbstd inner join tbcharacter on tbcharacter.idcharacter=tbstd.idcharacter inner join detailcharacter on detailcharacter.iddetailcharacter=tbstd.iddetailcharacter where tbstd.iditem=".$_GET[iditem]."";
$result2= mssql_query($sql2);
while($row2= mssql_fetch_array($result2)){
	?>
    <tr>
      <td align="left"><? echo trim(iconv("tis-620","utf-8",$row2[charactername])) ?></td>
      <td align="left"><? echo trim(iconv("tis-620","utf-8",$row2[detailcharactername])) ?></td>
      <td align="left"><? echo trim(iconv("tis-620","utf-8",$row2[stdname]))." MIN : ".$row2[stdmin]." MAX : ".$row2[stdmax] ?></td>
      <td>
        <a class="btn icon-btn btn-info btn-xs" href="<? echo"main.php?p=insertcharacter&iditem=".$_GET[iditem]."&std=".$row2["idstd"]."&edit=EDIT"?>">
          <span class="glyphicon btn-glyphicon glyphicon glyphicon-edit img-circle text-info"></span>
          Edit</a>
        </td>
      <td>
        <a class="btn icon-btn btn-danger btn-xs" href="<? echo "deletestd.php?idstd=".$row2[idstd]."&p=".$_GET[p]."&iditem=".$_GET[iditem]."" ?>">
          <span class="glyphicon btn-glyphicon glyphicon-trash img-circle text-danger"></span>
          Delete</a>
        </td>
    </tr>
    <? }?>
        <?
if($_GET[std]=="ADD"){
?>
      <form action="<? echo"cnn_addstd.php?p=".$_GET[p]."&iditem=".$_GET[iditem]."&std=".$_GET[std].""?>" method="post">

    <tr>
    <td align="left"><select name="idcharacter" class="txt2"  id="idcharacter" style="width:200px">
      <option value=""><? echo""?></option>
      <?
                  	$sql3 = "SELECT * FROM tbcharacter where iditem=".$_GET[iditem]."";
$result3= mssql_query($sql3);
while($row3= mssql_fetch_array($result3)){
	?>
      <option value="<? echo $row3[idcharacter]?>"><? echo trim(iconv("tis-620","utf-8",$row3[charactername])) ?></option>
      <?
}

?>
    </select></td>
    <td align="left"><select name="txtdetailcahracter" class="txt2"  id="txtdetailcahracter" style="width:200px">
      <option value=""><? echo""?></option>
      <?

                  	$sql4 = "SELECT * FROM detailcharacter where iditem=".$_GET[iditem]."";
$result4= mssql_query($sql4);
while($row4= mssql_fetch_array($result4)){
	?>
      <option value="<? echo $row4[iddetailcharacter]?>"><? echo trim(iconv("tis-620","utf-8",$row4[detailcharactername])) ?></option>
      <?
}
?>
    </select></td>
    <td align="left"><input name="txtstd" type="text" id="txtstd">
   
      MIN
      <input name="txtmin" type="text" id="txtmin" style="width:50px">
      MAX
      <input name="txtmax" type="text" id="txtmax" style="width:50px">
      
      
      </td>
    <td></td>
     <td><input class="btn btn-primary" type="submit" value="SAVE"></td>
  </tr>
  <?
}?>

<?
if($_GET[edit]=="EDIT"){

  $sql2 = "SELECT * FROM tbstd inner join tbcharacter on tbcharacter.idcharacter=tbstd.idcharacter inner join detailcharacter on detailcharacter.iddetailcharacter=tbstd.iddetailcharacter where tbstd.idstd=".$_GET[std]."";
$result2= mssql_query($sql2);
$row2= mssql_fetch_array($result2)
?>
      <form action="<? echo"cnn_addeditstd.php?p=".$_GET[p]."&iditem=".$_GET[iditem]."&std=".$_GET[std].""?>" method="post">
    <tr>
      <td></td>
      <td></td>
    <td align="left"><input name="txtstd" type="text" id="txtstd" value="<? echo iconv("tis-620","utf-8",$row2[stdname]) ?>">
      MIN
      <input name="txtmin" type="text" id="txtmin" style="width:50px" value="<? echo $row2[stdmin] ?>">
      MAX
      <input name="txtmax" type="text" id="txtmax" style="width:50px" value="<? echo $row2[stdmax] ?>"></td>
    <td></td>
        <td><input class="btn btn-primary" type="submit" value="UPDATE"></td>
  </tr>
  <?
}?>
</table>
<? }?>
</body>
</html>
