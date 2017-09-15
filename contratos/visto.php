<?
session_start();
$unixid = time(); 
include('conf.php'); 

mysql_connect($host,$username,$pass);
$sSQL="UPDATE clientacora SET visto=1 where id='$idmensaje'";
mysql_db_query($database, "$sSQL");
?>