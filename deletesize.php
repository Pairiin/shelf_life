<meta charset="utf8">
<?php
$idsize = $_GET["idsize"];
include"connect/dbconnect.php";
$sql="DELETE FROM tbsize WHERE idsize ='$idsize'";
$result=mssql_query($sql);

if(!$result){
echo "<script>alert('ลบข้อมูลไม่สำเร็จ!');history.back();</script>";
exit();
}else{
echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
echo"<script>location.href='main.php?p=insertsize'</script>";
}
mssql_close();
?>
