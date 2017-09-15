<?
session_start();
if ( session_is_registered( "valid_user" ) && session_is_registered( "valid_modulos" ) && session_is_registered( "valid_permisos" ))
{}
else {
header("Location: index.php?errorcode=3");
}
?>

<script type="text/javascript" src="subcombo.js"></script>

<script> 

function CheckAll()

{

count = document.frm.elements.length;

    for (i=0; i < count; i++) 

	{

    if(document.frm.elements[i].checked == 1)

    	{document.frm.elements[i].checked = 1; }

    else {document.frm.elements[i].checked = 1;}

	}

}

function UncheckAll(){

count = document.frm.elements.length;

    for (i=0; i < count; i++) 

	{

    if(document.frm.elements[i].checked == 1)

    	{document.frm.elements[i].checked = 0; }

    else {document.frm.elements[i].checked = 0;}

	}

}

</script>

<script type='text/javascript' src='formexp.js'></script>

<script>

function expandir_formulario(){

 if (document.frm.idem.checked){

	xDisplay('capaexpansion', 'none')

 }else{

	xDisplay('capaexpansion', 'block')

 }

}

</script>
<script Language="JavaScript">
function validar(formulario) {
  
  if (formulario.nombre.value.length < 4) {
    alert("Escriba un nombre");
    formulario.nombre.focus();
    return (false);
  }
  
    if (formulario.rfc.value.length < 4) {
    alert("Escriba un RFC");
    formulario.rfc.focus();
    return (false);
  }
  
      if (formulario.contacto.value.length < 4) {
    alert("Escriba un contacto");
    formulario.contacto.focus();
    return (false);
  }
  
      if (formulario.calle.value.length < 4) {
    alert("Escriba una calle");
    formulario.calle.focus();
    return (false);
  }
  
   if (formulario.numero.value.length < 1) {
    alert("Escriba un número");
    formulario.numero.focus();
    return (false);
  }
  
  if (formulario.ciudad.value.length < 4) {
    alert("Escriba una ciudad");
    formulario.ciudad.focus();
    return (false);
  }
  
      if (formulario.estado.value == 0) {
    alert("Seleccione un estado");
    formulario.estado.focus();
    return (false);
  }
  
        if (formulario.municipio.value == 0) {
    alert("Seleccione un municipio");
    formulario.municipio.focus();
    return (false);
  }
  
          if (formulario.colonia.value == 0) {
    alert("Seleccione una colonia");
    formulario.colonia.focus();
    return (false);
  }
  
     if (formulario.telefonocasa.value.length < 4) {
    alert("Escriba un teléfono");
    formulario.telefonocasa.focus();
    return (false);
  }
  
/*  
  if ((formulario.email.value.indexOf ('@', 0) == -1)||(formulario.email.value.length < 5)) { 
    alert("Escriba una dirección de correo válida"); 
	    formulario.email.focus();
    return (false); 
	
  }*/
  return (true); 
}
</script>
<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Clientes</span></td><td width=150 class="blacklinks"><?  $checa_array1=array_search("3_a",$explota_permisos);

if($checa_array1===FALSE){} else{echo'[ <a href="?module=admin_clientes&accela=new">Nuevo Cliente</a> ]'; } ?></td></tr></table></td></tr>



 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            



            <td width="400" 			class="questtitle"> 

			<? 

			if($accela=="new"){echo'Dar de alta Cliente';}

			else{echo'Editar Cliente';



			}

			?>



</td>







            <td>&nbsp;</td>



            <form name="form1" method="post" action="bridge.php?module=clientes"><td align="right" class="questtitle">Búsqueda: 



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



