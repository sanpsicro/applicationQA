<?
session_start();
$unixid = time(); 
include('conf.php'); 


if($caso=="editar"){
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from notas_legal where id='$idnota' and general = '$id'",$db);
if (mysqli_num_rows($result)){ 
$archivo1=mysql_result($result,0,"adjunto1");
$archivo2=mysql_result($result,0,"adjunto2");
$archivo3=mysql_result($result,0,"adjunto3");
$archivo4=mysql_result($result,0,"adjunto4");
}
}

if(isset($file1) && $file1!="" && $file1!=" "){
if($caso=="editar"){
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from notas_legal where id='$idnota' and general = '$id'",$db);
if (mysqli_num_rows($result)){ 
$exfile1=mysql_result($result,0,"adjunto1");
if($exfile1!="" && $exfile1!=" "){
$predel="proveedores/adjuntos/".$exfile1."";
unlink($predel);
}
}
}


$file_1_name_b=trim($file1_name);
$file_1_name_b = str_replace('&', '', $file_1_name_b);
$file_1_name_b=htmlspecialchars($file_1_name_b);
$file_1_name_b=stripslashes($file_1_name_b);
$file_1_name_b=strtr($file_1_name_b,"'","");
$file_1_name_b=strtr($file_1_name_b,"'","_");
$file_1_name_b=strtr($file_1_name_b," ","_");
$file_1_name_b=strtr($file_1_name_b,",","_");
$file_1_name_b = str_replace('á', 'a', $file_1_name_b);
$file_1_name_b = str_replace('é', 'a', $file_1_name_b);
$file_1_name_b = str_replace('í', 'a', $file_1_name_b);
$file_1_name_b = str_replace('ó', 'a', $file_1_name_b);
$file_1_name_b = str_replace('ú', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Á', 'a', $file_1_name_b);
$file_1_name_b = str_replace('É', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Í', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ó', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ú', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ñ', 'n', $file_1_name_b);
$file_1_name_b = str_replace('ñ', 'n', $file_1_name_b);
$file_1_name_b = strtolower($file_1_name_b);
$nuevonombre="".$valid_userid."_".$unixid."_".$file_1_name_b."";
if(copy($file1,"proveedores/adjuntos/$nuevonombre")){$archivo1=$nuevonombre; $unixid=$unixid+1;
}
}
if(isset($file2) && $file2!="" && $file2!=" "){

if($caso=="editar"){
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from notas_legal where id='$idnota' and general = '$id'",$db);
if (mysqli_num_rows($result)){ 
$exfile2=mysql_result($result,0,"adjunto2");
if($exfile2!="" && $exfile2!=" "){
$predel="proveedores/adjuntos/".$exfile2."";
unlink($predel);
}
}
}

$file_1_name_b=trim($file2_name);
$file_1_name_b = str_replace('&', '', $file_1_name_b);
$file_1_name_b=htmlspecialchars($file_1_name_b);
$file_1_name_b=stripslashes($file_1_name_b);
$file_1_name_b=strtr($file_1_name_b,"'","");
$file_1_name_b=strtr($file_1_name_b,"'","_");
$file_1_name_b=strtr($file_1_name_b," ","_");
$file_1_name_b=strtr($file_1_name_b,",","_");
$file_1_name_b = str_replace('á', 'a', $file_1_name_b);
$file_1_name_b = str_replace('é', 'a', $file_1_name_b);
$file_1_name_b = str_replace('í', 'a', $file_1_name_b);
$file_1_name_b = str_replace('ó', 'a', $file_1_name_b);
$file_1_name_b = str_replace('ú', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Á', 'a', $file_1_name_b);
$file_1_name_b = str_replace('É', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Í', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ó', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ú', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ñ', 'n', $file_1_name_b);
$file_1_name_b = str_replace('ñ', 'n', $file_1_name_b);
$file_1_name_b = strtolower($file_1_name_b);
$nuevonombre="".$valid_userid."_".$unixid."_".$file_1_name_b."";
if(copy($file2,"proveedores/adjuntos/$nuevonombre")){$archivo2=$nuevonombre; $unixid=$unixid+1;
}
}
if(isset($file3) && $file3!="" && $file3!=" "){

if($caso=="editar"){
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from notas_legal where id='$idnota' and general = '$id'",$db);
if (mysqli_num_rows($result)){ 
$exfile3=mysql_result($result,0,"adjunto3");
if($exfile3!="" && $exfile3!=" "){
$predel="proveedores/adjuntos/".$exfile3."";
unlink($predel);
}
}
}

$file_1_name_b=trim($file3_name);
$file_1_name_b = str_replace('&', '', $file_1_name_b);
$file_1_name_b=htmlspecialchars($file_1_name_b);
$file_1_name_b=stripslashes($file_1_name_b);
$file_1_name_b=strtr($file_1_name_b,"'","");
$file_1_name_b=strtr($file_1_name_b,"'","_");
$file_1_name_b=strtr($file_1_name_b," ","_");
$file_1_name_b=strtr($file_1_name_b,",","_");
$file_1_name_b = str_replace('á', 'a', $file_1_name_b);
$file_1_name_b = str_replace('é', 'a', $file_1_name_b);
$file_1_name_b = str_replace('í', 'a', $file_1_name_b);
$file_1_name_b = str_replace('ó', 'a', $file_1_name_b);
$file_1_name_b = str_replace('ú', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Á', 'a', $file_1_name_b);
$file_1_name_b = str_replace('É', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Í', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ó', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ú', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ñ', 'n', $file_1_name_b);
$file_1_name_b = str_replace('ñ', 'n', $file_1_name_b);
$file_1_name_b = strtolower($file_1_name_b);
$nuevonombre="".$valid_userid."_".$unixid."_".$file_1_name_b."";
if(copy($file3,"proveedores/adjuntos/$nuevonombre")){$archivo3=$nuevonombre; $unixid=$unixid+1;
}
}
if(isset($file4) && $file4!="" && $file4!=" "){

if($caso=="editar"){
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from notas_legal where id='$idnota' and general = '$id'",$db);
if (mysqli_num_rows($result)){ 
$exfile4=mysql_result($result,0,"adjunto4");
if($exfile4!="" && $exfile4!=" "){
$predel="proveedores/adjuntos/".$exfile4."";
unlink($predel);
}
}
}

$file_1_name_b=trim($file4_name);
$file_1_name_b = str_replace('&', '', $file_1_name_b);
$file_1_name_b=htmlspecialchars($file_1_name_b);
$file_1_name_b=stripslashes($file_1_name_b);
$file_1_name_b=strtr($file_1_name_b,"'","");
$file_1_name_b=strtr($file_1_name_b,"'","_");
$file_1_name_b=strtr($file_1_name_b," ","_");
$file_1_name_b=strtr($file_1_name_b,",","_");
$file_1_name_b = str_replace('á', 'a', $file_1_name_b);
$file_1_name_b = str_replace('é', 'a', $file_1_name_b);
$file_1_name_b = str_replace('í', 'a', $file_1_name_b);
$file_1_name_b = str_replace('ó', 'a', $file_1_name_b);
$file_1_name_b = str_replace('ú', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Á', 'a', $file_1_name_b);
$file_1_name_b = str_replace('É', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Í', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ó', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ú', 'a', $file_1_name_b);
$file_1_name_b = str_replace('Ñ', 'n', $file_1_name_b);
$file_1_name_b = str_replace('ñ', 'n', $file_1_name_b);
$file_1_name_b = strtolower($file_1_name_b);
$nuevonombre="".$valid_userid."_".$unixid."_".$file_1_name_b."";
if(copy($file4,"proveedores/adjuntos/$nuevonombre")){$archivo4=$nuevonombre; $unixid=$unixid+1;
}
}


if($caso == "editar"){
mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE notas_legal SET fecha='$fecha_a-$fecha_m-$fecha_d', etapa='$etapa', tipo='$tipo', comentario='$comentario', adjunto1='$archivo1', adjunto2='$archivo2', adjunto3='$archivo3', adjunto4='$archivo4' where id='$idnota'";
mysqli_query($database, "$sSQL");
header("Location: mainframe.php?module=seguimiento_caso&id=$id");
}
if($caso == "nuevo"){
mysqli_connect($host,$username,$pass,$database);
mysqli_query($database,"INSERT INTO `notas_legal` (`general`, `fecha`, `etapa`, `tipo`, `comentario`, `adjunto1`, `adjunto2`, `adjunto3`, `adjunto4`) VALUES ('$id', '$fecha_a-$fecha_m-$fecha_d', '$etapa', '$tipo', '$comentario', '$archivo1', '$archivo2', '$archivo3', '$archivo4')"); 
header("Location: mainframe.php?module=seguimiento_caso&id=$id");
}

if($caso == "borrar"){

$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from notas_legal where id='$idnota' and general = '$id'",$db);
if (mysqli_num_rows($result)){ 
$exfile1=mysql_result($result,0,"adjunto1");
$exfile2=mysql_result($result,0,"adjunto2");
$exfile3=mysql_result($result,0,"adjunto3");
$exfile4=mysql_result($result,0,"adjunto4");
if($exfile1!="" && $exfile1!=" "){
$predel="proveedores/adjuntos/".$exfile1."";
unlink($predel);
}
if($exfile2!="" && $exfile2!=" "){
$predel2="proveedores/adjuntos/".$exfile2."";
unlink($predel2);
}
if($exfile3!="" && $exfile3!=" "){
$predel3="proveedores/adjuntos/".$exfile3."";
unlink($predel3);
}
if($exfile4!="" && $exfile4!=" "){
$predel4="proveedores/adjuntos/".$exfile4."";
unlink($predel4);
}
}

mysqli_connect($host,$username,$pass,$database);
$sSQL="Delete From notas_legal Where id ='$idnota' and general='$id'";
mysqli_query("$database",$sSQL);
header("Location: mainframe.php?module=seguimiento_caso&id=$id");
}
?>