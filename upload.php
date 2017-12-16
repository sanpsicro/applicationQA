<?php  
session_start();
$unixid = time(); 
$valid_userid = $_SESSION['valid_userid'];
include('conf.php'); 
isset($_GET['general']) ? $general = $_GET['general'] :  $general="";
$file1_name = basename($_FILES["file1"]["name"]);
$file1 = $_FILES["file1"]["tmp_name"];
var_dump($_FILES);
if (empty($file1))  { header("Location: mainframe.php?module=detail_seguimiento&id=$general"); } 
else {
if(isset($file1) && $file1!="" && $file1!=" "){

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
if(copy($file1,"adjuntosexp/$nuevonombre")){$archivo1=$nuevonombre; $unixid=$unixid+1;
} 
}



$db = mysqli_connect($host,$username,$pass,$database);
mysqli_query($db,"INSERT INTO `adjuntos` ( `general`, `fecha`, `adjunto`) VALUES ( $general, CONVERT_TZ(now(),'+00:00','+01:00'), '$archivo1')") or die(mysqli_error($db)); 
header("Location: mainframe.php?module=detail_seguimiento&id=$general");
}

?>