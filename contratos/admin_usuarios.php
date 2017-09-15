<script type="text/javascript" src="subcombo.js"></script>

<style type="text/css">

<!--

.style1 {font-size: 9px}
.stylex2 {font-size: 9px; font-weight: bold; }

-->

</style>

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
<script Language="JavaScript">
function validar(formulario) {

  if (formulario.usuario.value.length < 4) {
    alert("Escriba un nombre de usuario");
    formulario.usuario.focus();
    return (false);
  }


  if (formulario.contrasena.value.length < 4) {
    alert("Escriba una contraseña");
    formulario.contrasena.focus();
    return (false);
  }
  
  
  if (formulario.nombre.value.length < 4) {
    alert("Escriba un nombre");
    formulario.nombre.focus();
    return (false);
  }
  
    if (formulario.cargo.value.length < 4) {
    alert("Escriba un cargo");
    formulario.cargo.focus();
    return (false);
  }
  
    if (formulario.direccion.value.length < 4) {
    alert("Escriba una dirección");
    formulario.direccion.focus();
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
  }
  */
  return (true); 
}
</script>

<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Usuarios</span></td><td width=150 class="blacklinks"><?  $checa_array1=array_search("1_a",$explota_permisos);

if($checa_array1===FALSE){} else{echo'[ <a href="?module=admin_usuarios&accela=new">Nuevo Usuario</a> ]';} ?></td></tr></table></td></tr>



 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            



            <td width="400" 			class="questtitle"> 

			<? 

			if($accela=="new"){echo'Dar de alta Usuario';}

			else{echo'Editar Usuario';



			}

			?>



</td>







            <td>&nbsp;</td>



            <form name="form1" method="post" action="bridge.php?module=usuarios"><td align="right" class="questtitle">Búsqueda: 



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



<? if($accela=="edit" && isset($idEmpleado)){

$db = mysql_connect($host,$username,$pass);

mysql_select_db($database,$db);

$result = mysql_query("SELECT * from Empleado where idEmpleado = '$idEmpleado'",$db);

$usuario=mysql_result($result,0,"usuario");

$contrasena=mysql_result($result,0,"contrasena");

$nombre=mysql_result($result,0,"nombre");

$cargo=mysql_result($result,0,"cargo");

$departamento=mysql_result($result,0,"idDepartamento");

$direccion=mysql_result($result,0,"direccion");

$estado=mysql_result($result,0,"estado");

$municipio=mysql_result($result,0,"municipio");

$colonia=mysql_result($result,0,"colonia");

$extension=mysql_result($result,0,"extension");

$telefonocasa=mysql_result($result,0,"telefonoCasa");

$telefonocelular=mysql_result($result,0,"telefonoCelular");

$nextel=mysql_result($result,0,"nextel");

$idnextel=mysql_result($result,0,"idnextel");

$email=mysql_result($result,0,"email");

$tipo=mysql_result($result,0,"tipo");

$modules=mysql_result($result,0,"modules");

$modules_exploited=explode(",",$modules);

$permisos=mysql_result($result,0,"permisos");

$permisos_exploited=explode(",",$permisos);

$activo=mysql_result($result,0,"activo");

}



echo'<form name="frm" method="post" action="process.php?module=usuarios&accela='.$accela.'&idEmpleado='.$idEmpleado.'" onSubmit="return validar(this)">';    





?>

<table width="100%%" border="0">

  <tr>

    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Usuario:</strong></td>

        <td bgcolor="#cccccc"><input name="usuario" type="text" id="usuario" size="50" value="<? echo"$usuario";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"></td>

      </tr>

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Contrase&ntilde;a:</strong></td>

        <td bgcolor="#cccccc"><input name="contrasena" type="password" id="contrasena" size="50" value="<? echo"$contrasena";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"></td>

      </tr>

      <tr>

        <td width="100" align="right" bgcolor="#cccccc"><strong>Nombre:</strong></td>

        <td width="200" bgcolor="#cccccc"><input name="nombre" type="text" id="nombre" size="50" value="<? echo"$nombre";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>

      </tr>

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Cargo:</strong></td>

        <td bgcolor="#cccccc"><input name="cargo" type="text" id="cargo" size="50" value="<? echo"$cargo";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"></td>

      </tr>

      <tr>

        <td align="right" bgcolor="#cccccc"><strong>Departamento:</strong></td>

        <td bgcolor="#cccccc"><select name="departamento" id="departamento">

            <?

