<?
extract($_REQUEST);
include("conf.php");
$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$fecha_corte="$fecha_corte_anio-$fecha_corte_mes-$fecha_corte_dia";
$fecha_pago="$fecha_pago_anio-$fecha_pago_mes-$fecha_pago_dia";

if($action=="alta"){
	$query="INSERT INTO pagos (expediente,fecha_corte,fecha_pago,conceptor,monto,proveedor,status)
			VALUES ('$expediente','$fecha_corte','$fecha_pago','$conceptor','$monto','$proveedor','$status')";
	#echo $query;
	mysql_query($query, $link) or die (mysql_error());
}

if($action=="editar"){
	$query="UPDATE pagos 
				SET expediente='$expediente',
					fecha_corte='$fecha_corte',
					fecha_pago='$fecha_pago',
					conceptor='$conceptor',
					monto='$monto',
					proveedor='$proveedor',
					status='$status'
				WHERE id='$id'
				LIMIT 1";
				#echo $query;
	mysql_query($query, $link) or die (mysql_error());
}

if($action=="cerrar")
{
	$query = 'UPDATE pagos SET cerrado=\'1\' WHERE expediente=\''.$expediente.'\'';
	mysql_query($query, $link) or die (mysql_error());
}

header("Location: mainframe.php?module=control_pago&expediente=$expediente");
?>