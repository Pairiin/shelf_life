
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include"connect/dbconnect.php";
 $sql1 = "update tbstd set stdname='".iconv("utf-8","tis-620",$_POST[txtstd])."',stdmin=".$_POST[txtmin].",stdmax=".$_POST[txtmax]." where idstd=".$_GET[std]."";
  $dbquery = mssql_query($sql1);


$sql2 = "update tblogstd set stdname='".iconv("utf-8","tis-620",$_POST[txtstd])."',stdmin=".$_POST[txtmin].",stdmax=".$_POST[txtmax]." where idstd=".$_GET[std]."";
 $dbquery = mssql_query($sql2);
 echo"<script>location.href='main.php?p=".$_GET[p]."&iditem=".$_GET[iditem]."&std=".$_GET[std]."'</script>"

?>
