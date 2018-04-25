<?php
if($_POST[userlogin]<>""){
$userlogin=$_POST[userlogin];
$passlogin=$_POST[passlogin];
include"connect/dbconnect.php";
$sql="select * from login where userlogin='$userlogin' and passlogin='$passlogin'";
$result=mssql_query($sql);
$num=mssql_num_rows($result);
$row=mssql_fetch_array($result);

if($num > 0){
echo"<script>location.href='main.php?p=checknow&txtstart=".date("d-m-Y")."&txtend=".date("d-m-Y")."'</script>";
}
else{
  echo "<meta http-equiv='refresh' content='0;URL=login.php?id=fail'>";
}

	mssql_close();
}
?>
