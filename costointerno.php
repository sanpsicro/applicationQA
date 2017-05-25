<?
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');

include('conf.php'); 
if(isset($_POST[id]) && $_POST[id]!=""){

#-------------------->------------------------>
mysqli_connect("$host","$username","$pass");
$result=mysql_db_query("$database","select * from pagos where expediente = '$expediente'");
$cuantosson=mysql_num_rows($result);
mysql_free_result($result);
if ($cuantosson>0) {
#actualizar registro
mysqli_connect($host,$username,$pass);
$sSQL="UPDATE pagos SET  proveedor='$proveedor', monto='$monto' where expediente='$expediente' LIMIT 1";
mysql_db_query($database, "$sSQL");
}
else{
#crear registro
$fecha = time();
$dia_semana=date("w");
switch($dia_semana)
{
	case 0:	$sig_viernes=$fecha + (3600*24*5);
	break;
	case 1: $sig_viernes=$fecha + (3600*24*4);
	break;
	case 2: $sig_viernes=$fecha + (3600*24*3);
	break;
	case 3: $sig_viernes=$fecha + (3600*24*2);
	break;
	case 4: $sig_viernes=$fecha + (3600*24*1);
	break;
	case 5: $sig_viernes=$fecha + (3600*24*14);
	break;
	case 6: $sig_viernes=$fecha + (3600*24*13);
	break;
}





mysqli_connect($host,$username,$pass);
mysql_db_query($database,"INSERT INTO `pagos` (`proveedor`, `conceptor`, `monto`, `status`, `expediente`,`fecha_corte`,`fecha_pago`) 
		VALUES ('$proveedor', 'Pago por servicio', '$monto', '0', '$expediente',NOW(),'$sig_viernes')"); 
}
#####################################################
##  Control de Cobranza

$totalCobranza=$banderazo+$blindaje+$maniobras+$espera+$otro;
mysqli_connect("$host","$username","$pass");
$result=mysql_db_query("$database","select * from cobranza where expediente = '$expediente'")or die(mysql_error());
$cuantosson=mysql_num_rows($result);
mysql_free_result($result);
if ($cuantosson>0) {
#actualizar registro
$sSQL="UPDATE cobranza SET  proveedor='$proveedor', monto='$totalCobranza' where expediente='$expediente'";
mysql_db_query($database, "$sSQL");
}
else{
#crear registro
mysql_db_query($database,"INSERT INTO `cobranza` (`proveedor`, `conceptor`, `monto`, `status`, `expediente`) VALUES ('$proveedor', '$expediente', '$totalCobranza', 'no pagado', '$expediente')"); 
}

####################################################



mysqli_connect($host,$username,$pass);
$sSQL="UPDATE general SET banderazo='$banderazo', blindaje='$blindaje', maniobras='$maniobras', espera='$espera', otro='$otro', total='$total' where id='$id'";
mysql_db_query($database, "$sSQL");


#-------------------->------------------------>
}
$explota_permisos=explode(",",$_SESSION["valid_permisos"]);
include('status_caso.php'); 

?>
