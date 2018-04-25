
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include"connect/dbconnect.php";
 $sql1="select MAX(idstd) AS maxid from tbstd";
$result1= mssql_query($sql1);
$num1=mssql_num_rows($result1);
$row1=mssql_fetch_array($result1);
if($row1['maxid']<=0){
	$max1="1";
	}
	else{
		$max1=$row1['maxid']+1;
	}
if(!$result5)

$sql2="select calculation from tbcharacter where idcharacter=".$_POST[idcharacter]."";
$result2= mssql_query($sql2);
$row2=mssql_fetch_array($result2);
$txt1=trim($row2[calculation]);
if($txt1=="TEXT"){
 $sql = "INSERT INTO tbstd (idstd,iddetailcharacter,stdname,iditem,idcharacter,calculation)
  VALUES (".$max1.",".iconv("utf-8","tis-620",$_POST[txtdetailcahracter]).",'".iconv("utf-8","tis-620",$_POST[txtstd])."',".$_GET[iditem].",".$_POST[idcharacter].",'".$txt1."')";
}else{
	 $sql = "INSERT INTO tbstd (idstd,iddetailcharacter,stdname,iditem,idcharacter,stdmin,stdmax,calculation)
  VALUES (".$max1.",".iconv("utf-8","tis-620",$_POST[txtdetailcahracter]).",'".iconv("utf-8","tis-620",$_POST[txtstd])."',".$_GET[iditem].",".$_POST[idcharacter].",".$_POST[txtmin].",".$_POST[txtmax].",'".$txt1."')";
	}
  $dbquery = mssql_query($sql);
echo"<script>location.href='main.php?p=".$_GET[p]."&iditem=".$_GET[iditem]."&std=".$_GET[std]."'</script>"
?>
