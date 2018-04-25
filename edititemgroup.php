<meta charset="utf8">
<?php
$idgroup = $_POST["idgroup"];
$groupname = $_POST["groupname"];
include"connect/dbconnect.php";

if(isset($_POST["idgroup"])){
$sql = "update itemgroup set idgroup='$idgroup',groupname='".iconv("utf-8","tis-620",$groupname)."' where idgroup=".$_GET[idgroup]."";
$dbquery = mssql_query($sql);
?>
<script lanuage ="java script">
            alert ('แก้ไขข้อมูลแล้ว');
        </script>
      <?php
        echo"<script>location.href='main.php?p=insertitemgroup'</script>";
      }
        ?>
<?php //echo"<script>location.href='main.php?p=insertflavor'</script>";  } ?>

<!DOCTYPE html>
<html>
<body>
<form action="<? echo "main.php?p=edititemgroup&idgroup=".$_GET[idgroup].""?>" method="post">
<div class="container">
<?php $count=0; ?>
  <h2 class="visible-xs bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล กลุ่มสินค้า</h2>
  <h2 class="visible-sm bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล กลุ่มสินค้า</h2>
  <h2 class="visible-md bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล กลุ่มสินค้า</h2>
  <h2 class="visible-lg bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล กลุ่มสินค้า</h2>

  <div class="container">
    <div class="form-group row">
    <div class="col-md-2">
      <label for="ex1">รหัสรสชาติ</label>
      <?php
      $idflavor = $_GET["idgroup"];
      $sql1="SELECT * FROM itemgroup where idgroup = $_GET[idgroup] ";
      $result1=mssql_query($sql1);
      $record1=mssql_fetch_array($result1);
      { ?>
      <input class="form-control" id="ex1" type="text" name="idgroup" value="<?php echo $record1[idgroup]?>">
    </div>
  </div>
<div class="form-group row">
    <div class="col-md-3">
      <label for="ex2">ชื่อรสชาติ</label>
      <input class="form-control" id="ex2" type="text" name="groupname" value="<?php echo iconv("tis-620","utf-8",$record1[groupname])?>">
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
        <th>รหัสกลุ่ม</th>
        <th>ชื่อกลุ่ม</th>
        <th>แก้ไขข้อมูล</th>
        <th>ลบข้อมูล</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql1="select * from itemgroup order by idgroup ASC";
      $result1=mssql_query($sql1);
       while($row1=mssql_fetch_array($result1))
      { ?>
      <tr>
        <td><?php echo $row1[idgroup] ?></td>
        <td><?php echo iconv("tis-620","utf-8",$row1[groupname] )?></td>
        <td><button type="button" class="btn btn-default btn-sm" onclick="window.location.href='main.php?p=insertitemgroup'">
          <span class="glyphicon glyphicon-pencil"></span> Edit
        </button></td>
        <td>
          <a href="<? echo"deleteitemgroup.php?idgroup=".$row1[idgroup]."";?>" onclick="return confirm('คุณต้องการลบกลุ่มชื่อ <? echo trim(iconv("tis-620","utf-8",$row1[groupname]))?> ใช่หรือไม่ ?');"><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</button></a>
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
