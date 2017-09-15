<table border="0" width=100% cellpadding="0" cellspacing="0"> 
<tr><td><br />

            <form name="form1" method="post" action="bridge.php?module=buscador">Buscar: 
              <input name="quest" type="text" id="quest" size="35"  onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">
           
           </form>
           
           <?
		   if (empty($quest)) {echo '<br />
<br />
<strong><div align="center">Campo de búsqueda vacío</div></strong>'; die; } else {} 
		   ?>

<br /><br />
<div align="center"><h1>RESULTADOS DE LA BÚSQUEDA: <? echo $quest; ?></h1></div>
<?

$arreglobajos="_";

if ($contrato1 !="")
{ $contratiempo1 = $contrato1;
	}
else {$contratiempo1="NOEXISTENTE1";}

if ($contrato2 !="")
{ $contratiempo2 = $contrato2;
	}
else {$contratiempo2="NOEXISTENTE2";}

if ($contrato3 !="")
{ $contratiempo3 = $contrato3;
	}
else {$contratiempo3="NOEXISTENTE3";}

if ($contrato4 !="")
{ $contratiempo4 = $contrato4;
	}
else {$contratiempo4="NOEXISTENTE4";}

if ($contrato5 !="")
{ $contratiempo5 = $contrato5;
	}
else {$contratiempo5="NOEXISTENTE5";}

$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$municipiolibre = mysql_query("SELECT * from Municipio where NombreMunicipio LIKE '$quest%'", $link); 
$municipales=mysql_result($municipiolibre,0,"idMunicipio");
if (empty($municipales)) {$municipal='';} else {$municipal="OR general.ubicacion_municipio = '$municipales'";}



$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$prego2="SELECT general.id, general.num_contrato, general.reporte_cliente, general.ubicacion_municipio, general.ejecutivo, general.auto_placas, general.servicio, general.ubicacion_estado , general.destino_municipio, general.reporte_cliente, general.contrato, general.fecha_recepcion, general.expediente, general.usuario, general.status FROM general where (general.contrato LIKE '$contratiempo1$arreglobajos%' OR general.contrato LIKE '$contratiempo2$arreglobajos%' OR general.contrato LIKE '$contratiempo3$arreglobajos%' OR general.contrato LIKE '$contratiempo4$arreglobajos%' OR general.contrato LIKE '$contratiempo5$arreglobajos%') AND (general.expediente LIKE '$quest' OR general.reporte_cliente LIKE '$quest' OR general.usuario LIKE '%$quest%' OR general.auto_placas LIKE '$quest' $municipal) order by general.fecha_recepcion DESC";

$result = mysql_query("$prego2", $link) or die (mysql_error()); 
  

  
if (mysql_num_rows($result)){ 



echo'<table width="100%" border="0" cellspacing="1" cellpadding="4">
<tr>
					 <td bgcolor="#BBBBBB" align=middle class="dataclassA"><b>Reporte AMA</b></td>	 
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Ejecutivo AMA</b></td>
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Fecha recepción</b></td>					  
                      <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Paciente</b></td>					  					  					  <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Ubicacion Estado</b></td>
					  <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Ubicacion Municipio</b></td>
				  					  
                       					  
                      <td bgcolor="#BBBBBB" width="58" align=middle class="dataclassZ"><b></b></td></tr>';
$bgcolor="#cccccc";
  while ($row = @mysql_fetch_array($result)) { 
if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}

$fexa=$row["fecha_recepcion"];
$fexa=explode(" ",$fexa);
$fexad=explode("-",$fexa[0]);

$resultservicio = mysql_query("SELECT servicio from servicios where id = '$row[servicio]'", $link); 
$serviciox=mysql_result($resultservicio,0,"servicio");

$resultEstado = mysql_query("SELECT NombreEstado from Estado where idEstado = '$row[ubicacion_estado]'", $link); 
$ubicacionEstado=mysql_result($resultEstado,0,"NombreEstado");


$resultMunicipio = mysql_query("SELECT NombreMunicipio from Municipio where idMunicipio = '$row[ubicacion_municipio]'", $link); 
$ubicacionMunicipio=mysql_result($resultMunicipio,0,"NombreMunicipio");

$generalid=$row["id"];
$nuevosmensajes = mysql_query("SELECT COUNT(*) FROM clientacora where visto=0 and (num_poliza='$contrato1' OR num_poliza='$contrato2' OR num_poliza='$contrato3' OR num_poliza='$contrato4' OR num_poliza='$contrato5') and tipo=1 and general=$generalid", $link);
list($total) = mysql_fetch_row($nuevosmensajes);

 echo'                <tr> 
<td bgcolor="'.$bgcolor.'" class="dataclasslist" align=middle>'.$row["reporte_cliente"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclasslist" align=middle>'.$row["ejecutivo"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclasslist" align=middle>'.$fexad[2].'/'.$fexad[1].'/'.$fexad[0].' '.$fexa[1].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclasslist" align=middle>'.$row["usuario"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclasslist" align=middle>'.$ubicacionEstado.'</td>
<td bgcolor="'.$bgcolor.'" class="dataclasslist" align=middle>'.$ubicacionMunicipio.'</td>
';

echo'<td bgcolor="'.$bgcolor.'" class="dataclasslist"><center>';
echo' <div align="right">';
if($total>=1) {echo '<img src="mensaje.gif">';} else {echo '<img src="msgoff.gif">';}
echo'<a href="?module=detail_seguimiento&id='.$row["id"].'"><img src="plus.gif" border="0"></a></div>';
echo'</center></td></tr>
';
  }  
echo'</table>';
  }
else{echo'<center><b>No hay casos abiertos</b></center>';}
  
?>



</td></tr></table>