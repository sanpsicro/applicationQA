<script type="text/javascript" src="subcombo_corto.js"></script>
<table border=0 width=100% cellpadding=0 cellspacing=0>

 <tr> 

      <td height="44" align="left" background="img/blackbar.gif"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Proveedores</span></td><td width=150 class="blacklinks">[ <a href="admin_proveedores.php?accela=new">Nuevo Proveedor</a> ]</td></tr></table></td></tr>

 <tr> 

      <td height="47" align="left" background="img/bar5.gif"><table width="100%" border="0" cellspacing="3" cellpadding="3">

          <tr>

            

            <td width="400" 			class="questtitle"> 
			<? 
			if($accela=="new"){echo'Dar de alta Proveedor';}
			else{echo'Editar Proveedor';

			}
			?>

</td>



            <td>&nbsp;</td>

            <form name="form1" method="post" action="bridge.php?module=proveedores"><td align="right" class="questtitle">Búsqueda: 

              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">

            </td></form>

          </tr>

        </table>

      </td>

  </tr>



<tr><td bgcolor="#eeeeee">

<table border=0 width=100% cellpadding=0 cellspacing=0>
  <tr> 
    <td valign="top" bgcolor="#eeeeee"><table width="100%" border="0" cellspacing="5" cellpadding="5">
        <tr> 
          <td><table width="100%" height=100% border="1" cellpadding="6" cellspacing="0" bordercolor="#000000" bgcolor="#FFFFFF" class="contentarea1">
              <tr> 
                <td valign="top"> <div align="center">

