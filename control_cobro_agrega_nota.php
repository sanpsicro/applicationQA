<?php  
include("conf.php");
session_start();
mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database); 

$query="INSERT INTO notas_cobranza (id,expediente,usuario,fecha,comentario) 
					VALUES ('','$expediente','$_SESSION[valid_userid]',NOW(),'$comentario')";
mysqli_query($query) or die(mysql_error());

header("Location: mainframe.php?module=control_cobro&cobro=$cobro");
?>