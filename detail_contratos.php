<?
$checa_arrayx=array_search("contratos",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Contratos</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="400">&nbsp; 
 </td>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=contratos"><td align="right" class="questtitle">Búsqueda: 
              <input name="quest" type="text" id="quest2" size="15"> <input type="submit" name="Submit" value="Buscar">
            </td></form>
          </tr>
        </table>
      </td>
  </tr>
<tr><td>
<?
$db = mysqli_connect($host,$username,$pass);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Poliza where idPoliza = '$idPoliza'",$db);
$idCliente=mysql_result($result,0,"idCliente");
$idEmpleado=mysql_result($result,0,"idEmpleado");
$fechaCaptura=mysql_result($result,0,"fechaCaptura");
$fecha1=explode(" ",$fechaCaptura);
$fecha1=explode("-",$fecha1[0]);
$numPoliza=mysql_result($result,0,"numPoliza");
$tipoVenta=mysql_result($result,0,"tipoVenta");
$fechaInicio=mysql_result($result,0,"fechaInicio");
$fecha2=explode(" ",$fechaInicio);
$fecha2=explode("-",$fecha2[0]);
$fechaVence=mysql_result($result,0,"fechaVence");
$fecha3=explode(" ",$fechaVence);
$fecha3=explode("-",$fecha3[0]);
$factura=mysql_result($result,0,"factura");
$monto=mysql_result($result,0,"monto");
$comision=mysql_result($result,0,"comision");
$ingreso=mysql_result($result,0,"ingreso");
$productos=mysql_result($result,0,"productos");
###
$db2 = mysqli_connect($host,$username,$pass);
//mysql_select_db($database,$db2);
$result2 = mysqli_query("SELECT * from Empleado where idEmpleado = '$idEmpleado'",$db2);
$vendedor=mysql_result($result2,0,"nombre");
###
$db2 = mysqli_connect($host,$username,$pass);
//mysql_select_db($database,$db2);
$result2 = mysqli_query("SELECT * from Cliente where idCliente = '$idCliente'",$db2);
$cliente=mysql_result($result2,0,"nombre");
###
/*
$db6 = mysqli_connect($host,$username,$pass);
//mysql_select_db($database,$db6);
$result6 = mysqli_query("SELECT * from TipoVenta where idVenta = '$tipoVenta'",$db6);
$tipoVenta=mysql_result($result6,0,"nombre");
*/
$db7 = mysqli_connect($host,$username,$pass);
//mysql_select_db($database,$db7);
$result7 = mysqli_query("SELECT * from productos where id = '$productos'",$db7);
$elproducto=mysql_result($result7,0,"producto");
$terminos=mysql_result($result7,0,"terminos");
###

?>

<table width="100%%" border="0" cellspacing="3" cellpadding="3">

  <tr>

    <td colspan="2" align="center" bgcolor="#bbbbbb"><b>Detalles del Contrato <? echo ''.$numPoliza.'';?></b></td>
    </tr>

  <tr>

    <td width="50%" bgcolor="#CCCCCC"><strong>Cliente:</strong> <? echo $cliente?></td>

    <td bgcolor="#CCCCCC"><strong>Vendedor:</strong> <? echo $vendedor?></td>
    </tr>

  <tr>


    <td bgcolor="#CCCCCC" colspan=2><strong>Producto:</strong> <? echo $elproducto; ?></td>
    </tr>
<?
	if($factura=="1"){
echo'<tr><td align=right><b>Factura</b></td><td>&nbsp;</td></tr>
<tr><td bgcolor="#CCCCCC" align=right><strong>Monto:</strong></td><td bgcolor="#CCCCCC">$'.number_format($monto,2).'</td></tr>
<tr><td align=right><strong>Comisión:</strong></td><td>$'.number_format($comision,2).'</td></tr>
<tr><td bgcolor="#CCCCCC" align=right><strong>Ingreso:</strong></td><td bgcolor="#CCCCCC">$'.number_format($ingreso,2).'</td></tr>';
}

echo'</table>';

##################
$link = mysqli_connect($host, $username, $pass); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM usuarios_contrato where idPoliza='$idPoliza' order by inciso", $link); 
if (mysql_num_rows($result)){ 
echo'<table width=100% cellpadding=3 cellspacing=3><tr><td colspan=8 align=middle><b>Usuarios</b></td></tr>
<tr>
    <td align="center" bgcolor="#bbbbbb"><strong>Contrato</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Inciso</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Clave del usuario</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Nombre</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Fecha de inicio</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Fecha de vencimiento</strong></td>
    <td align="center" bgcolor="#bbbbbb"><strong>Status</strong></td>	
  </tr>';
$bgcolor="#cccccc";
while ($row = @mysql_fetch_array($result)) { 

$fecha1=$row["fecha_inicio"];
$fecha1=explode(" ",$fecha1);
$fecha1_date=explode("-",$fecha1[0]);
$fecha2=$row["fecha_vencimiento"];
$fecha2=explode(" ",$fecha2);
$fecha2_date=explode("-",$fecha2[0]);

if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}
  echo'<tr>
<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contrato"].'</td>  
  <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["inciso"].'</td>
    <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["clave"].'</td>
	  <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>
	    <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$fecha1_date[2].'/'.$fecha1_date[1].'/'.$fecha1_date[0].' '.$fecha1[1].'</td>
		  <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$fecha2_date[2].'/'.$fecha2_date[1].'/'.$fecha2_date[0].' '.$fecha2[1].'</td>
		  	  <td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["status"].'</td>
 </tr>';

  
  }
  echo'</table>';
  }

 
?>

</table>
</td></tr></table>