<?php  
session_start();
$unixid = time(); 
include('conf.php'); 

$dbl = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$dbl);
$resultl = mysqli_query("SELECT * from Empleado where idEmpleado='$valid_userid'",$dbl);
if (mysqli_num_rows($resultl)){ 
$eluserx=mysql_result($resultl,0,"nombre");
}

$linka = mysqli_connect($host, $username, $pass); 
//mysql_select_db($database, $linka); 
$resultar = mysqli_query("SELECT * FROM Provedor where id='$_GET[id]' LIMIT 1", $linka); 
if (mysqli_num_rows($resultar)){ 
$nombrep=mysql_result($resultar,0,"nombre");  
}

if($caso == "editar"){
mysqli_connect($host,$username,$pass,$database);
$comentario=strtoupper($comentario);
$sSQL="UPDATE notasprov SET fecha='$fecha_a-$fecha_m-$fecha_d', comentario='$comentario' where id='$idnota'";
mysqli_query($database, "$sSQL");
if($popup=="0")
	header("Location: mainframe.php?module=notas_proveedor&id=$id");
else
	header("Location: notas_proveedorb.php?id=$id");
}
if($caso == "nuevo"){
mysqli_connect($host,$username,$pass,$database);
$comentario=strtoupper($comentario);
mysqli_query($database,"INSERT INTO `notasprov` (`general`, `usuario`, `fecha`, `comentario`) VALUES ('$id', '$valid_userid', now(), '$comentario')"); 


$asunto = 'Reporte Proveedores';

//$destinatario = 'notasproveedor@plataforma-aa.com';
$destinatario1 = 'sdominguez@qualityassist.mx';
$destinatario2 = 'ncontreras@qualityassist.mx';
$destinatario3 = 'amaldonado@qualityassist.mx';



$cuerpo =  '
<html>
<head>
</head>
<body>
<p><strong>
Se ha recibido el reporte de un nuevo proveedor.
<table cellspacing="0" cellpadding="5" border="0" width="650" align="center" bgcolor="#EEEEEE">
<tr>
<td><div align="right">Proveedor:</div></td>
<td>'.$nombrep.'</td>
</tr>
<tr>
<td><div align="right">Usuario que reporta:</div></td>
<td>'.$eluserx.'</td>
</tr>
<tr>
<td><div align="right">Comentario:</div></td>
<td>'.$comentario.'</td>
</tr>
</table>
<br /><br />


</strong></p>
</body>
</html>
';
	   $nombre = '=?UTF-8?B?'.base64_encode("Reporte de Proveedores").'?=';
       $headers = "MIME-Version: 1.0\r\n";
       $headers .= "Content-type: text/html; charset=UTF-8\r\n";
       $headers .= "From: ".$nombre." <reporteproveedores@americanassist.com>\r\n";
	 
       //mail($destinatario,$asunto,$cuerpo,$headers);
       mail($destinatario1,$asunto,$cuerpo,$headers);
       mail($destinatario2,$asunto,$cuerpo,$headers);
       mail($destinatario3,$asunto,$cuerpo,$headers);





if($popup=="0"){
	if(!empty($from_seguimiento))
		header("Location: mainframe.php?module=detail_seguimiento&id=$id");
	else
		header("Location: mainframe.php?module=notas_proveedor&id=$id");
}
else
	header("Location: notas_proveedorb.php?id=$id");
}

if($caso == "borrar"){
mysqli_connect($host,$username,$pass,$database);
$sSQL="Delete From notasprov Where id ='$idnota' and general='$id'";
mysqli_query("$database",$sSQL);
if($popup=="0")
	header("Location: mainframe.php?module=notas_proveedor&id=$id");
else
	header("Location: notas_proveedorb.php?id=$id");
}
?>