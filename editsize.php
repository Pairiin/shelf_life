<meta charset="utf8">
<?php
$idsize = $_POST["idsize"];
$sizename = $_POST["sizename"];
include"connect/dbconnect.php";

if(isset($_POST["idsize"])){
$sql = "update tbsize set idsize='$idsize',sizename='".iconv("utf-8","tis-620",$sizename)."' where idsize=".$_GET[idsize]."";
$dbquery = mssql_query($sql);
?>

<script lanuage ="java script">
            alert ('แก้ไขข้อมูลแล้ว');
        </script>
      <?php
        echo"<script>location.href='main.php?p=insertsize'</script>";
      }
        ?>
<?php //echo"<script>location.href='main.php?p=insertsize'</script>";  } ?>

<!DOCTYPE html>
<html>
<body>
<form action="<? echo "main.php?p=editsize&idsize=".$_GET[idsize].""?>" method="post">
<div class="container">
<?php $count=0; ?>
  <h2 class="visible-xs bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล ขนาดสินค้า</h2>
  <h2 class="visible-sm bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล ขนาดสินค้า</h2>
  <h2 class="visible-md bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล ขนาดสินค้า</h2>
  <h2 class="visible-lg bg-info"><span class="glyphicon glyphicon-pencil"></span> แก้ไขข้อมูล ขนาดสินค้า</h2>

  <div class="container">
    <div class="form-group row">
    <div class="col-md-2">
      <label for="ex1">รหัสไซต์</label>
      <?php
      $idsize = $_GET["idsize"];
      $sql1="SELECT * FROM tbsize where idsize = $_GET[idsize] ";
      $result1=mssql_query($sql1);
      $record1=mssql_fetch_array($result1);
      { ?>
      <input class="form-control" id="ex1" type="text" name="idsize" value="<?php echo $record1[idsize]?>">
    </div>
  </div>
<div class="form-group row">
    <div class="col-md-3">
      <label for="ex2">ชื่อไซต์</label>
      <input class="form-control" id="ex2" type="text" name="sizename" value="<?php echo iconv("tis-620","utf-8",$record1[sizename])?>">
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
        <th>รหัสไซต์</th>
        <th>ชื่อไซต์</th>
        <th>แก้ไขข้อมูล</th>
        <th>ลบข้อมูล</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql1="select * from tbsize order by idsize ASC";
      $result1=mssql_query($sql1);
       while($row1=mssql_fetch_array($result1))
      { ?>
      <tr>
        <td><?php echo $row1[idsize] ?></td>
        <td><?php echo iconv("tis-620","utf-8",$row1[sizename]) ?></td>
        <td><button type="button" class="btn btn-default btn-sm" onclick="window.location.href='main.php?p=insertsize'">
          <span class="glyphicon glyphicon-pencil"></span> Edit
        </button></td>
        <td>
          <a href="<? echo"deletesize.php?idsize=".$row1[idsize]."";?>" onclick="return confirm('คุณต้องการลบขนาดชื่อ <? echo trim(iconv("tis-620","utf-8",$row1[sizename]))?> ใช่หรือไม่ ?');"><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</button></a>
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
