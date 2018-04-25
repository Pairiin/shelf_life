
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include"connect/dbconnect.php";
 $sql1="select MAX(iddetailcharacter) AS maxid from detailcharacter";
$result1= mssql_query($sql1);
$num1=mssql_num_rows($result1);
$row1=mssql_fetch_array($result1);
if($row1['maxid']<=0){
	$max1="1";
	}
	else{
		$max1=$row1['maxid']+1;
	}
 $sql = "INSERT INTO detailcharacter (iddetailcharacter,detailcharactername,iditem,idcharacter)
  VALUES (".$max1.",'".iconv("utf-8","tis-620",$_POST[txtdetailcharacter])."',".$_GET[iditem].",".$_POST[idcharacter].")";

  $dbquery = mssql_query($sql);
echo"<script>location.href='main.php?p=".$_GET[p]."&iditem=".$_GET[iditem]."&detail=".$_GET[detail]."'</script>"
?>