<meta charset="utf8">
<?php
$idgroup = $_GET["idgroup"];
include"connect/dbconnect.php";
$sql="DELETE FROM itemgroup WHERE idgroup ='$idgroup'";
$result=mssql_query($sql);

if(!$result){
echo "<script>alert('ลบข้อมูลไม่สำเร็จ!');history.back();</script>";
exit();
}else{
echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
echo"<script>location.href='main.php?p=insertitemgroup'</script>";
}
mssql_close();
?>
