<meta charset="utf8">
<?php
  if($_POST["placename"]<>""){
    $sql1 = "select MAX(idplace) AS maxid from place";
    $result1= mssql_query($sql1);
    $row1=mssql_fetch_array($result1);

    if($row1['maxid']<=0){
      $maxid = 1;
    }
    else{
      $maxid = $row1['maxid']+1;
    }

    $sql2 = "INSERT INTO place (idplace,placename)
  VALUES (".$maxid.",'".iconv("utf-8","tis-620",$_POST["placename"])."')";

  $dbquery = mssql_query($sql2);
  $_POST["idplace"]="";
  $_POST["placename"]="";
  ?>
  <div class="alert alert-success fade in">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <center><strong>สำเร็จ!</strong> เพิ่มสถานที่เก็บสินค้าสำเร็จ.</center>
  </div>

<? } ?>
<!DOCTYPE html>
<html>
<body>
<form action="#" method="post">
<div class="container">

  <h2 class="visible-xs bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล สถานที่เก็บสินค้า</h2>
  <h2 class="visible-sm bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล สถานที่เก็บสินค้า</h2>
  <h2 class="visible-md bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล สถานที่เก็บสินค้า</h2>
  <h2 class="visible-lg bg-info"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูล สถานที่เก็บสินค้า</h2>

  <div class="container">

<div class="form-group row">
    <div class="col-xs-3">
      <label for="ex2">ชื่อสถานที่</label>
      <input class="form-control" id="ex2" type="text" name="placename">
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
      $sql1="select * from place order by idplace ASC";
      $result1=mssql_query($sql1);
       while($row1=mssql_fetch_array($result1))
      { ?>
      <tr>
        <td><?php echo $row1[idplace] ?></td>
        <td><?php echo iconv("tis-620","utf-8",$row1[placename])?></td>

        <td>

          <a href="<? echo"main.php?p=editplace&idplace=".$row1[idplace]."";?>"><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</button></a>
        </td>

        <!-- <td><button type="button" class="btn btn-default btn-sm" onclick="window.location.href='main.php?p=editsize'">
          <span class="glyphicon glyphicon-pencil"></span> Edit
        </button></td> -->
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