<? if($accela=="edit" && isset($idCliente)){

$db = mysql_connect($host,$username,$pass);

mysql_select_db($database,$db);

$result = mysql_query("SELECT * from Cliente where idCliente = '$idCliente'",$db);

$vendedor=mysql_result($result,0,"idEmpleado");

$nombre=mysql_result($result,0,"nombre");

$usuario=mysql_result($result,0,"usuario");

$contrasena=mysql_result($result,0,"contrasena");

$rfc=mysql_result($result,0,"rfc");

$contacto=mysql_result($result,0,"contacto");

$calle2=mysql_result($result,0,"fisCalle");

$numero2=mysql_result($result,0,"fisNumero");

$colonia2=mysql_result($result,0,"fisColonia");

$municipio2=mysql_result($result,0,"fisMunicipio");

$ciudad2=mysql_result($result,0,"fisCiudad");

$estado2=mysql_result($result,0,"fisEstado");

$calle=mysql_result($result,0,"Calle");

$numero=mysql_result($result,0,"Numero");

$colonia=mysql_result($result,0,"Colonia");

$municipio=mysql_result($result,0,"Municipio");

$ciudad=mysql_result($result,0,"Ciudad");

$estado=mysql_result($result,0,"Estado");

$telefonocasa=mysql_result($result,0,"telefonoCasa");

$telefonooficina=mysql_result($result,0,"telefonoOficina");

$telefonocelular=mysql_result($result,0,"telefonoCelular");

$fax=mysql_result($result,0,"fax");

$extension=mysql_result($result,0,"extension");

$nextel=mysql_result($result,0,"nextel");

$telnextel=mysql_result($result,0,"TelNextel");

$email=mysql_result($result,0,"email");

$tipocliente=mysql_result($result,0,"tipocliente");

}



echo'<form name="frm" method="post" action="process.php?module=clientes&accela='.$accela.'&idCliente='.$idCliente.'" onSubmit="return validar(this)">';    





?>

<table width="100%%" border="0">

  <tr>

    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Vendedor:</strong></td>

        <td bgcolor="#cccccc">

            <?
			if($valid_tipo=="vendedor"){echo'<input name="vendedor" type="hidden" value="'.$valid_userid.'" />'.$valid_nombre.'';}
			else{
$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT * FROM Empleado where tipo='vendedor' order by nombre", $link); 
if (mysql_num_rows($result)){ 
echo'<select name="vendedor" id="vendedor">';
  while ($row = @mysql_fetch_array($result)) { 
  echo'<option value="'.$row["idEmpleado"].'"';
     if($vendedor==$row["idEmpleado"]){echo"selected";}
	 echo'>'.$row["nombre"].'</option>';
  }
  echo'        </select>';}
  else{echo 'No hay ningun usuario vendedor';}
}
			  ?></td>
      </tr>
      <tr>
        <td align="right" bgcolor="#cccccc"><strong>Tipo de Cliente:</strong> </td>

        <td bgcolor="#cccccc"><?

$link = mysql_connect($host, $username, $pass); 

mysql_select_db($database, $link); 

$result = mysql_query("SELECT * FROM TipoCliente", $link); 

if (mysql_num_rows($result)){ 

echo'<select name="tipocliente" id="tipocliente">';

  while ($row = @mysql_fetch_array($result)) { 

  echo'<option value="'.$row["idTipoCliente"].'"';

     if($tipocliente==$row["idTipoCliente"]){echo"selected";}

	 echo'>'.$row["nombre"].'</option>';

  }

  echo'        </select>';}



