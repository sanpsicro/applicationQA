<?php
session_start();
 $explota_permisos=explode(",",$_SESSION["valid_permisos"]);
if(isset($_POST['tmpid']) || isset($_POST['idPoliza']) || isset($_POST['tipocliente']) || isset($_POST['numcontrato']) || isset($_POST['idCliente']) ){ 
$tmpid = $_POST['tmpid'];
$idPoliza = $_POST['idPoliza'];
$tipocliente = $_POST['tipocliente'];
$numcontrato = $_POST['numcontrato'];
$idCliente = $_POST['idCliente'];
$code = $_POST['code'];
}else{
$tmpid = null;
$idPoliza = null;
$tipocliente = null;
$numcontrato = null;
$idCliente = null;
$code = null;
}

?>
 <html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link href="style_1.css" rel="stylesheet" type="text/css" />
<script src="confirm_del.js" type="text/javascript"></script> 
</head><body>
 <table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td colspan="9" bgcolor="#bbbbbb"><table width="100%%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><strong>Usuarios del contrato</strong></td>
        <td width="100" align="center" class="blacklinks">
		<?php  
		$checa_array1=array_search("5_a",$explota_permisos);
if($checa_array1===FALSE){} else{echo'[ <a href="admin_usuarios_contrato.php?accela=new&tmpid='.$tmpid.'&idPoliza='.$idPoliza.'&tipocliente='.$tipocliente.'&numcontrato='.$numcontrato.'&idCliente='.$idCliente.'">Nuevo usuario</a> ]'; } ?>
</td>
      </tr>
    </table>      </td>
  </tr>
  <?php 
if($code=="5"){echo'<tr><td colspan=8><b>Error: el tipo de cliente es unitario. No puede agregar m�s usuarios.</b></td></tr>';}
   include 'conf.php';
   if(isset($idPoliza) && $idPoliza!="" && $idPoliza!="0"){
   $condicion="where idPoliza = '$idPoliza'";
   }
   else{
$condicion="where contrato = '$numcontrato'";
   }
$link = mysqli_connect($host, $username, $pass,$database); 
////mysql_select_db($database, $link); 
$result = mysqli_query($link,"SELECT * FROM usuarios_contrato $condicion order by inciso"); 
if (mysqli_num_rows($result)){ 
echo' <tr>
    <td align="center" bgcolor="#bbbbbb"><strong>Nombre</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Contrato</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Inciso</strong></td>	
    <td align="center" bgcolor="#bbbbbb"><strong>Tipo de venta</strong></td>			
    <td align="center" bgcolor="#bbbbbb"><strong>Fecha de inicio</strong></td>		
    <td align="center" bgcolor="#bbbbbb"><strong>Fecha de vencimiento</strong></td>			
    <td align="center" bgcolor="#bbbbbb"><strong>Clave Usuario</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Status</strong></td>	
    <td align="center" bgcolor="#bbbbbb" width=150><strong>Operaci&oacute;n</strong></td>
  </tr>';
$bgcolor="#cccccc";



  while ($row = @mysqli_fetch_array($result)) { 
  
  if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}
  
$finicio=$row["fecha_inicio"];
$finicio=explode(" ",$finicio);
$finiciox=explode("-",$finicio[0]);

if($row["fecha_vencimiento"]!="0000-00-00 00:00:00"){
$finix=$row["fecha_vencimiento"];
$finix=explode(" ",$finix);
$finixx=explode("-",$finix[0]);

$finalix="".$finixx[2]."/".$finixx[1]."/".$finixx[0]." ".$finix[1]."";

}
else{$finalix="N/A";}

  echo'                <tr> 

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contrato"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["inciso"].'</td><td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>';
if($row["tipo_venta"]=="1"){echo'Anual';}
elseif($row["tipo_venta"]=="2"){echo 'Semestral';}
elseif($row["tipo_venta"]=="3"){echo'Mensual';}
else{echo'Evento';}
echo'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$finiciox[2].'/'.$finiciox[1].'/'.$finiciox[0].' '.$finicio[1].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$finalix.'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["clave"].'</td>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["status"].'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle><center>';



$checa_array1=array_search("5_d",$explota_permisos);
if($checa_array1===FALSE){} else{echo'<a href="detail_usuarios_contrato.php?accela=edit&id='.$row["id"].'&idPoliza='.$row["idPoliza"].'&tmpid='.$row["tmpid"].'&tipocliente='.$tipocliente.'&numcontrato='.$numcontrato.'&idCliente='.$idCliente.'">Detalle</a> |  ';}


$checa_array1=array_search("5_c",$explota_permisos);

if($checa_array1===FALSE){} else{echo'<a href="admin_usuarios_contrato.php?accela=edit&id='.$row["id"].'&idPoliza='.$row["idPoliza"].'&tmpid='.$row["tmpid"].'&tipocliente='.$tipocliente.'&numcontrato='.$numcontrato.'&idCliente='.$idCliente.'">Editar</a> |  ';}

$checa_array1=array_search("5_b",$explota_permisos);

if($checa_array1===FALSE){} else{echo' <a href="javascript:confirmDelete(\'process.php?module=usuarios_contrato&accela=delete&id='.$row["id"].'&idPoliza='.$row["idPoliza"].'&tmpid='.$row["tmpid"].'&tipocliente='.$tipocliente.'&numcontrato='.$numcontrato.'&idCliente='.$idCliente.'\',\'al usuario\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">Eliminar</a>

';}


echo'</center></td>

</tr>';

   }

   echo'</table>';

   }

   ?>
   </body></html>