<? if($accela=="edit" && isset($id)){
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Provedor where id = '$id'",$db);
$nombre=mysql_result($result,0,"nombre");
$usuario=mysql_result($result,0,"usuario");
$contrasena=mysql_result($result,0,"contrasena");
$calle=mysql_result($result,0,"calle");
$colonia=mysql_result($result,0,"colonia");
$cp=mysql_result($result,0,"cp");
$estado=mysql_result($result,0,"estado");
$municipio=mysql_result($result,0,"municipio");
$especialidad=mysql_result($result,0,"especialidad");
$trabajos=mysql_result($result,0,"trabajos");
$serviciosx=explode(",",$trabajos);
$cobertura=mysql_result($result,0,"cobertura");
$horario=mysql_result($result,0,"horario");
$precios=mysql_result($result,0,"precios");
$sucursales=mysql_result($result,0,"sucursales");
$contacto=mysql_result($result,0,"contacto");
$tel=mysql_result($result,0,"tel");
$fax=mysql_result($result,0,"fax");
$cel=mysql_result($result,0,"cel");
$nextel=mysql_result($result,0,"nextel");
$nextelid=mysql_result($result,0,"nextelid");
$nextelid2=mysql_result($result,0,"nextelid2");
$telcasa=mysql_result($result,0,"telcasa");
$telcasa2=mysql_result($result,0,"telcasa2");
$mail=mysql_result($result,0,"mail");
$contacto2=mysql_result($result,0,"contacto2");
$tel2=mysql_result($result,0,"tel2");
$fax2=mysql_result($result,0,"fax2");
$cel2=mysql_result($result,0,"cel2");
$nextel2=mysql_result($result,0,"nextel2");
$mail2=mysql_result($result,0,"mail2");
$banco=mysql_result($result,0,"banco");
$numcuenta=mysql_result($result,0,"numcuenta");
$clabe=mysql_result($result,0,"clabe");
$observaciones=mysql_result($result,0,"observaciones");
$status=mysql_result($result,0,"status");
}
echo'<form name="form1" method="post" action="process.php?module=proveedores&accela='.$accela.'&id='.$id.'">';     
?>
                      <table border="0" cellspacing="3" cellpadding="3" width=100%>

                        <tr>
                          <td align="right" valign="top"><table width="100%%" border="0" cellspacing="3" cellpadding="3">
                            <tr>
                              <td align="right" bgcolor="#eeeeee"><strong>Nombre:</strong></td>
                              <td bgcolor="#eeeeee"><input name="nombre" type="text" id="nombre" size="50" value="<? echo"$nombre";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Usuario:</strong></td>
                              <td bgcolor="#eeeeee"><input name="usuario" type="text" id="usuario" size="50" value="<? echo"$usuario";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Contrase&ntilde;a:</strong></td>
                              <td bgcolor="#eeeeee"><input name="contrasena" type="password" id="contrasena" size="50" value="<? echo"$contrasena";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Calle y no.:</strong></td>
                              <td bgcolor="#eeeeee"><input name="calle" type="text" id="calle" size="50" value="<? echo"$calle";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Colonia:</strong></td>
                              <td bgcolor="#eeeeee"><input name="colonia" type="text" id="colonia" size="50" value="<? echo"$colonia";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>C.P.:</strong></td>
                              <td bgcolor="#eeeeee"><input name="cp" type="text" id="cp" size="50" value="<? echo"$cp";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Estado:</strong></td>
                              <td bgcolor="#eeeeee"><select name="estado" id="estado" onchange='cargaContenido(this.id)'>
                                  <option value='0'>Seleccione un Estado</option>
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
                              </select></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Municipio:</strong></td>
                              <td bgcolor="#eeeeee"><?
						  if($accela=="edit"){
						 echo'  <select name="municipio" id="municipio">';


$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT * FROM Municipio where idEstado='$estado'order by NombreMunicipio", $link); 
if (mysql_num_rows($result)){ 
  while ($row = @mysql_fetch_array($result)) { 
  echo'<option value="'.$row["idMunicipio"].'"';
     if($municipio==$row["idMunicipio"]){echo"selected";}
	 echo'>'.$row["NombreMunicipio"].'</option>';
  }}

					  
echo'</select>';
						  }
						  else{echo'<select disabled="disabled" name="municipio" id="municipio">
						<option value="0">Seleccione un Estado</option>
					</select>';}
						  ?>                              </td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Especialidad:</strong></td>
                              <td bgcolor="#eeeeee"><input name="especialidad" type="text" id="especialidad" size="50" value="<? echo"$especialidad";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Trabajos que realiza:</strong></td>
                              <td bgcolor="#eeeeee"><?
$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT * FROM servicios", $link); 
if (mysql_num_rows($result)){ 
$cuenta=0;
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">';

while ($row = @mysql_fetch_array($result)) { 
if($cuenta=="0"){echo'<tr>';}

echo'<td bgcolor="#eeeeee" width=50%><input name="servicios[]" id="servicios" type="checkbox" value="'.$row["id"].'"';
$checa_array=array_search($row["id"],$serviciosx);
if($checa_array===FALSE){} else{echo ' checked';}
echo'> '.$row["servicio"].'</td>';

$cuenta=$cuenta+1;
if($cuenta=="2"){echo'</tr>'; $cuenta=0;}
  }  

echo'</table>';
  }
?></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Horario de atenci&oacute;n:</strong> </td>
                              <td bgcolor="#eeeeee"><input name="horario" type="text" id="horario" size="50" value="<? echo"$horario";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Lista de Precios:</strong> </td>
                              <td bgcolor="#eeeeee"><textarea name="precios" cols="50" rows="5" id="precios" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"><? echo"$precios";?></textarea></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Sucursales:</strong></td>
                              <td bgcolor="#eeeeee"><textarea name="sucursales" cols="50" rows="5" id="sucursales" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"><? echo"$sucursales";?></textarea></td>
                            </tr>
                          </table></td>
                          <td colspan="2" align="right" valign="top"><table width="100%%" border="0" cellspacing="3" cellpadding="3">
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Contacto 1:</strong></td>
                              <td bgcolor="#eeeeee"><input name="contacto" type="text" id="contacto" onblur="f(this)" onclick="f(this)" onkeydown="f(this)" onkeyup="f(this)" size="50" onattrmodified="g(this)" onpropertychange="g(this)" value="<? echo"$contacto";?>"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Tel. Oficina 1:</strong></td>
                              <td bgcolor="#eeeeee"><input name="tel" type="text" id="tel" size="50" value="<? echo"$tel";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Tel. Oficina 2:</strong></td>
                              <td bgcolor="#eeeeee"><input name="tel2" type="text" id="tel2" size="50" value="<? echo"$tel2";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Tel. Oficina 3:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><input name="fax2" type="text" id="fax2" size="50" value="<? echo"$fax2";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Tel / Fax:</strong></td>
                              <td bgcolor="#eeeeee"><input name="fax" type="text" id="fax" size="50" value="<? echo"$fax";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Celular:</strong></td>
                              <td bgcolor="#eeeeee"><input name="cel" type="text" id="cel" size="50" value="<? echo"$cel";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Tel. Nextel:</strong></td>
                              <td bgcolor="#eeeeee"><input name="nextel" type="text" id="nextel" size="50" value="<? echo"$nextel";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>ID Nextel:</strong></td>
                              <td bgcolor="#eeeeee"><input name="nextelid" type="text" id="nextelid" size="50" value="<? echo"$nextelid";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Tel. Casa:</strong></td>
                              <td bgcolor="#eeeeee"><input name="telcasa" type="text" id="telcasa" size="50" value="<? echo"$telcasa";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>E-mail:</strong></td>
                              <td bgcolor="#eeeeee"><input name="mail" type="text" id="mail" size="50" value="<? echo"$mail";?>" /></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Contacto 2:</strong></td>
                              <td bgcolor="#eeeeee"><input name="contacto2" type="text" id="contacto2" onblur="f(this)" onclick="f(this)" onkeydown="f(this)" onkeyup="f(this)" size="50" onattrmodified="g(this)" onpropertychange="g(this)" value="<? echo"$contacto2";?>"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Tel&eacute;fono Celular:</strong></td>
                              <td bgcolor="#eeeeee"><input name="cel2" type="text" id="cel2" size="50" value="<? echo"$cel2";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Tel. Nextel:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><input name="nextel2" type="text" id="nextel2" size="50" value="<? echo"$nextel2";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>ID Nextel:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><input name="nextelid2" type="text" id="nextelid2" size="50" value="<? echo"$nextelid2";?>" onkeypress="return numbersonly(this, event)"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>E-mail:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><input name="mail2" type="text" id="mail2" size="50" value="<? echo"$mail2";?>"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Banco:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><input name="banco" type="text" id="banco" size="50" value="<? echo"$banco";?>"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>No. de Cuenta:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><input name="numcuenta" type="text" id="numcuenta" size="50" value="<? echo"$numcuenta";?>"/></td>
                            </tr>
							<tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>CLABE:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><input name="clabe" type="text" id="clabe" size="50" value="<? echo"$clabe";?>"/></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Observaciones:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><strong><strong>
                                <textarea name="observaciones" cols="50" rows="10" id="observaciones" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"><? echo"$observaciones";?></textarea>
                              </strong></strong></td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee"><strong>Status:</strong></td>
                              <td valign="top" bgcolor="#eeeeee"><select name="status" id="status">
                                <option value="activo" <? if($status=="activo"){echo' selected ';} ?>>Activo</option>
                                <option value="inactivo" <? if($status=="inactivo"){echo' selected ';} ?>>Inactivo</option>
                              </select>
                              </td>
                            </tr>
                            <tr>
                              <td align="right" valign="top" bgcolor="#eeeeee" colspan="2">
                           <? 
			if($accela=="new"){echo'';}
			else{echo'<iframe src ="notas_proveedorb.php?&id='.$id.'&popup=1" name="window2" width="100%" marginwidth="50" height="200" marginheight="50" align="30" frameborder="0" id="window2" border="0"></iframe>';

			}
			?>
                           
                          
                              </td>
                            </tr>
                          </table></td>
                        </tr>
                      </table>
					  
					  <table width="100%" border="0" cellspacing="3" cellpadding="3">
                                                      <tr>
                                                        <td width="100%" bgcolor="#eeeeee"> <strong>Areas de cobertura:</strong>
														<?
														echo'<iframe src ="areas_cobertura.php?accela='.$accela.'&id='.$id.'" name="window1" width="100%" marginwidth="50" height="200" marginheight="50" align="30" frameborder="0" id="window1" border="0"></iframe>';
														?>
                                                      </td>
                                                      </tr>
                                                    </table>
                      <input type="submit" name="Submit" value="Guardar" />
                       &nbsp; 
                      <input type="reset" name="Submit2" value="Reestablecer" />                      </form>
                </div>
                </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>


</td></tr></table>