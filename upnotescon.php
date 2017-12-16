<?php  
session_start();
$unixid = time(); 
include('conf.php'); 

$valid_userid = $_SESSION['valid_userid'];


isset($_GET['id']) ? $id = $_GET['id'] : $id = "" ;
isset($_GET['caso']) ? $caso = $_GET['caso'] : $caso = "" ;
isset($_POST['comentario']) ? $comentario = $_POST['comentario'] : $comentario = "" ;

isset($_POST['from_seguimiento']) ? $from_seguimiento = $_POST['from_seguimiento'] : $from_seguimiento= "" ;
isset($_POST['num_poliza']) ? $num_poliza = $_POST['num_poliza'] : $num_poliza = "" ;

$link  = mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE general SET ultimoseguimiento=CONVERT_TZ(now(),'+00:00','+01:00') where id='$id'";
mysqli_query($link, $sSQL);

if($caso == "nuevo"){
$link  = mysqli_connect($host,$username,$pass,$database);
$comentario=strtoupper($comentario);
mysqli_query($link,"INSERT INTO `clientacora` (`general`, `usuario`, `fecha`, `comentario`, `tipo`, `visto`, `num_poliza`) VALUES ('$id', '$valid_userid', CONVERT_TZ(now(),'+00:00','+01:00'), '$comentario', '1', '0', '$num_poliza')") or die(mysqli_error($link)); 
header("Location: mainframe.php?module=detail_seguimiento&id=$id&current=2");
}

?>