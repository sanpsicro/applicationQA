<?
ob_start("ob_gzhandler");//
session_start();
if ( session_is_registered( "valid_user" ))
{}
else {
header("Location: index.php?errorcode=3");
}
header('Content-Type: text/html; charset=iso-8859-1');
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Mon,26 Jul 1997 05:00:00 GMT");
error_reporting(E_ALL ^ E_NOTICE);


function paginacion($actual, $total, $por_pagina, $enlace) {
	$pag = ($_GET['pag']);   
	$total_paginas = ceil($total/$por_pagina);
	$anterior = $actual - 1;
	$posterior = $actual + 1;
	$texto = "<table border=0 cellpadding=0 cellspacing=0 width=100% height=28><form name=jumpto method=get><tr><td width=15>&nbsp;</td><td width=80><font color=#000000>Ir a la p&aacute;gina</font></td><td width=5>&nbsp;</td><td width=30><select name=\"url\" onchange=\"return jump(this);\">";
	for($isabel=1; $isabel<=$total_paginas; $isabel++)
	{ 
		if($pag==$isabel){    $texto .= "<option selected value=\"$enlace$isabel\">$isabel</option> ";} else {
			$texto .= "<option $thisis value=\"$enlace$isabel\">$isabel</option> ";}
	} 	
	$pag = ($_GET['pag']); 
	if (!isset($pag)) $pag = 1;
	$texto .= "</select></td><td width=5>&nbsp;</td><td><font color=#000000>de ".$total_paginas."</font></td><td>&nbsp;</td></tr></form></table>";
	return $texto;
}

?>
<? include('conf.php'); ?>
<? include('dbfunc.php'); ?>
<? include('shell_1.php'); ?>
<?php
if(empty($show)){$show=50;}
if(isset($_GET["module"])) {
$module = basename($_GET["module"]);
$module .= ".php";
if (is_file("./$module")) {
include($module);
} else {
include('main.php');
}
} else {
include('main.php');
}
?> 
<? include('shell_2.php'); 
ob_flush();
?>