<?php
  if($_POST["idgroup"]<>"" and $_POST["groupname"]<>""){
    $sql = "INSERT INTO itemgroup (idgroup,groupname)
  VALUES (".$_POST["idgroup"].",'".iconv("utf-8","tis-620",$_POST["groupname"])."')";

  $dbquery = mssql_query($sql);
  $_POST["idgroup"]="";
  $_POST["groupname"]="";
  ?>
  <div class="alert alert-success fade in">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <center><strong>สำเร็จ!</strong> เพิ่มกลุ่มสินค้าสำเร็จ.</center>
  </div>
<? } ?>
<!DOCTYPE html>
<html>
<body style="min-heigth">
<form action="#" method="post">
<div class="container">

  <h2 class="visible-xs bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล กลุ่มสินค้า</h2>
  <h2 class="visible-sm bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล กลุ่มสินค้า</h2>
  <h2 class="visible-md bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล กลุ่มสินค้า</h2>
  <h2 class="visible-lg bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล กลุ่มสินค้า</h2>

  <div class="container">
    <div class="form-group row">
    <div class="col-xs-2">
      <label for="ex1">รหัสกลุ่ม</label>
      <input class="form-control" id="ex1" type="text" name="idgroup">
    </div>
  </div>
<div class="form-group row">
    <div class="col-xs-3">
      <label for="ex2">ชื่อกลุ่ม</label>
      <input class="form-control" id="ex2" type="text" name="groupname">
    </div>
  </div>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="btadd" type="submit" VALUES="Add" name="btadd" class="btn btn-primary">เพิ่มข้อมูล</button>
<input class="btn btn-danger" type="reset" value="รีเซ็ท">
</form>
  <div class="container">
  <div class="col-md-12" style="min-height : 1080 px ;">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>รหัสกลุ่ม</th>
        <th>ชื่อกลุ่มสินค้า</th>
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
        <td><?php echo iconv("tis-620","utf-8",$row1[groupname]) ?></td>

        <td>

          <a href="<? echo"main.php?p=edititemgroup&idgroup=".$row1[idgroup]."";?>"><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</button></a>
        </td>
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
