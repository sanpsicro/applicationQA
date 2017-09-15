<?

$checa_arrayx=array_search("clientes",$explota_modulos);

if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';

die();} else{}

?>



<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Clientes</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>



 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            



            <td width="400">&nbsp; 

 </td>



   



            <td>&nbsp;</td>



            <form name="form1" method="post" action="bridge.php?module=clientes"><td align="right" class="questtitle">Búsqueda: 



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

$result = mysql_query("SELECT * from Cliente where idCliente = '$idCliente'",$db);

$idempleado=mysql_result($result,0,"idEmpleado");

$usuario=mysql_result($result,0,"usuario");

$nombre=mysql_result($result,0,"nombre");

$rfc=mysql_result($result,0,"rfc");

$contacto=mysql_result($result,0,"contacto");

$calle2=mysql_result($result,0,"fisCalle");

$numero2=mysql_result($result,0,"fisNumero");

$colonia2=mysql_result($result,0,"fisColonia");

$ciudad2=mysql_result($result,0,"fisCiudad");

$municipio2=mysql_result($result,0,"fisMunicipio");

$estado2=mysql_result($result,0,"fisEstado");

$calle=mysql_result($result,0,"calle");

$numero=mysql_result($result,0,"numero");

$colonia=mysql_result($result,0,"colonia");

$ciudad=mysql_result($result,0,"ciudad");

$municipio=mysql_result($result,0,"municipio");

$estado=mysql_result($result,0,"estado");

$telefonocasa=mysql_result($result,0,"telefonoCasa");

$telefonooficina=mysql_result($result,0,"telefonoOficina");

$fax=mysql_result($result,0,"fax");

$extension=mysql_result($result,0,"extension");

$telefonocelular=mysql_result($result,0,"telefonoCelular");

$nextel=mysql_result($result,0,"nextel");

$telnextel=mysql_result($result,0,"TelNextel");

$email=mysql_result($result,0,"email");

$status=mysql_result($result,0,"status");

$tipocliente=mysql_result($result,0,"tipocliente");



###

$db2 = mysql_connect($host,$username,$pass);

mysql_select_db($database,$db2);

$result2 = mysql_query("SELECT * from Empleado where idEmpleado = '$idempleado'",$db2);

$vendedor=mysql_result($result2,0,"nombre");



###

$db3 = mysql_connect($host,$username,$pass);

mysql_select_db($database,$db3);

$result3 = mysql_query("SELECT * from Estado where idEstado = '$estado'",$db3);

$estado=mysql_result($result3,0,"nombreEstado");



$db3b = mysql_connect($host,$username,$pass);

mysql_select_db($database,$db3b);

$result3b = mysql_query("SELECT * from Estado where idEstado = '$estado2'",$db3b);

$estado2=mysql_result($result3b,0,"nombreEstado");





###

$db4 = mysql_connect($host,$username,$pass);

mysql_select_db($database,$db4);

$result4 = mysql_query("SELECT * from Municipio where idMunicipio = '$municipio'",$db4);

$municipio=mysql_result($result4,0,"nombreMunicipio");





$db4b = mysql_connect($host,$username,$pass);

mysql_select_db($database,$db4b);

$result4b = mysql_query("SELECT * from Municipio where idMunicipio = '$municipio2'",$db4b);

$municipio2=mysql_result($result4b,0,"nombreMunicipio");





###

$db5 = mysql_connect($host,$username,$pass);

mysql_select_db($database,$db5);

$result5 = mysql_query("SELECT * from Colonia where idColonia = '$colonia'",$db5);

$colonia=mysql_result($result5,0,"nombreColonia");



$db5b = mysql_connect($host,$username,$pass);

mysql_select_db($database,$db5b);

$result5b = mysql_query("SELECT * from Colonia where idColonia = '$colonia2'",$db5b);

$colonia2=mysql_result($result5b,0,"nombreColonia");



###

$db6 = mysql_connect($host,$username,$pass);

mysql_select_db($database,$db6);

$result6 = mysql_query("SELECT * from TipoCliente where idTipoCliente = '$tipocliente'",$db6);

$tipocliente=mysql_result($result6,0,"nombre");

?>

<table width="100%%" border="0" cellspacing="3" cellpadding="3">

  <tr>

    <td colspan="2" align="center" bgcolor="#bbbbbb"><b>Detalles del Cliente <? echo ''.$nombre.' ('.$tipocliente.')';?></b></td>

    </tr>

  <tr>

    <td width="50%" bgcolor="#CCCCCC"><strong>Nombre:</strong> <? echo $nombre?></td>

    <td bgcolor="#CCCCCC"><strong>Vendedor:</strong> <? echo $vendedor?></td>

    </tr>

  <tr>

    <td><strong>Clave del usuario:</strong> <? echo $usuario?></td>

    <td><strong>Status:</strong> <? echo $status?></td>

    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>RFC:</strong> <? echo $rfc?></td>

    <td bgcolor="#CCCCCC"><strong>Contacto:</strong> <? echo $contacto?></td>

    </tr>

  <tr>

    <td><strong>Dirección:</strong> <? echo "$calle $numero"; ?></td>

    <td><strong>Colonia:</strong> <? echo $colonia?></td>

    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Ciudad:</strong> <? echo $ciudad?></td>

    <td bgcolor="#CCCCCC"><strong>Municipio:</strong> <? echo $municipio?></td>

    </tr>

  <tr>

    <td><strong>Estado:</strong> <? echo $estado?></td>

    <td><strong>Email:</strong> <? echo '<a href="mailto:'.$email.'">'.$email.'</a>';?></td>

    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Tel&eacute;fono Casa:</strong> <? echo $telefonocasa?></td>

    <td bgcolor="#CCCCCC"><strong>Tel&eacute;fono Celular:</strong> <? echo $telefonocelular?></td>

  </tr>

  <tr>

    <td><strong>Tel&eacute;fono Oficina:</strong> <? echo $telefonooficina?> &nbsp; <strong>Extensi&oacute;n:</strong> <? echo $extension?></td>

    <td><strong>Fax:</strong> <? echo $fax?></td>

  </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>ID Nextel:</strong> <? echo $nextel?></td>

    <td bgcolor="#CCCCCC"><strong>Tel&eacute;fono Nextel:</strong> <? echo $telnextel?></td>

  </tr>

  <tr>

    <td><strong>Domicilio Fiscal:</strong> <? echo "$calle2 $numero2"; ?></td>

    <td><strong>Colonia:</strong> <? echo $colonia2?></td>

  </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Ciudad:</strong> <? echo $ciudad2?></td>

    <td bgcolor="#CCCCCC"><strong>Municipio:</strong> <? echo $municipio2?></td>

  </tr>

  <tr>

    <td><strong>Estado:</strong> <? echo $estado2?></td>

    <td>&nbsp;</td>

  </tr>

</table>





</td></tr></table>