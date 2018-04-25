<?php
  if($_POST["idflavor"]<>"" and $_POST["flavorname"]<>""){
    $sql = "INSERT INTO flavor (idflavor,flavorname)
  VALUES (".$_POST["idflavor"].",'".iconv("utf-8","tis-620",$_POST["flavorname"])."')";

  $dbquery = mssql_query($sql);
  $_POST["idflavor"]="";
  $_POST["flavorname"]="";
  ?>
  <div class="alert alert-success fade in">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <center><strong>สำเร็จ!</strong> เพิ่มรสชาติสินค้าสำเร็จ.</center>
  </div>

<? } ?>
<!DOCTYPE html>
<html>
<body>
<form action="#" method="post">
<div class="container">

  <h2 class="visible-xs bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล รสชาติสินค้า</h2>
  <h2 class="visible-sm bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล รสชาติสินค้า</h2>
  <h2 class="visible-md bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล รสชาติสินค้า</h2>
  <h2 class="visible-lg bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล รสชาติสินค้า</h2>

  <div class="container">
    <div class="form-group row">
    <div class="col-md-2">
      <label for="ex1">รหัสรสชาติ</label>
      <input class="form-control" id="ex1" type="text" name="idflavor">
    </div>
  </div>
<div class="form-group row">
    <div class="col-md-3">
      <label for="ex2">ชื่อรสชาติ</label>
      <input class="form-control" id="ex2" type="text" name="flavorname">
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
        <td>
          <a href="<? echo"main.php?p=editflavor&idflavor=".$row1[idflavor]."";?>"><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</button></a>
        </td>

        <!-- <td><button type="button" class="btn btn-default btn-sm" onclick="window.location.href='main.php?p=editsize'">
          <span class="glyphicon glyphicon-pencil"></span> Edit
        </button></td> -->
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
