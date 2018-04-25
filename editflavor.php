<meta charset="utf8">
<?php
$idflavor = $_POST["idflavor"];
$flavorname = $_POST["flavorname"];
include"connect/dbconnect.php";

if(isset($_POST["idflavor"])){
$sql = "update flavor set idflavor='$idflavor',flavorname='".iconv("utf-8","tis-620",$flavorname)."' where idflavor=".$_GET[idflavor]."";
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
<form action="<? echo "main.php?p=editflavor&idflavor=".$_GET[idflavor].""?>" method="post">
<div class="container">
<?php $count=0; ?>
  <h2 class="visible-xs bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล รสชาติสินค้า</h2>
  <h2 class="visible-sm bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล รสชาติสินค้า</h2>
  <h2 class="visible-md bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล รสชาติสินค้า</h2>
  <h2 class="visible-lg bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล รสชาติสินค้า</h2>

  <div class="container">
    <div class="form-group row">
    <div class="col-xs-2">
      <label for="ex1">รหัสรสชาติ</label>
      <?php
      $idflavor = $_GET["idflavor"];
      $sql1="SELECT * FROM flavor where idflavor = $_GET[idflavor] ";
      $result1=mssql_query($sql1);
      $record1=mssql_fetch_array($result1);
      { ?>
      <input class="form-control" id="ex1" type="text" name="idflavor" value="<?php echo $record1[idflavor]?>">
    </div>

  </div>
<div class="form-group row">
    <div class="col-md-3">
      <label for="ex2">ชื่อรสชาติ</label>
      <input class="form-control" id="ex2" type="text" name="flavorname" value="<?php echo iconv("tis-620","utf-8",$record1[flavorname])?>">
    </div>
  </div>
  <?  } ?>
  <button id="btadd" name="save" type="submit" VALUES="Add" class="btn btn-primary">แก้ไขข้อมูล</button>
</div>

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
