<meta charset="utf8">
<?php

$placename = $_POST["placename"];
include"connect/dbconnect.php";

if(isset($_POST["placename"])){
$sql = "update place set placename='".iconv("utf-8","tis-620",$placename)."' where idplace=".$_GET[idplace]."";
$dbquery = mssql_query($sql);
?>

<script lanuage ="java script">
            alert ('แก้ไขข้อมูลแล้ว');
        </script>
      <?php
        echo"<script>location.href='main.php?p=insertplace'</script>";
      }
        ?>
<?php //echo"<script>location.href='main.php?p=insertsize'</script>";  } ?>

<!DOCTYPE html>
<html>
<body>
<form action="<? echo "main.php?p=editplace&idplace=".$_GET[idplace].""?>" method="post">
<div class="container">
<?php $count=0; ?>
  <h2 class="visible-xs bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล สถานที่เก็บ</h2>
  <h2 class="visible-sm bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล สถานที่เก็บ</h2>
  <h2 class="visible-md bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล สถานที่เก็บ</h2>
  <h2 class="visible-lg bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล สถานที่เก็บ</h2>

  <div class="container">
    <div class="form-group row">
    <div class="col-md-2">
      <label for="ex1">รหัสสถานที่</label>
      <?php
      $idsize = $_GET["idplace"];
      $sql1="SELECT * FROM place where idplace = $_GET[idplace] ";
      $result1=mssql_query($sql1);
      $record1=mssql_fetch_array($result1);
      { ?>
      <input class="form-control" id="ex1" type="text" name="idplace" value="<?php echo $record1[idplace]?>" readonly="true">
    </div>

  </div>
<div class="form-group row">
    <div class="col-md-3">
      <label for="ex2">ชื่อสถานที่</label>
      <input class="form-control" id="ex2" type="text" name="placename" value="<?php echo iconv("tis-620","utf-8",$record1[placename])?>">
    </div>
  </div>
  <?  } ?>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="btadd" name="save" type="submit" VALUES="Add" class="btn btn-primary">แก้ไขข้อมูล</button>

</form>
  <div class="container">
  <div class="col-md-12">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>รหัสสถานที่</th>
        <th>ชื่อสถานที่</th>
        <th>แก้ไขข้อมูล</th>
        <th>ลบข้อมูล</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql1="select * from place order by idplace ASC";
      $result1=mssql_query($sql1);
       while($row1=mssql_fetch_array($result1))
      { ?>
      <tr>
        <td><?php echo $row1[idplace] ?></td>
        <td><?php echo iconv("tis-620","utf-8",$row1[placename]) ?></td>
        <td><button type="button" class="btn btn-default btn-sm" onclick="window.location.href='main.php?p=insertplace'">
          <span class="glyphicon glyphicon-pencil"></span> Edit
        </button></td>
        <td>
          <a href="<? echo"deleteplace.php?idplace=".$row1[idplace]."";?>" onclick="return confirm('คุณต้องการลบสถานที่ชื่อ <? echo trim(iconv("tis-620","utf-8",$row1[placename]))?> ใช่หรือไม่ ?');"><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</button></a>
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
