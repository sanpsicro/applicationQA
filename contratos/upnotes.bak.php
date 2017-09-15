<?
session_start();
$unixid = time(); 
include('conf.php'); 

mysql_connect($host,$username,$pass);
$sSQL="UPDATE general SET ultimoseguimiento=now() where id='$id'";
mysql_db_query($database, "$sSQL");



if($caso == "editar"){
mysql_connect($host,$username,$pass);
$sSQL="UPDATE bitacora SET fecha=now(), comentario='$comentario' where id='$idnota'";
mysql_db_query($database, "$sSQL");
header("Location: mainframe.php?module=bitacora&id=$id");
}
if($caso == "nuevo"){
mysql_connect($host,$username,$pass);
mysql_db_query($database,"INSERT INTO `bitacora` (`general`, `usuario`, `fecha`, `comentario`) VALUES ('$id', '$valid_userid', now(), '$comentario')"); 
header("Location: mainframe.php?module=bitacora&id=$id");
}

if($caso == "borrar"){
mysql_connect($host,$username,$pass);
$sSQL="Delete From bitacora Where id ='$idnota' and general='$id'";
mysql_db_query("$database",$sSQL);
header("Location: mainframe.php?module=bitacora&id=$id");
}
?>