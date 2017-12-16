<?php  

isset($_POST['expediente']) ? $expediente= $_POST['expediente'] : $expediente= $_GET['expediente'] ;
isset($_POST['proveedor']) ? $proveedor= $_POST['proveedor'] : $proveedor= $_GET['proveedor'];
isset($_POST['fecha_corte_dia']) ? $fecha_corte_dia= $_POST['fecha_corte_dia'] : $fecha_corte_dia= "" ;
isset($_POST['fecha_corte_mes']) ? $fecha_corte_mes= $_POST['fecha_corte_mes'] : $fecha_corte_mes= "" ;
isset($_POST['fecha_corte_anio']) ? $fecha_corte_anio= $_POST['fecha_corte_anio'] : $fecha_corte_anio= "" ;

isset($_POST['fecha_pago_dia']) ? $fecha_pago_dia= $_POST['fecha_pago_dia'] : $fecha_pago_dia= "" ;
isset($_POST['fecha_pago_mes']) ? $fecha_pago_mes= $_POST['fecha_pago_mes'] : $fecha_pago_mes= "" ;
isset($_POST['fecha_pago_anio']) ? $fecha_pago_anio= $_POST['fecha_pago_anio'] : $fecha_pago_anio= "" ;

isset($_POST['conceptor']) ? $conceptor= $_POST['conceptor'] : $conceptor= "" ;
isset($_POST['monto']) && $_POST['monto']!= ""? $monto= $_POST['monto'] : $monto= "0.0" ;
isset($_POST['status']) ? $status= $_POST['status'] : $status= "0" ;

isset($_POST['id']) ? $id= $_POST['id'] : $id= "" ;

isset($_GET['action']) ? $action= $_GET['action'] : $action= "" ;
include("conf.php");
$link = mysqli_connect($host,$username,$pass,$database); 
//mysql_select_db($database, $link); 
$fecha_corte="$fecha_corte_anio-$fecha_corte_mes-$fecha_corte_dia";
$fecha_pago="$fecha_pago_anio-$fecha_pago_mes-$fecha_pago_dia";

if($action=="alta"){
	$query="INSERT INTO pagos (expediente,fecha_corte,fecha_pago,conceptor,monto,proveedor,status)
			VALUES ('$expediente','$fecha_corte','$fecha_pago','$conceptor','$monto','$proveedor','$status')";
	#echo $query;
	mysqli_query($link,$query) or die (mysqli_error($link));
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
				//echo $query;
	mysqli_query( $link,$query) or die (mysqli_error($link));
}

if($action=="cerrar")
{
	$query = 'UPDATE pagos SET cerrado=\'1\' WHERE expediente=\''.$expediente.'\'';
	mysqli_query($link,$query) or die (mysqli_error($link));
}

header("Location: mainframe.php?module=control_pago&expediente=$expediente");
?>