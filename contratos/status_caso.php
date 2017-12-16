<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function popup(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=600');");
}
// End -->
</script>


<script type="text/javascript" language="JavaScript">
function confirmGeneral(generalurl) { 
if (confirm("¿Est&aacute; seguro?")) { 
document.location = generalurl; 
}
}
</script>
<?
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from general where id = '$id'",$db);
if (mysql_num_rows($result)){ 

$banderazo=mysql_result($result,0,"banderazo");
$blindaje=mysql_result($result,0,"blindaje");
$maniobras=mysql_result($result,0,"maniobras");
$espera=mysql_result($result,0,"espera");
$otro=mysql_result($result,0,"otro");
$total=mysql_result($result,0,"total");


$statuscaso=mysql_result($result,0,"status");
$proveedorasignado=mysql_result($result,0,"proveedor");
$expp=mysql_result($result,0,"expediente");

$fexa1=mysql_result($result,0,"fecha_recepcion");
$fexa1=explode(" ",$fexa1);
$fexa1d=explode("-",$fexa1[0]);
$fexa1gh=mysql_result($result,0,"fecha_recepcion");

$fzor=mysql_result($result,0,"ultimostatus");
$fzor1=explode(" ",$fzor);
$fzor1d=explode("-",$fzor1[0]);


##
$kosmos2=mysql_result($result,0,"apertura_expediente");
$fexax=mysql_result($result,0,"apertura_expediente");
$fexax=explode(" ",$fexax);
$fexaxd=explode("-",$fexax[0]);
##
$telos2=mysql_result($result,0,"asignacion_proveedor");
$fexa2=mysql_result($result,0,"asignacion_proveedor");
$fexa2=explode(" ",$fexa2);
$fexa2d=explode("-",$fexa2[0]);
##
$telos1=mysql_result($result,0,"contactoext");
$fexa3=mysql_result($result,0,"contactoext");
if($fexa3=="0000-00-00 00:00:00"  && empty($NO_EDITAR)){$whitr='';}
else{
$fexa3=explode(" ",$fexa3);
$fexa3d=explode("-",$fexa3[0]);
$whitr="".$fexa3d[2]."/".$fexa3d[1]."/".$fexa3d[0]." ".$fexa3[1]."";
}
##
$kosmos1=mysql_result($result,0,"terminoext");
$fexa4=mysql_result($result,0,"terminoext");
if($fexa4=="0000-00-00 00:00:00" && empty($NO_EDITAR)){$tyurru='';}
else{
$fexa4=explode(" ",$fexa4);
$fexa4d=explode("-",$fexa4[0]);
$tyurru="".$fexa4d[2]."/".$fexa4d[1]."/".$fexa4d[0]." ".$fexa4[1]."";
}

##
}
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Provedor where id = '$proveedorasignado'",$db);
if (mysql_num_rows($result)){ 
$proveedorasignado=mysql_result($result,0,"nombre");
$proveedornotas=mysql_result($result,0,"id");
}
####
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT monto from pagos where expediente = '$expp' AND conceptor='Pago por servicio'",$db);
if (mysql_num_rows($result)){ 
$costoint=mysql_result($result,0,"monto");
}


#########################_______________________
#""""""""""""""""""""""""""""""""""""

#function segundos_tiempo($segundos){
#$minutos=$segundos/60;
#$horas=floor($minutos/60);
#$minutos2=$minutos%60;
#$segundos_2=$segundos%60%60%60;
#if($minutos2<10)$minutos2='0'.$minutos2;
#if($segundos_2<10)$segundos_2='0'.$segundos_2;
#if($segundos<60){ /* segundos */
#$resultado= round($segundos).' Segundos';
#}elseif($segundos>60 && $segundos<3600){/* minutos */
#$resultado= $minutos2.':'.$segundos_2.' Minutos';
#}else{/* horas */
#$resultado= $horas.':'.$minutos2.':'.$segundos_2.' Horas';
#}
#return $resultado;
#}
#$segundos=date('h')*60*60+(date('i')*60)+date('s');

function segundos_tiempo($segundos){
$minutos=$segundos/60;
$horas=floor($minutos/60);
$minutos2=$minutos%60;
$segundos_2=$segundos%60%60%60;
if($minutos2<10)$minutos2='0'.$minutos2;
if($segundos_2<10)$segundos_2='0'.$segundos_2;
if($segundos<60){ /* segundos */
$resultado= '00:00:'.round($segundos).'';
}elseif($segundos>60 && $segundos<3600){/* minutos */
$resultado= '00:'.$minutos2.':'.$segundos_2.'';
}else{/* horas */
$resultado= $horas.':'.$minutos2.':'.$segundos_2.'';
}
return $resultado;
}
$segundos=date('h')*60*60+(date('i')*60)+date('s');

#""""""""""""""""""""""""""""""""""""


?>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td><strong>Hora de contacto:</strong> <? echo $whitr;	?></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <td><strong>Hora de Termino:</strong> <? echo $tyurru;	?></td>
    
    <td></td>
    <td></td>
  </tr>

<tr>
    <td colspan="3" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
        
        
        
        </td>
      </tr>
    </table>      </td>
  </tr>
</table>
