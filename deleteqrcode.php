<meta charset="utf8">
<?php
$idplace = $_GET["idplace"];
include"connect/dbconnect.php";
$sql="DELETE FROM createproductqr WHERE idcreateqr ='$idcreateqr'";
$result=mssql_query($sql);

if(!$result){
echo "<script>alert('ลบข้อมูลไม่สำเร็จ!');history.back();</script>";
exit();
}else{
echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
echo"<script>location.href='main.php?p=insertqrcode'</script>";
}
mssql_close();
?>
