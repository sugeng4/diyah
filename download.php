<?php
include "koneksi.php";
$idu = $_GET['idu'];

$query = mysql_query("SELECT * FROM upload WHERE idu = '$idu'") or die(mysql_error());
$file1 = mysql_fetch_assoc($query);
$a = $file1['file'];

$file = 'file' . $a;
$filename = 'sip_' . $a;
header('Content-type: application/pdf');
header('Content-type: application/doc');
header('Content-type: application/docx');

header ('Content-Disposition: inLine; filename="' .$filename . '"');
header ('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');

@readfile($file);
?>