$link = mysql_connect($host, $username, $pass); 

mysql_select_db($database, $link); 

$result = mysql_query("SELECT * FROM Departamento order by nombre", $link); 

if (mysql_num_rows($result)){ 

  while ($row = @mysql_fetch_array($result)) { 

  echo'<option value="'.$row["idDepartamento"].'"';

     if($departamento==$row["idDepartamento"]){echo"selected";}

	 echo'>'.$row["nombre"].'</option>';

  }}



			  ?>

        </select></td>

      </tr>

      <tr>

        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Direcci&oacute;n:</strong></td>

        <td width="200" bgcolor="#cccccc"><input name="direccion" type="text" id="direccion" size="50" value="<? echo"$direccion";?>" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"/></td>

      </tr>

      <tr>

        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Estado:</strong></td>

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

        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Municipio:</strong></td>

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

        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Extension (CTC):</strong></td>

        <td width="200" bgcolor="#cccccc"><input name="extension" type="text" id="email" size="50" value="<? echo"$extension";?>"/></td>

      </tr>

      <tr>

        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Tel&eacute;fono de Casa:</strong></td>

        <td width="200" bgcolor="#cccccc"><input name="telefonocasa" type="text" id="telefonocasa" size="50" value="<? echo"$telefonocasa";?>" onKeyPress="return numbersonly(this, event)"/></td>

      </tr>

      <tr>

        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Tel&eacute;fono Celular:</strong></td>

        <td width="200" bgcolor="#cccccc"><input name="telefonocelular" type="text" id="telefonocelular" size="50" value="<? echo"$telefonocelular";?>" onKeyPress="return numbersonly(this, event)"/></td>

      </tr>

      <tr>

        <td align="right" valign="top" bgcolor="#cccccc"><strong>Radio Teléfono:</strong> </td>

        <td bgcolor="#cccccc"><input name="idnextel" type="text" id="idnextel" size="50" value="<? echo"$idnextel";?>" onKeyPress="return numbersonly(this, event)"/></td>

      </tr>

      <tr>

        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Tel&eacute;fono Nextel:</strong></td>

        <td width="200" bgcolor="#cccccc"><input name="nextel" type="text" id="nextel" size="50" value="<? echo"$nextel";?>" onKeyPress="return numbersonly(this, event)"/></td>

      </tr>

      <tr>

        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Email:</strong></td>

        <td width="200" bgcolor="#cccccc"><input name="email" type="text" id="email" size="50" value="<? echo"$email";?>"/></td>

      </tr>



      <tr>

        <td align="right" valign="top" bgcolor="#cccccc"><strong>Usuario Activo:</strong> </td>

        <td bgcolor="#cccccc"><select name="activo" id="activo">

          <option value="1" <? if($activo=="1"){echo' selected';} ?>>Si</option>

          <option value="0" <? if($activo=="0"){echo' selected';} ?>>No</option>

        </select>        </td>

      </tr>

      <tr>

        <td align="right" valign="top" bgcolor="#cccccc"><strong>Tipo de usuario:</strong> </td>

        <td bgcolor="#cccccc"><select name="tipo" id="tipo">

            <option value="administrador"  <? if($tipo=="administrador"){echo' selected';} ?>>Administrador</option>

            <option value="vendedor" <? if($tipo=="vendedor"){echo' selected';} ?>>Vendedor</option>

            <option value="cabina" <? if($tipo=="cabina"){echo' selected';} ?>>Cabina</option>

          </select>        </td>

      </tr>

    </table>

      </td>

    <td width="50%" valign="top"><table width="100%%" border="0" cellspacing="2" cellpadding="2">

      <tr>

        <td colspan="8" align="center" bgcolor="#cccccc"><strong>Permisos del usuario</strong> </td>
        </tr>

      <tr>

        <td width="220" align="center" bgcolor="#bbbbbb" class="stylex2">M&oacute;dulo</td>

        <td align="center" bgcolor="#bbbbbb" class="stylex2">Agregar</td>

        <td align="center" bgcolor="#bbbbbb" class="stylex2">Eliminar</td>

        <td align="center" bgcolor="#bbbbbb" class="stylex2">Editar</td>

        <td align="center" bgcolor="#bbbbbb" class="stylex2">Detalles</td>

        <td align="center" bgcolor="#bbbbbb" class="stylex2">Validar</td>
        <td align="center" bgcolor="#bbbbbb" class="stylex2">Imprimir</td>
        <td align="center" bgcolor="#bbbbbb" class="stylex2">Exportar</td>
      </tr>

      <tr>



        <td bgcolor="#bbbbbb"><span class="style1">

          <input type="checkbox" name="modules_auth[]" value="usuarios" <? $checa_array1=array_search("usuarios",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>>

          Usuarios</span></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="1_a" <? $checa_array1=array_search("1_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="1_b" <? $checa_array1=array_search("1_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="1_c" <? $checa_array1=array_search("1_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="1_d" <? $checa_array1=array_search("1_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>

      <tr>

        <td bgcolor="#bbbbbb"><span class="style1">

          <input type="checkbox" name="modules_auth[]" value="clientes" <? $checa_array1=array_search("clientes",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>>

          Clientes</span></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="3_a" <? $checa_array1=array_search("3_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="3_b" <? $checa_array1=array_search("3_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="3_c" <? $checa_array1=array_search("3_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="3_d" <? $checa_array1=array_search("3_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="3_v" <? $checa_array1=array_search("3_v",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>



      <tr>

        <td bgcolor="#bbbbbb"><span class="style1">

          <input type="checkbox" name="modules_auth[]" value="contratos" <? $checa_array1=array_search("contratos",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>>

          Contratos</span></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="4_a" <? $checa_array1=array_search("4_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="4_b" <? $checa_array1=array_search("4_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="4_c" <? $checa_array1=array_search("4_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="4_d" <? $checa_array1=array_search("4_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="4_v" <? $checa_array1=array_search("4_v",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="4_i" <? $checa_array1=array_search("4_i",$permisos_exploited);
if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>

      <tr>

        <td bgcolor="#bbbbbb"><span class="style1">

        <!--  <input type="checkbox" name="modules_auth[]" value="vehiculos" <? $checa_array1=array_search("vehiculos",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>>-->  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Usuarios contrato </span></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="5_a" <? $checa_array1=array_search("5_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="5_b" <? $checa_array1=array_search("5_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="5_c" <? $checa_array1=array_search("5_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="5_d" <? $checa_array1=array_search("5_d",$permisos_exploited);
if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>

       <!--   <tr>

        <td bgcolor="#bbbbbb"><span class="style1">

          <input type="checkbox" name="modules_auth[]" value="beneficiarios" <? $checa_array1=array_search("beneficiarios",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>>

          Beneficiarios</span></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="6_a" <? $checa_array1=array_search("6_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="6_b" <? $checa_array1=array_search("6_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="6_c" <? $checa_array1=array_search("6_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="6_d" <? $checa_array1=array_search("6_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>

      </tr> -->

      <tr>

        <td bgcolor="#bbbbbb"><span class="style1">

          <input type="checkbox" name="modules_auth[]" value="ventas" <? $checa_array1=array_search("ventas",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>>

          Ventas</span></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="14_a" <? $checa_array1=array_search("14_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="14_b" <? $checa_array1=array_search("14_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="14_c" <? $checa_array1=array_search("14_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="14_d" <? $checa_array1=array_search("14_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>></td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>

      <tr>

        <td bgcolor="#bbbbbb"><span class="style1">

          <input type="checkbox" name="modules_auth[]" value="pagos" <? $checa_array1=array_search("pagos",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> />

          Pagos</span></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="16_a" <? $checa_array1=array_search("16_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="16_b" <? $checa_array1=array_search("16_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="16_c" <? $checa_array1=array_search("16_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="16_d" <? $checa_array1=array_search("16_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>

      <tr>

        <td bgcolor="#bbbbbb"><span class="style1">

          <input type="checkbox" name="modules_auth[]" value="cabina" <? $checa_array1=array_search("cabina",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>>

          Cabina</span></td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#bbbbbb"><span class="style1">

          <input type="checkbox" name="modules_auth[]" value="seguimiento" <? $checa_array1=array_search("seguimiento",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?>>

          Seguimiento</span></td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>
      

      <tr>

        <td bgcolor="#bbbbbb"><span class="style1">

<input type="checkbox" name="modules_auth[]" value="servicios" <? $checa_array1=array_search("servicios",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> />          

Servicios</span></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="2_a" <? $checa_array1=array_search("2_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="2_b" <? $checa_array1=array_search("2_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="2_c" <? $checa_array1=array_search("2_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="2_d" <? $checa_array1=array_search("2_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>

      <tr>

        <td bgcolor="#bbbbbb"><span class="style1">

          <input type="checkbox" name="modules_auth[]" value="estado" <? $checa_array1=array_search("estado",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> />

          Estado</span></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="7_a" <? $checa_array1=array_search("7_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="7_b" <? $checa_array1=array_search("7_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="7_c" <? $checa_array1=array_search("7_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="7_d" <? $checa_array1=array_search("7_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>

      <tr>

        <td bgcolor="#bbbbbb"><span class="style1">

          <input type="checkbox" name="modules_auth[]" value="municipio" <? $checa_array1=array_search("municipio",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> />

          Municipio</span></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="8_a" <? $checa_array1=array_search("8_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="8_b" <? $checa_array1=array_search("8_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="8_c" <? $checa_array1=array_search("8_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="8_d" <? $checa_array1=array_search("8_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>

      <tr>

        <td bgcolor="#bbbbbb"><span class="style1">

          <input type="checkbox" name="modules_auth[]" value="colonia" <? $checa_array1=array_search("colonia",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> />

          Colonia</span></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="9_a" <? $checa_array1=array_search("9_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="9_b" <? $checa_array1=array_search("9_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="9_c" <? $checa_array1=array_search("9_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="9_d" <? $checa_array1=array_search("9_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>

      

      <tr>

        <td bgcolor="#bbbbbb"><span class="style1">

          <input type="checkbox" name="modules_auth[]" value="tipo_cliente" <? $checa_array1=array_search("tipo_cliente",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> />

          Tipo Cliente </span></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="10_a" <? $checa_array1=array_search("10_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="10_b" <? $checa_array1=array_search("10_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="10_c" <? $checa_array1=array_search("10_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="10_d" <? $checa_array1=array_search("10_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>

      <tr>

        <td bgcolor="#bbbbbb"><span class="style1">

          <input type="checkbox" name="modules_auth[]" value="tipo_pago" <? $checa_array1=array_search("tipo_pago",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> />

          Tipo Pago </span></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="11_a" <? $checa_array1=array_search("11_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="11_b" <? $checa_array1=array_search("11_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="11_c" <? $checa_array1=array_search("11_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="11_d" <? $checa_array1=array_search("11_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>

      <tr>

        <td bgcolor="#bbbbbb"><span class="style1">

          <input type="checkbox" name="modules_auth[]" value="tipo_proveedor" <? $checa_array1=array_search("tipo_proveedor",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> />

          Tipo Proveedor </span></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="12_a" <? $checa_array1=array_search("12_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="12_b" <? $checa_array1=array_search("12_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="12_c" <? $checa_array1=array_search("12_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="12_d" <? $checa_array1=array_search("12_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>

      <tr>

        <td bgcolor="#bbbbbb"><span class="style1">

          <input type="checkbox" name="modules_auth[]" value="tipo_venta" <? $checa_array1=array_search("tipo_venta",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> />

          Tipo Venta </span></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="13_a" <? $checa_array1=array_search("13_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="13_b" <? $checa_array1=array_search("13_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="13_c" <? $checa_array1=array_search("13_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="13_d" <? $checa_array1=array_search("13_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>

      <tr>

        <td bgcolor="#bbbbbb"><span class="style1">

          <input type="checkbox" name="modules_auth[]" value="proveedores" <? $checa_array1=array_search("proveedores",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> />

          Proveedores</span></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="15_a" <? $checa_array1=array_search("15_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="15_b" <? $checa_array1=array_search("15_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="15_c" <? $checa_array1=array_search("15_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="15_d" <? $checa_array1=array_search("15_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>

      <tr>
        <td bgcolor="#bbbbbb"><span class="style1">
          <input type="checkbox" name="modules_auth[]" value="evaluaciones" <? $checa_array1=array_search("evaluaciones",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> />
Evaluaciones</span></td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="19_a" <? $checa_array1=array_search("19_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="19_b" <? $checa_array1=array_search("19_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="19_c" <? $checa_array1=array_search("19_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="19_d" <? $checa_array1=array_search("19_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#bbbbbb"><span class="style1">
          <input type="checkbox" name="modules_auth[]" value="pago_proveedores" <? $checa_array1=array_search("pago_proveedores",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> />
          Pago a proveedores </span></td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="20_a" <? $checa_array1=array_search("20_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="20_b" <? $checa_array1=array_search("20_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="20_c" <? $checa_array1=array_search("20_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="20_d" <? $checa_array1=array_search("20_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#bbbbbb"><span class="style1">
          <input type="checkbox" name="modules_auth[]" value="comisiones_vendedores" <? $checa_array1=array_search("comisiones_vendedores",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> />
          Comisiones vendedores </span></td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="21_a" <? $checa_array1=array_search("21_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="21_b" <? $checa_array1=array_search("21_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="21_c" <? $checa_array1=array_search("21_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="21_d" <? $checa_array1=array_search("21_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#bbbbbb"><span class="style1">
          <input type="checkbox" name="modules_auth[]" value="facturacion" <? $checa_array1=array_search("facturacion",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> />
          Facturación </span></td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="22_a" <? $checa_array1=array_search("22_a",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="22_b" <? $checa_array1=array_search("22_b",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="22_c" <? $checa_array1=array_search("22_c",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="22_d" <? $checa_array1=array_search("22_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>
	        <tr>

        <td bgcolor="#bbbbbb"><span class="style1">

          <input type="checkbox" name="modules_auth[]" value="seguimiento_caso" <? $checa_array1=array_search("seguimiento_caso",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> />

          Seguimiento Legal</span></td>

        <td align="center" valign="middle" bgcolor="#cccccc"></td>
        <td align="center" valign="middle" bgcolor="#cccccc"></td>
        <td align="center" valign="middle" bgcolor="#cccccc"></td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="23_d" <? $checa_array1=array_search("23_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>

        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#bbbbbb"><span class="style1">
          <input type="checkbox" name="modules_auth[]" value="exportacion" <? $checa_array1=array_search("exportacion",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> />
Exportaci&oacute;n </span></td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>
	  
	  <tr>
        <td bgcolor="#bbbbbb"><span class="style1">
          <input type="checkbox" name="modules_auth[]" value="vencimientos" <? $checa_array1=array_search("vencimientos",$modules_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> />
Vencimientos </span></td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc"><input name="permi[]" type="checkbox" id="permi[]" value="25_d" <? $checa_array1=array_search("25_d",$permisos_exploited);

if($checa_array1===FALSE){} else{echo ' checked';} ?> /></td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
        <td align="center" valign="middle" bgcolor="#cccccc">&nbsp;</td>
      </tr>

      

    </table>

    <center><input name="btn" type="button" onClick="CheckAll()" value="Seleccionar todos"> <input name="btn" type="button" onClick="UncheckAll()" value="Seleccionar ninguno"></center></td>

  </tr>

</table>

<input type="submit" name="Submit" value="Guardar"/> &nbsp; 

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