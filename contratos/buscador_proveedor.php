<?
session_start();
include 'conf.php';


?>

<link href="style_1.css" rel="stylesheet" type="text/css" />
<script src="confirm_asignacion.js" type="text/javascript"></script> 
<script type="text/javascript">
function getposOffset(overlay, offsettype){
var totaloffset=(offsettype=="left")? overlay.offsetLeft : overlay.offsetTop;
var parentEl=overlay.offsetParent;
while (parentEl!=null){
totaloffset=(offsettype=="left")? totaloffset+parentEl.offsetLeft : totaloffset+parentEl.offsetTop;
parentEl=parentEl.offsetParent;
}
return totaloffset;
}
function overlay(curobj, subobj){
if (document.getElementById){
var subobj=document.getElementById(subobj)
subobj.style.left=getposOffset(curobj, "left")+"px"
subobj.style.top=getposOffset(curobj, "top")+"px"
subobj.style.display="block"
return false
}
else
return true
}
function overlayclose(subobj){
document.getElementById(subobj).style.display="none"
}
</script>
<script type="text/javascript" src="subcombo_corto2.js"></script>
<h1>Buscador de Proveedores</h1>
<?
$accela == "edit";
?>
 <form method="post" action="mainframe.php?module=buscador_proveedor">
<input type="hidden" name="module" value="buscador_proveedor">
 <input type="hidden" name="buscas" value="si">
 <table cellpadding="4" cellspacing="4" border="0" align="center" width="450" bgcolor="#666666">
 
 <tr>
 <td>
 
<select name="servicio" id="servicio">
                                  <option value=''>Todos los servicios</option>
                                  <?

$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT * FROM servicios order by servicio", $link); 
if (mysql_num_rows($result)){ 
  while ($row = @mysql_fetch_array($result)) { 
  echo'<option value="'.$row["id"].'"';
    if($servicio==$row["id"]){echo"selected";}
	 echo'>'.$row["servicio"].'</option>';
  }}

			  ?>
                              </select>
 
 </td>
 </tr>
 
 <tr>
 <td>
 
<select name="estado" id="estado" onchange='cargaContenido(this.id)'>
                                  <option value=''>Todos los estados</option>
                                  <?