?>  

    </td>

      </tr>

     

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Nombre:</strong></td>

        <td width="200" bgcolor="#cccccc"><input name="nombre" type="text" id="nombre" size="50" value="<? echo"$nombre";?>"  onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>

      </tr>

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>RFC:</strong></td>

        <td bgcolor="#cccccc"><input name="rfc" type="text" id="rfc" size="50" value="<? echo"$rfc";?>"  onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"></td>

      </tr>

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Contacto:</strong></td>

        <td bgcolor="#cccccc"><input name="contacto" type="text" id="contacto" size="50" value="<? echo"$contacto";?>"  onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>

      </tr>

      <tr>

        <td align="right" valign="top" bgcolor="#cccccc"><strong>Calle:</strong></td>

        <td width="200" bgcolor="#cccccc"><input name="calle" type="text" id="calle" size="18" value="<? echo"$calle";?>"  onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/> 

         &nbsp; <strong>N&uacute;m.

         <input name="numero" type="text" id="numero" size="2" value="<? echo"$numero";?>"  onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/>

         </strong></td>

      </tr>

      <tr>

        <td align="right" valign="top" bgcolor="#cccccc"><strong>Ciudad:</strong></td>

        <td bgcolor="#cccccc"><input name="ciudad" type="text" id="ciudad" size="50" value="<? echo"$ciudad";?>"  onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>

      </tr>

      <tr>

        <td align="right" valign="top" bgcolor="#cccccc"><strong>Estado:</strong></td>

        <td width="200" bgcolor="#cccccc"><select name="estado" id="estado" onChange='cargaContenido(this.id)'>

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

        <td align="right" valign="top" bgcolor="#cccccc"><strong>Municipio:</strong></td>

        <td width="200" bgcolor="#cccccc"><?

						  if($accela=="edit"){

						 echo'  <select name="municipio" id="municipio" onChange=\'cargaContenido(this.id)\'>';

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

						  else{echo'<select disabled="disabled" name="municipio" id="municipio" onChange=\'cargaContenido(this.id)\'>

						<option value="0">Seleccione un Estado</option>

					</select>';}

						  ?>        </td>

      </tr>

      <tr>

        <td align="right" valign="top" bgcolor="#cccccc"><strong>Colonia:</strong></td>

        <td bgcolor="#cccccc"><?

						  if($accela=="edit"){

						 echo'  <select name="colonia" id="colonia">';

$link = mysql_connect($host, $username, $pass); 

mysql_select_db($database, $link); 

$result = mysql_query("SELECT * FROM Colonia where idMunicipio='$municipio'order by NombreColonia", $link); 

if (mysql_num_rows($result)){ 

  while ($row = @mysql_fetch_array($result)) { 

  echo'<option value="'.$row["idColonia"].'"';

     if($colonia==$row["idColonia"]){echo"selected";}

	 echo'>'.$row["NombreColonia"].'</option>';

  }}



					  

echo'</select>';

						  }

						  else{echo'<select disabled="disabled" name="colonia" id="colonia">

						<option value="0">Seleccione un Municipio</option>

					</select>';}

						  ?></td>

      </tr>

      <tr>

        <td align="right" valign="top" bgcolor="#cccccc"><strong>Tel&eacute;fono de Casa:</strong></td>

        <td bgcolor="#cccccc"><input name="telefonocasa" type="text" id="telefonocasa" size="50" value="<? echo"$telefonocasa";?>" onKeyPress="return numbersonly(this, event)"/></td>

      </tr>

       <tr>

        <td align="right" valign="top" bgcolor="#cccccc"><strong>Tel&eacute;fono de oficina:</strong> </td>

        <td bgcolor="#cccccc"><input name="telefonooficina" type="text" id="telefonooficina" size="18" value="<? echo"$telefonooficina";?>" onKeyPress="return numbersonly(this, event)"/> &nbsp; 

          <strong>Ext.

          <input name="extension" type="text" id="extension" size="3" value="<? echo"$extension";?>" onKeyPress="return numbersonly(this, event)"/>

          </strong></td>

      </tr>

        <tr>

          <td align="right" valign="top" bgcolor="#cccccc"><strong>Tel&eacute;fono Celular:</strong></td>

          <td bgcolor="#cccccc"><input name="telefonocelular" type="text" id="telefonocelular" size="50" value="<? echo"$telefonocelular";?>" onKeyPress="return numbersonly(this, event)"/></td>

        </tr>

        

      

    </table>

      </td>

    <td width="50%" valign="top"><center>

      <table width="100%" border="0" cellspacing="3" cellpadding="3">

<tr>

          <td align="right" valign="top" bgcolor="#cccccc"><strong>Fax:</strong></td>

          <td bgcolor="#cccccc"><input name="fax" type="text" id="fax" size="50" value="<? echo"$fax";?>" onKeyPress="return numbersonly(this, event)"/></td>

        </tr>

      

        <tr>

          <td align="right" valign="top" bgcolor="#cccccc"><strong>Radio Tel&eacute;fono:</strong></td>

          <td bgcolor="#cccccc"><input name="nextel" type="text" id="nextel" size="50" value="<? echo"$nextel";?>" onKeyPress="return numbersonly(this, event)"/></td>

        </tr>

        <tr>

          <td align="right" valign="top" bgcolor="#cccccc"><strong>Tel&eacute;fono Nextel:</strong> </td>

          <td bgcolor="#cccccc"><input name="telnextel" type="text" id="telnextel" size="50" value="<? echo"$telnextel";?>" onKeyPress="return numbersonly(this, event)"/></td>

        </tr>

        <tr>

          <td align="right" valign="top" bgcolor="#cccccc"><strong>Email:</strong></td>

          <td bgcolor="#cccccc"><input name="email" type="text" id="email" size="50" value="<? echo"$email";?>" /></td>

        </tr>

         <tr>

        <td align="right" bgcolor="#cccccc"><strong>Clave del usuario:</strong></td>

        <td bgcolor="#cccccc"><input name="usuario" type="text" id="usuario" size="50" value="<? echo"$usuario";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>

      </tr>

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Contrase&ntilde;a:</strong></td>

        <td bgcolor="#cccccc"><input name="contrasena" type="password" id="contrasena" size="50" value="<? echo"$contrasena";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"></td>

      </tr>

       

        <tr>

          <td colspan="2" align="center" valign="top" bgcolor="#9A9A9A"><strong>Domicilio Fiscal</strong></td>

        </tr>

        <? 

		if($accela=="new"){echo'<tr>

          <td colspan="2" align="center" valign="top" bgcolor="#9A9A9A"><strong> Igual a domicilio personal:

              <input name="idem" type="checkbox" id="idem" value="si" onclick="expandir_formulario()"/>

          </strong></td>

          </tr>';}

		?> 

		</table>

		<div id=capaexpansion style="display:block">

		 <table width="100%" border="0" cellspacing="3" cellpadding="3">

        <tr>

          <td align="right" valign="top" bgcolor="#9A9A9A"><strong>Calle:</strong></td>

          <td width="200" bgcolor="#9A9A9A"><input name="calle2" type="text" id="calle2" size="18" value="<? echo"$calle2";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/> &nbsp; 

            <strong>N&uacute;m.

            <input name="numero2" type="text" id="numero2" size="2" value="<? echo"$numero2";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/>

            </strong></td>

        </tr>

        <tr>

          <td align="right" valign="top" bgcolor="#9A9A9A"><strong>Ciudad:</strong></td>

          <td bgcolor="#9A9A9A"><input name="ciudad2" type="text" id="ciudad2" size="50" value="<? echo"$ciudad2";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>

        </tr>

        <tr>

          <td align="right" valign="top" bgcolor="#9A9A9A"><strong>Estado:</strong></td>

          <td width="200" bgcolor="#9A9A9A"><select name="estado2" id="estado2" onchange='cargaContenido(this.id)'>

              <option value='0'>Seleccione un Estado</option>

              <?

$link = mysql_connect($host, $username, $pass); 

mysql_select_db($database, $link); 

$result = mysql_query("SELECT * FROM Estado order by NombreEstado", $link); 

if (mysql_num_rows($result)){ 

  while ($row = @mysql_fetch_array($result)) { 

  echo'<option value="'.$row["idEstado"].'"';

     if($estado2==$row["idEstado"]){echo"selected";}

	 echo'>'.$row["NombreEstado"].'</option>';

  }}



			  ?>

          </select></td>

        </tr>

        <tr>

          <td align="right" valign="top" bgcolor="#9A9A9A"><strong>Municipio:</strong></td>

          <td width="200" bgcolor="#9A9A9A"><?

						  if($accela=="edit"){

						 echo'  <select name="municipio2" id="municipio2" onChange=\'cargaContenido(this.id)\'>';

$link = mysql_connect($host, $username, $pass); 

mysql_select_db($database, $link); 

$result = mysql_query("SELECT * FROM Municipio where idEstado='$estado2'order by NombreMunicipio", $link); 

if (mysql_num_rows($result)){ 

  while ($row = @mysql_fetch_array($result)) { 

  echo'<option value="'.$row["idMunicipio"].'"';

     if($municipio2==$row["idMunicipio"]){echo"selected";}

	 echo'>'.$row["NombreMunicipio"].'</option>';

  }}



					  

echo'</select>';

						  }

						  else{echo'<select disabled="disabled" name="municipio2" id="municipio2" onChange=\'cargaContenido(this.id)\'>

						<option value="0">Seleccione un Estado</option>

					</select>';}

						  ?>          </td>

        </tr>

        <tr>

          <td align="right" valign="top" bgcolor="#9A9A9A"><strong>Colonia:</strong></td>

          <td bgcolor="#9A9A9A"><?

						  if($accela=="edit"){

						 echo'  <select name="colonia2" id="colonia2">';

$link = mysql_connect($host, $username, $pass); 

mysql_select_db($database, $link); 

$result = mysql_query("SELECT * FROM Colonia where idMunicipio='$municipio2'order by NombreColonia", $link); 

if (mysql_num_rows($result)){ 

  while ($row = @mysql_fetch_array($result)) { 

  echo'<option value="'.$row["idColonia"].'"';

     if($colonia2==$row["idColonia"]){echo"selected";}

	 echo'>'.$row["NombreColonia"].'</option>';

  }}



					  

echo'</select>';

						  }

						  else{echo'<select disabled="disabled" name="colonia2" id="colonia2">

						<option value="0">Seleccione un Municipio</option>

					</select>';}

						  ?></td>

        </tr>

      </table></div>

            </center></td>

  </tr>

</table>

<input type="submit" name="Submit" value="Guardar"> &nbsp; 

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