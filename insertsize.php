<meta charset="utf8">
<?php
  if($_POST["idsize"]<>"" and $_POST["sizename"]<>""){
    $sql = "INSERT INTO tbsize (idsize,sizename)
  VALUES (".$_POST["idsize"].",'".iconv("utf-8","tis-620",$_POST["sizename"])."')";

  $dbquery = mssql_query($sql);
  $_POST["idsize"]="";
  $_POST["sizename"]="";
  ?>
  <div class="alert alert-success fade in">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <center><strong>สำเร็จ!</strong> เพิ่มขนาดสินค้าสำเร็จ.</center>
  </div>

<? } ?>
<!DOCTYPE html>
<html>
<body>
<form action="#" method="post">
<div class="container">

  <h2 class="visible-xs bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล ขนาดสินค้า</h2>
  <h2 class="visible-sm bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล ขนาดสินค้า</h2>
  <h2 class="visible-md bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล ขนาดสินค้า</h2>
  <h2 class="visible-lg bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล ขนาดสินค้า</h2>

  <div class="container">
    <div class="form-group row">
    <div class="col-xs-2">
      <label for="ex1">รหัสไซต์</label>
      <input class="form-control" id="ex1" type="text" name="idsize">
    </div>
  </div>
<div class="form-group row">
    <div class="col-xs-3">
      <label for="ex2">ชื่อไซต์</label>
      <input class="form-control" id="ex2" type="text" name="sizename">
    </div>
  </div>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="btadd" type="submit" VALUES="Add" name="btadd" class="btn btn-primary">เพิ่มข้อมูล</button>
<input class="btn btn-danger" type="reset" value="รีเซ็ท">
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
        <td><?php echo iconv("tis-620","utf-8",$row1[sizename] )?></td>

        <td>

          <a href="<? echo"main.php?p=editsize&idsize=".$row1[idsize]."";?>"><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</button></a>
        </td>

        <!-- <td><button type="button" class="btn btn-default btn-sm" onclick="window.location.href='main.php?p=editsize'">
          <span class="glyphicon glyphicon-pencil"></span> Edit
        </button></td> -->

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