$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT * FROM Estado order by NombreEstado", $link); 
if (mysql_num_rows($result)){ 
  while ($row = @mysql_fetch_array($result)) { 
  echo'<option value="'.$row["idEstado"].'"';
       if($estado==$row["idEstado"]){echo"selected";}
	 echo'>'.$row["NombreEstado"].'</option>';
  }}

			  ?>
                              </select>
 
 </td>
 </tr>
 <tr>
 <td>
 <?
						  if($accela=="edit"){
						 echo'  <select name="municipio" id="municipio">';


$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT * FROM Municipio where idEstado='$estado' order by NombreMunicipio", $link); 
if (mysql_num_rows($result)){ 
  while ($row = @mysql_fetch_array($result)) { 
  echo'<option value="'.$row["idMunicipio"].'"';
     if($municipio==$row["idMunicipio"]){echo"selected";}
	 echo'>'.$row["NombreMunicipio"].'</option>';
  }}

					  
echo'</select>';
						  }
						  else{echo'<select disabled="disabled" name="municipio" id="municipio">
						<option value="">Todos los municipios</option>
					</select>';}
						  ?>                        
 </td>
 </tr>
 
  <tr>
 <td>
 <input type="submit" value="Buscar">
 </td>
 </tr>
 
 </table>
 
 </form>
 
 
 <table width="80%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td colspan="5" bgcolor="#bbbbbb">
    </td>
    </tr>
   <?
if(!empty($estado) and !empty($servicio) and !empty($municipio) and $buscas=="si"){$condicion="where (cobertura like '$estado-$municipio-_' or cobertura like '$estado-$municipio-_,%' or cobertura like '%,$estado-$municipio-_,%' or cobertura like '%,$estado-$municipio-_') and (trabajos like '%,$servicio,%' or trabajos='$servicio' or trabajos like '$servicio,%' or trabajos like '%,$servicio') AND";
$arreglo="
CASE 
WHEN cobertura LIKE '%$estado-$municipio-A%' THEN 1
WHEN cobertura LIKE '%$estado-$municipio-B%' THEN 2
WHEN cobertura LIKE '%$estado-$municipio-C%' THEN 3
WHEN cobertura LIKE '%$estado-$municipio-D%' THEN 4
WHEN cobertura LIKE '%$estado-$municipio-E%' THEN 5
WHEN cobertura LIKE '%$estado-$municipio-F%' THEN 6
WHEN cobertura LIKE '%$estado-$municipio-G%' THEN 7
WHEN cobertura LIKE '%$estado-$municipio-H%' THEN 8
WHEN cobertura LIKE '%$estado-$municipio-I%' THEN 9
WHEN cobertura LIKE '%$estado-$municipio-J%' THEN 10
WHEN cobertura LIKE '%$estado-$municipio-K%' THEN 11
WHEN cobertura LIKE '%$estado-$municipio-L%' THEN 12
WHEN cobertura LIKE '%$estado-$municipio-M%' THEN 13
WHEN cobertura LIKE '%$estado-$municipio-N%' THEN 14
WHEN cobertura LIKE '%$estado-$municipio-O%' THEN 15
WHEN cobertura LIKE '%$estado-$municipio-P%' THEN 16
WHEN cobertura LIKE '%$estado-$municipio-Q%' THEN 17
WHEN cobertura LIKE '%$estado-$municipio-R%' THEN 18
WHEN cobertura LIKE '%$estado-$municipio-S%' THEN 19
WHEN cobertura LIKE '%$estado-$municipio-T%' THEN 20
WHEN cobertura LIKE '%$estado-$municipio-U%' THEN 21
WHEN cobertura LIKE '%$estado-$municipio-V%' THEN 22
WHEN cobertura LIKE '%$estado-$municipio-W%' THEN 23
WHEN cobertura LIKE '%$estado-$municipio-X%' THEN 24
WHEN cobertura LIKE '%$estado-$municipio-Y%' THEN 25
WHEN cobertura LIKE '%$estado-$municipio-Z%' THEN 26
END


";
}

elseif(!empty($estado) and !empty($municipio) and empty($servicio) and $buscas=="si"){$condicion="where (cobertura like '$estado-$municipio-_' or cobertura like '$estado-$municipio-_,%' or cobertura like '%,$estado-$municipio-_,%' or cobertura like '%,$estado-$municipio-_') AND";
$arreglo="nombre";
}

if(!empty($estado) and !empty($servicio) and empty($municipio) and $buscas=="si"){$condicion="where (cobertura like '$estado-%' or cobertura like '%,$estado-%') and (trabajos like '%,$servicio,%' or trabajos='$servicio' or trabajos like '$servicio,%' or trabajos like '%,$servicio') AND";
$arreglo="nombre";
}

elseif(!empty($estado) and empty($municipio) and empty($servicio) and $buscas=="si"){$condicion="where (cobertura like '$estado-%' or cobertura like '%,$estado-%') AND";
$arreglo="nombre";
}

elseif(empty($estado) and !empty($servicio) and $buscas=="si"){$condicion="where (trabajos like '%,$servicio,%' or trabajos='$servicio' or trabajos like '$servicio,%' or trabajos like '%,$servicio') AND";
$arreglo="nombre";
}

elseif(empty($estado) and empty($servicio) and $buscas=="si"){$condicion="where";
$arreglo="nombre";
}
   
elseif(empty($buscas)){$condicion="where id=0 AND";
$arreglo="nombre";
}

$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT * FROM Provedor $condicion status='activo' order by $arreglo", $link); 
if (mysql_num_rows($result)){ 
echo' <tr>
    <td align="center" bgcolor="#bbbbbb"><strong>Proveedor</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Contacto</strong></td>		
    <td align="center" bgcolor="#bbbbbb"><strong>Cobertura</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Especialidad</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Servicios</strong></td>
  </tr>';
$bgcolor="#cccccc";
  while ($row = @mysql_fetch_array($result)) { 
if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}
/*
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Estado where idEstado = '$estado'",$db);
$nombre_estado=mysql_result($result,0,"NombreEstado");

if($display==!"all"){
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Municipio where idMunicipio = '$municipio'",$db);
$nombre_municipio=mysql_result($result,0,"NombreMunicipio");
}
*/
$services=explode(",",$row["trabajos"]);



  echo'                <tr> 

<td bgcolor="'.$bgcolor.'" class="dataclass">'.$row["nombre"].'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><a href="#" onClick="return overlay(this, \'subcontent'.$row["id"].'\')">Contacto</a>

<DIV id="subcontent'.$row["id"].'" style="position:absolute; display:none; border: 1px solid black; background-color: #eeeeee; width: 400px; padding: 5px">
<table width=100% cellpadding=3 cellspacing=3 border=0><tr><td width=30%><b>Datos de contacto</b></td><td width=70% align=right><a href="#" onClick="overlayclose(\'subcontent'.$row["id"].'\'); return false"><b>Cerrar [X]</b></a></td></tr>
<tr><td colspan=2 bgcolor="#bbbbbb" style="font-size:11px;"><b>'.$row["nombre"].'</b></td></tr>
<tr>
<td bgcolor="#cccccc" style="font-size:11px;"><b>Horario:</b></td>
<td bgcolor="#cccccc" style="font-size:11px;">'.$row["horario"].'</td>
</tr>
<tr>
<td bgcolor="#cccccc" style="font-size:11px;"><b>Precios:</b></td>
<td bgcolor="#cccccc" style="font-size:11px;">'.nl2br($row["precios"]).'</td>
</tr>
<tr>
<td bgcolor="#cccccc" style="font-size:11px;" colspan=2><b>Contacto:</b> '.$row["contacto"].'<br>
<b>Tel�fono:</b> '.$row["tel"].'<br>
<b>Fax:</b> '.$row["fax"].'<br>
<b>Celular:</b> '.$row["cel"].'<br>
<b>Nextel:</b> '.$row["nextel"].'<br>
<b>Email:</b> <a href="mailto:'.$row["mail"].'">'.$row["mail"].'</a>
</td>
</tr>

<tr>
<td bgcolor="#cccccc" style="font-size:11px;" colspan=2><b>Contacto2:</b> '.$row["contacto2"].'<br>
<b>Tel�fono:</b> '.$row["tel2"].'<br>
<b>Fax:</b> '.$row["fax2"].'<br>
<b>Celular:</b> '.$row["cel2"].'<br>
<b>Nextel:</b> '.$row["nextel2"].'<br>
<b>Email:</b> <a href="mailto:'.$row["mail2"].'">'.$row["mail2"].'</a>
</td>
</tr>
</table>
</DIV>


</td>


<td bgcolor="'.$bgcolor.'" class="dataclass">';

echo '<a href="#" onClick="return overlay(this, \'cobertura'.$row["id"].'\')">Cobertura</a>';
echo '<DIV id="cobertura'.$row["id"].'" style="position:absolute; display:none; border: 1px solid black; background-color: #eeeeee; width: 400px; padding: 5px">
<table width=100% cellpadding=3 cellspacing=3 border=0><tr><td width=30%><b>Cobertura</b></td><td width=70% align=right><a href="#" onClick="overlayclose(\'cobertura'.$row["id"].'\'); return false"><b>Cerrar [X]</b></a></td></tr>
<tr><td colspan=2 bgcolor="#bbbbbb" style="font-size:11px;">';
$areas_cobertura=explode(",",$row["cobertura"]);
sort($areas_cobertura);
foreach($areas_cobertura as $mikarea){
if($mikarea!="" && $mikarea!=" "){
$apart=explode("-",$mikarea);
$dbdou = mysql_connect($host,$username,$pass);
mysql_select_db($database,$dbdou);
$resultdou = mysql_query("SELECT * from Estado where idEstado = '$apart[0]'",$dbdou);
$xexestado=mysql_result($resultdou,0,"NombreEstado");
$resultdou = mysql_query("SELECT * from Municipio where idMunicipio = '$apart[1]'",$dbdou);
$xexmunicipio=mysql_result($resultdou,0,"NombreMunicipio");
if($mikarea=="".$estado."-".$municipio."-".$apart[2].""){echo'<li><b>'.$xexestado.' - '.$xexmunicipio.' ('.$apart[2].')</b><br>';}
else{echo'<li>'.$xexestado.' - '.$xexmunicipio.' ('.$apart[2].')<br>';}

}
}

echo '</td>
</tr>
</table>
</DIV>';


echo'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["especialidad"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass">';

echo '<a href="#" onClick="return overlay(this, \'servicios'.$row["id"].'\')">Servicios</a>';
echo '<DIV id="servicios'.$row["id"].'" style="position:absolute; display:none; border: 1px solid black; background-color: #eeeeee; width: 400px; padding: 5px">
<table width=100% cellpadding=3 cellspacing=3 border=0><tr><td width=30%><b>Servicios</b></td><td width=70% align=right><a href="#" onClick="overlayclose(\'servicios'.$row["id"].'\'); return false"><b>Cerrar [X]</b></a></td></tr>
<tr><td colspan=2 bgcolor="#bbbbbb" style="font-size:11px;">';

foreach($services as $servo){
$dbx = mysql_connect($host,$username,$pass);
mysql_select_db($database,$dbx);
$resultx = mysql_query("SELECT * from servicios where id = '$servo'",$dbx);
$servox=mysql_result($resultx,0,"servicio");
if($servo==$servicio){echo'<li><b>'.$servox.'</b>';}
else{echo'<li>'.$servox.'';}
}
echo '</td>
</tr>
</table>
</DIV>';

echo'</td></tr>
';


   }

   echo'</table>';

   }
   else{
   
   
echo'</td></tr></table>';
   }


   ?>
   
