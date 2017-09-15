<?
session_start();
$unixid = time(); 
include('conf.php'); 

$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT COUNT(*) FROM clientacora where visto=0 and (num_poliza='$contrato1' OR num_poliza='$contrato2' OR num_poliza='$contrato3' OR num_poliza='$contrato4' OR num_poliza='$contrato5') and tipo=1", $link); 
list($total) = mysql_fetch_row($result);
echo $total;
?>