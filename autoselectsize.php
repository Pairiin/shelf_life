<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include"connect/dbconnect.php";
  	$sql2 = "SELECT * FROM tbsize";
$result2= mssql_query($sql2);
while($row2= mssql_fetch_array($result2)){
	$data[]=$row2[];
}
?>