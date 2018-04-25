<meta charset="utf8">
<?php
$iditem = $_GET["iditem"];
include"connect/dbconnect.php";
$sql="DELETE FROM item WHERE iditem ='$iditem'";
$result=mssql_query($sql);

if(!$result){
echo "<script>alert('ลบข้อมูลไม่สำเร็จ!');history.back();</script>";
exit();
}else{
echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
echo"<script>location.href='main.php?p=insertitem'</script>";
}
mssql_close();
?>
