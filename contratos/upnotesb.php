<?
session_start();
$unixid = time(); 
include('conf.php'); 




mysql_connect($host,$username,$pass);
$sSQL="UPDATE general SET ultimoseguimiento=now() where id='$id'";
mysql_db_query($database, "$sSQL");

if($caso == "nuevo"){
mysql_connect($host,$username,$pass);
$comentario=strtoupper($comentario);
mysql_db_query($database,"INSERT INTO `clientacora` (`general`, `usuario`, `fecha`, `comentario`, `tipo`, `visto`, `num_poliza`, `modules`) VALUES ('$id', '$valid_userid', now(), '$comentario', '2', '0', '$num_poliza', '$modules')"); 
header("Location: mainframe.php?module=detail_seguimiento&id=$id");
}

?>