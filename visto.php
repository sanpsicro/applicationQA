<?
session_start();
$unixid = time(); 
include('conf.php'); 

mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE clientacora SET visto=1 where id='$idmensaje'";
mysqli_query($database, "$sSQL");
?>