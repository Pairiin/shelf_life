<?php
$host="Rin-PC\sqlexpress";
$username="sa";
$password="1234";
$dbname="shelflife";
ini_set('mssql.charset', 'tis620');
$Conn=mssql_connect($host,$username,$password);
$selected = mssql_select_db($dbname,$Conn);
if( !mssql_select_db ) {
  echo "<script>alert('disconnect database !');history.back();</script>";
  exit();
  }


?>
