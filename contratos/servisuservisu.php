 <?
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from general where id = '$id'",$db);
if (mysql_num_rows($result)){ 
$motivo_servicio=mysql_result($result,0,"motivo_servicio");
$tecnico_solicitado=mysql_result($result,0,"tecnico_solicitado");
$tipo_asistencia_medica=mysql_result($result,0,"tipo_asistencia_medica");
$tipo_asistencia_vial=mysql_result($result,0,"tipo_asistencia_vial");
$ubicacion_requiere=mysql_result($result,0,"ubicacion_requiere");
$domicilio_cliente=mysql_result($result,0,"domicilio_cliente");
$domicilio_sustituto=mysql_result($result,0,"domicilio_sustituto");
$ubicacion_estado=mysql_result($result,0,"ubicacion_estado");
$ubicacion_municipio=mysql_result($result,0,"ubicacion_municipio");
$ubicacion_colonia=mysql_result($result,0,"ubicacion_colonia");
$ubicacion_ciudad=mysql_result($result,0,"ubicacion_ciudad");
$destino_servicio=mysql_result($result,0,"destino_servicio");
$destino_estado=mysql_result($result,0,"destino_estado");
$destino_municipio=mysql_result($result,0,"destino_municipio");
$destino_colonia=mysql_result($result,0,"destino_colonia");
$destino_ciudad=mysql_result($result,0,"destino_ciudad");
$observaciones=mysql_result($result,0,"observaciones");
}


$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Colonia where idColonia = '$ubicacion_colonia'",$db);
if (mysql_num_rows($result)){ 
$ubicacion_colonia=mysql_result($result,0,"NombreColonia");
}

$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Estado where idEstado = '$ubicacion_estado'",$db);
if (mysql_num_rows($result)){ 
$ubicacion_estado=mysql_result($result,0,"NombreEstado");
}

$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Municipio where idMunicipio = '$ubicacion_municipio'",$db);
if (mysql_num_rows($result)){ 
$ubicacion_municipio=mysql_result($result,0,"NombreMunicipio");
}


$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Estado where idEstado = '$destino_estado'",$db);
if (mysql_num_rows($result)){ 
$destino_estado=mysql_result($result,0,"NombreEstado");
}

$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Municipio where idMunicipio = '$destino_municipio'",$db);
if (mysql_num_rows($result)){ 
$destino_municipio=mysql_result($result,0,"NombreMunicipio");
}


$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Colonia where idColonia = '$destino_colonia'",$db);
if (mysql_num_rows($result)){ 
$destino_colonia=mysql_result($result,0,"NombreColonia");
}

$ivx=0;

	  ?><table width="100%" border="0" cellspacing="3" cellpadding="3">
 <tr>
      
      <?
$checa_array=array_search("motivo_servicio",$camposex);
if($checa_array===FALSE){} else{
?>

      <td><strong>Motivo del servicio:</strong> <? echo nl2br($motivo_servicio);?></td>
      
       <? $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>


<?
$checa_array=array_search("tecnico_solicitado",$camposex);
if($checa_array===FALSE){} else{
?>
   <td><strong>T&eacute;cnico solicitado:</strong> <? echo $tecnico_solicitado;?></td>
   
    <? $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
            <?
$checa_array=array_search("tipo_asistencia_vial",$camposex);
if($checa_array===FALSE){} else{
?>
   <td><strong>Tipo de asistencia vial:</strong>  <? echo $tipo_asistencia_vial;?></td>
    <? $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
              <?
$checa_array=array_search("tipo_asistencia_medica",$camposex);
if($checa_array===FALSE){} else{
?>
   <td><strong>Tipo de asistencia m&eacute;dica:</strong> <? echo $tipo_asistencia_medica;?></td>

 <? $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
             <?
$checa_array=array_search("domicilio_cliente",$camposex);
if($checa_array===FALSE){} else{
?>
      <td><strong>Domicilio del cliente:</strong> <? echo $domicilio_cliente;?></td>
      <? $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
        <?
$checa_array=array_search("domicilio_sustituto",$camposex);
if($checa_array===FALSE){} else{
?>
      <td><strong>Domicilio donde recoger&aacute; auto sustituto:</strong> <? echo $domicilio_sustituto;?></td>
      
      <? $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
               <?
$checa_array=array_search("ubicacion_requiere",$camposex);
if($checa_array===FALSE){} else{
?>
      
      <td><strong>Ubicaci&oacute;n donde se requiere el servicio: </strong><? echo $ubicacion_requiere;?></td>
       <? $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
               <?
$checa_array=array_search("ubicacion_estado",$camposex);
if($checa_array===FALSE){} else{
?>

      <td><strong>Ubicaci&oacute;n Estado:</strong> <? echo $ubicacion_estado;?></td>
      <? $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
            <?
$checa_array=array_search("ubicacion_municipio",$camposex);
if($checa_array===FALSE){} else{
?>
      <td><strong>Ubicaci&oacute;n Municipio:</strong> <? echo $ubicacion_municipio;?></td>
      <? $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
              <?
$checa_array=array_search("ubicacion_colonia",$camposex);
if($checa_array===FALSE){} else{
?>
      <td><strong>Ubicaci&oacute;n Colonia:</strong> <? echo $ubicacion_colonia;?></td>

<? $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
             <?
$checa_array=array_search("ubicacion_ciudad",$camposex);
if($checa_array===FALSE){} else{
?>
      <td><strong>Ubicaci&oacute;n Ciudad:</strong>  <? echo $ubicacion_ciudad;?></td>
      
<? $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>
             <?
$checa_array=array_search("destino_servicio",$camposex);
if($checa_array===FALSE){} else{
?>
      <td><strong>Destino del servicio:</strong> <? echo $destino_servicio;?></td>     
      <? $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?> 
               <?
$checa_array=array_search("destino_estado",$camposex);
if($checa_array===FALSE){} else{
?>
      <td><strong>Destino Estado:</strong> <? echo $destino_estado;?></td>            

 <? $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?> 
                <?
$checa_array=array_search("destino_municipio",$camposex);
if($checa_array===FALSE){} else{
?>
      <td><strong>Destino Municipio:</strong>  <? echo $destino_municipio;?></td>
      <? $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?> 
                          <?
$checa_array=array_search("destino_colonia",$camposex);
if($checa_array===FALSE){} else{
?>
      <td><strong>Destino Colonia:</strong> <? echo $destino_colonia;?></td> 
       <? $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?>      
               <?
$checa_array=array_search("destino_ciudad",$camposex);
if($checa_array===FALSE){} else{
?>
      <td><strong>Destino Ciudad:</strong> <? echo $destino_ciudad;?></td>            
      <? $ivx++; 
			if($ivx=="3"){echo'</tr><tr>'; $ivx=0;}
			}?> 
	<? if(empty($NO_EDITAR)):?>
      <td align="right"><strong></strong></td>
	<? endif; ?>
    </tr></table>
