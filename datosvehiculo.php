<?php 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');

isset($_POST['marca']) ? $marca = $_POST['marca'] : $marca = "" ;
isset($_POST['tipo']) ? $tipo = $_POST['tipo'] : $tipo = "" ;
isset($_POST['modelo']) ? $modelo = $_POST['modelo'] : $modelo = "" ;
isset($_POST['color']) ? $color = $_POST['color'] : $color = "" ;
isset($_POST['placas']) ? $placas= $_POST['placas'] : $placas= "" ;

include('conf.php'); 
if(isset($_POST['id']) && $_POST['id']!=""){
$id = $_POST['id'];	
$marca=utf8_decode($marca); 
$tipo=utf8_decode($tipo); 
$modelo=utf8_decode($modelo); 
$color=utf8_decode($color); 
$placas=utf8_decode($placas); 

$marca=strtoupper($marca); 
$tipo=strtoupper($tipo); 
$modelo=strtoupper($modelo); 
$color=strtoupper($color); 
$placas=strtoupper($placas); 
#actualizar registro
$db = mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE general SET auto_marca='$marca', auto_tipo='$tipo', auto_modelo='$modelo', auto_color='$color', auto_placas='$placas' where id='$id'";
mysqli_query($db, $sSQL);

}

include('datos_vehiculo.php'); 
?>
