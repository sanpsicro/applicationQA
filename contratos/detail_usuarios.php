<?
if ( session_is_registered( "valid_user" ) && session_is_registered( "valid_modulos" ) && session_is_registered( "valid_permisos" ))
{}
else {
header("Location: index.php?errorcode=3");
}
$checa_arrayx=array_search("usuarios",$explota_modulos);

if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';

die();} else{}

?>



<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Usuarios</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>



 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            



            <td width="400">&nbsp; 

 </td>



   



            <td>&nbsp;</td>



            <form name="form1" method="post" action="bridge.php?module=usuarios"><td align="right" class="questtitle">Búsqueda: 



              <input name="quest" type="text" id="quest2" size="15"> <input type="submit" name="Submit" value="Buscar">



            </td></form>



          </tr>



        </table>



      </td>



  </tr>







<tr><td>

<?

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



###

$db2 = mysql_connect($host,$username,$pass);

mysql_select_db($database,$db2);

$result2 = mysql_query("SELECT * from Departamento where idDepartamento = '$departamento'",$db2);

$departamento=mysql_result($result2,0,"nombre");





###

$db3 = mysql_connect($host,$username,$pass);

mysql_select_db($database,$db3);

$result3 = mysql_query("SELECT * from Estado where idEstado = '$estado'",$db3);

$estado=mysql_result($result3,0,"nombreEstado");





###

$db4 = mysql_connect($host,$username,$pass);

mysql_select_db($database,$db4);

$result4 = mysql_query("SELECT * from Municipio where idMunicipio = '$municipio'",$db4);

$municipio=mysql_result($result4,0,"nombreMunicipio");



###

$db5 = mysql_connect($host,$username,$pass);

mysql_select_db($database,$db5);

$result5 = mysql_query("SELECT * from Colonia where idColonia = '$colonia'",$db5);

$colonia=mysql_result($result5,0,"nombreColonia");

?>

<table width="100%%" border="0" cellspacing="3" cellpadding="3">

  <tr>

    <td colspan="2" align="center" bgcolor="#bbbbbb"><b>Detalles del usuario <? echo ''.$usuario.' ('.$tipo.')';?></b></td>

    </tr>

  <tr>

    <td width="50%" bgcolor="#CCCCCC"><strong>Nombre:</strong> <? echo $nombre?></td>

    <td bgcolor="#CCCCCC"><strong>Cargo:</strong> <? echo $cargo?></td>

    </tr>

  <tr>

    <td><strong>Departamento:</strong> <? echo $departamento?></td>

    <td><strong>Activo:</strong> <? if($activo=="1"){echo'Sí';} else{echo'No';}?></td>

    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Dirección:</strong> <? echo $direccion?></td>

    <td bgcolor="#CCCCCC"><strong>Estado:</strong> <? echo $estado?></td>

    </tr>

  <tr>

    <td><strong>Municipio:</strong> <? echo $municipio?></td>

    <td><strong>Colonia:</strong> <? echo $colonia?></td>

    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Teléfono Casa:</strong> <? echo $telefonocasa?></td>

    <td bgcolor="#CCCCCC"><strong>Teléfono Celular:</strong> <? echo $telefonocelular?></td>

    </tr>

  <tr>

    <td><strong>Nextel:</strong> <? echo $nextel?></td>

    <td><strong>ID Nextel:</strong> <? echo $idnextel?></td>

    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Email:</strong> <? echo '<a href="mailto:'.$email.'">'.$email.'</a>';?></td>

   <td><strong>Extensión:</strong> <? echo $extension?></td>

  </tr>

</table>





</td></tr></table>