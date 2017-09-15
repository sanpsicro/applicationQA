<?
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');

include('conf.php'); 
if(isset($_POST[id]) && $_POST[id]!=""){
$status=utf8_decode($status); 
#actualizar registro
mysql_connect($host,$username,$pass);
$sSQL="UPDATE general SET status='$status', ultimostatus=now() where id='$id'";
mysql_db_query($database, "$sSQL");
}
include('status_caso.php'); 

?>
