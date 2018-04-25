<meta charset="utf-8">
<?php
 include"connect/dbconnect.php";
 $sql5 = "select * from tblogstd where idcreateqrcode = ".$_GET[idqr]."";
 $result5= mssql_query($sql5);
 $num5=mssql_num_rows($result5);

 $sql0="select iditem from createproductqr where idcreateqr=".$_GET[idqr]."";
  $result0= mssql_query($sql0);
  $row0=mssql_fetch_array($result0);

   $sql3 = "select * from item where iditem=".$row0[iditem]."";

  $dbquery3 = mssql_query($sql3);
  $row3=mssql_fetch_array($dbquery3);

 $sql1="select * from tbstd where iditem=".$row0[iditem]." ";
$dbquery = mssql_query($sql1);
 while($row1=mssql_fetch_array($dbquery))
{
  // echo $row1[idstd]."<br>";
  $sql2="select MAX(numberjob) AS maxid from tbjob where iditem=".$row1[iditem]." and idcharacter=".$row1[idcharacter]."
and iddetailcharacter=".$row1[iddetailcharacter]." and idstd=".$row1[idstd]."";
  $result2= mssql_query($sql2);
  $row2=mssql_fetch_array($result2);
  if($row2['maxid']<=0){
  	$numberjob=1;
    $datenext = date("Y-m-d",(strtotime("+$row3[frequency] month",strtotime(date("Y-m-d")))));
  	}
  	else{
      $sql4="select datenext from tbjob where iditem=".$row1[iditem]." and idcharacter=".$row1[idcharacter]."
    and iddetailcharacter=".$row1[iddetailcharacter]." and idstd=".$row1[idstd]." and numberjob=".$row2[maxid]."";
      $result4= mssql_query($sql4);
      $row4=mssql_fetch_array($result4);
      $numberjob=$row2['maxid']+1;
    $datenext = date("Y-m-d",strtotime("+$row3[frequency] month",strtotime(date("Y-m-d",strtotime($row4[datenext])))));
  	}

if(!$num5){
/*$namestd=iconv("utf-8","tis-620",$row1[stdname]);*/
$namestd=$row1[stdname];
$namest=$row1[calculation];
if(trim($row1[calculation])=="NUMBER"){

 $sql6 = "INSERT INTO tblogstd (idstd,stdname,iddetailcharacter,idcharacter,stdmin,stdmax,iditem,idcreateqrcode,calculation)
     VALUES (".$row1[idstd].",'".$namestd."',".$row1[iddetailcharacter].",".$row1[idcharacter].",".$row1[stdmin].",".$row1[stdmax].",".$row1[iditem].",".$_GET[idqr].",'".$namest."')";
     $result6=mssql_query($sql6);
}else{
	
	 $sql6 = "INSERT INTO tblogstd (idstd,stdname,iddetailcharacter,idcharacter,iditem,idcreateqrcode,calculation)
     VALUES (".$row1[idstd].",'".$namestd."',".$row1[iddetailcharacter].",".$row1[idcharacter].",".$row1[iditem].",".$_GET[idqr].",'".$namest."')";
     $result6=mssql_query($sql6);
	}
   }
   
   if(trim($row1[calculation])=="NUMBER"){
	   
	   $aa="numberstd";}else{$aa="stdjob";}
	   $namestd=$row1[stdname];
$namest=$row1[calculation];
  $sql3 = "INSERT INTO tbjob (iditem,idcharacter,iddetailcharacter,idstd,numberjob,".$aa.",idcreateqrcode,datenext,dateadd,calculation)
    VALUES (".$row1[iditem].",".$row1[idcharacter].",".$row1[iddetailcharacter].",".$row1[idstd].",".$numberjob.",'".iconv("utf-8","tis-620",$_POST["text".$row1[idstd]])."',".$_GET[idqr].",'".$datenext."','".date("Y-m-d")."','".$namest."')";

    mssql_query($sql3);
}
echo"<script>location.href='main.php?p=job2&idqr=".$_GET[idqr]."'</script>"
?>
