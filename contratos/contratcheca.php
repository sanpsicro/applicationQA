<?
	include 'conf.php';


$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$resultz = mysql_query("SELECT * from Empleado where idEmpleado = '$_GET[opcion]'",$db);
$consecutivo=mysql_result($resultz,0,"indexPoliza");
$empleado=mysql_result($resultz,0,"usuario");
$consecutivo=($consecutivo+1);

if(strlen($consecutivo)==1){$consecutivo="00000".$consecutivo."";} 
if(strlen($consecutivo)==2){$consecutivo="0000".$consecutivo."";} 
if(strlen($consecutivo)==3){$consecutivo="000".$consecutivo."";} 
if(strlen($consecutivo)==4){$consecutivo="00".$consecutivo."";} 
if(strlen($consecutivo)==5){$consecutivo="0".$consecutivo."";} 

$numcontrato="".$empleado."_".$consecutivo."";

echo'<input name="numcontrato" type="text" value="'.$numcontrato.'" readonly="readonly"/>';

 ?>	
			  