<meta charset="utf8">
<?php
include"connect/dbconnect.php";
$sql1="DELETE FROM tbcharacter WHERE idcharacter=".$_GET[idcharacter]."";
$result=mssql_query($sql1);

if(!$result){
echo "<script>alert('ลบข้อมูลไม่สำเร็จ!');history.back();</script>";
exit();
}else{
echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
echo"<script>location.href='main.php?p=".$_GET[p]."&iditem=".$_GET[iditem]."'</script>";
}
mssql_close();

?>
