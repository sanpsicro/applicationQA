<?
$hoydia=$_POST[actual];
#$hoy_partida=explode(" ",$hoydia);
$fecha_partida=explode("-",$hoydia);
/*
if($_POST[opcion]=="1"){$endate=mktime($hora_partida[0], $hora_partida[1], $hora_partida[2], $fecha_partida[1], $fecha_partida[0], $fecha_partida[2] + 1);}
if($_POST[opcion]=="2"){$endate=mktime($hora_partida[0], $hora_partida[1], $hora_partida[2], $fecha_partida[1] + 6, $fecha_partida[0], $fecha_partida[2]);}
if($_POST[opcion]=="3"){$endate=mktime($hora_partida[0], $hora_partida[1], $hora_partida[2], $fecha_partida[1] + 1, $fecha_partida[0], $fecha_partida[2]);}
if($_POST[opcion]=="4"){$endate="no";}
*/
if($_POST[opcion]=="1"){$endate=mktime(0, 0, 0, $fecha_partida[1], $fecha_partida[0], $fecha_partida[2] + 1);}
if($_POST[opcion]=="2"){$endate=mktime(0, 0, 0, $fecha_partida[1] + 6, $fecha_partida[0], $fecha_partida[2]);}
if($_POST[opcion]=="3"){$endate=mktime(0, 0, 0, $fecha_partida[1] + 1, $fecha_partida[0], $fecha_partida[2]);}
if($_POST[opcion]=="4"){$endate="no";}

#$startinicial=mktime($starthora, $startmin, $startseg, $startmes, $startdia + 7, $startano);
#$nuevaf = date('j-n-Y H:i:s', $endate); 
$nuevaf = date('j-n-Y', $endate); 
if($_POST[opcion]=="4" or $_POST[opcion]==""){echo'<input name="fecha_vencimiento" type="text" id="fecha_vencimiento" size="15" value=""/>';}
else{echo'<input name="fecha_vencimiento" type="text" id="fecha_vencimiento" size="15" value="'.$nuevaf.'"/>';}
?>	
