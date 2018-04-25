<meta charset="utf8">
<?php
$idflavor = $_GET["idflavor"];
include"connect/dbconnect.php";
$sql="DELETE FROM flavor WHERE idflavor ='$idflavor'";
$result=mssql_query($sql);

if(!$result){
echo "<script>alert('ลบข้อมูลไม่สำเร็จ!');history.back();</script>";
exit();
}else{
echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
echo"<script>location.href='main.php?p=insertflavor'</script>";
}
mssql_close();
?>
