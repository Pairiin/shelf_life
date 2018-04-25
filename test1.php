<?php
ini_set('memory_limit','100M');
require('mpdf60/mpdf.php');
$html = file_get_contents ("http://192.168.16.6/shelf_life/job3.php?idqr=".$_GET[idqr]."");
//echo $html;
$mpdf = new mPDF('th', 'A4-L', '0', '');
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
?>
