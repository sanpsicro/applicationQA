<?php 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');

isset($_POST['id']) ? $id = $_POST['id'] : $id = "" ;

include('conf.php'); 
if(isset($_POST[id]) && $_POST[id]!=""){

#-------------------->------------------------>
$link = mysqli_connect($host,$username,$pass,$database);
$result=mysqli_query($link,"select * from pagos where expediente = '$expediente'");
$cuantosson=mysqli_num_rows($result);
mysqli_free_result($result);
if ($cuantosson>0) {
#actualizar registro
$link = mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE pagos SET  proveedor='$proveedor', monto='$monto' where expediente='$expediente' LIMIT 1";
mysqli_query($link, $sSQL);
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





$link = mysqli_connect($host,$username,$pass,$database);
mysqli_query($link,"INSERT INTO `pagos` (`proveedor`, `conceptor`, `monto`, `status`, `expediente`,`fecha_corte`,`fecha_pago`) 
		VALUES ('$proveedor', 'Pago por servicio', '$monto', '0', '$expediente',NOW(),'$sig_viernes')"); 
}
#####################################################
##  Control de Cobranza

$totalCobranza=$banderazo+$blindaje+$maniobras+$espera+$otro;
$link = mysqli_connect("$host","$username","$pass");
$result=mysqli_query($link,"select * from cobranza where expediente = '$expediente'") or die(mysql_error($link));
$cuantosson=mysqli_num_rows($result);
mysqli_free_result($result);
if ($cuantosson>0) {
#actualizar registro
$sSQL="UPDATE cobranza SET  proveedor='$proveedor', monto='$totalCobranza' where expediente='$expediente'";
mysqli_query($link, $sSQL);
}
else{
#crear registro
mysqli_query($link,"INSERT INTO `cobranza` (`proveedor`, `conceptor`, `monto`, `status`, `expediente`) VALUES ('$proveedor', '$expediente', '$totalCobranza', 'no pagado', '$expediente')"); 
}

####################################################



$link = mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE general SET banderazo='$banderazo', blindaje='$blindaje', maniobras='$maniobras', espera='$espera', otro='$otro', total='$total' where id='$id'";
mysqli_query($link, $sSQL);


#-------------------->------------------------>
}
$explota_permisos=explode(",",$_SESSION["valid_permisos"]);
include('status_caso.php'); 

?>
