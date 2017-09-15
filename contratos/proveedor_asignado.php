<?
include 'conf.php';
if(isset($clave) && isset ($id_proveedor) && isset ($idcaso)){
mysql_connect($host,$username,$pass);
$sSQL="UPDATE general SET asignacion_proveedor=now(), contacto='0000-00-00 00:00:00', arribo='0000-00-00 00:00:00', proveedor='$id_proveedor' where contrato='$clave' AND id='$idcaso'";
mysql_db_query($database, "$sSQL");

mysql_connect($host,$username,$pass);
$sSQL="UPDATE seguimiento_juridico SET proveedor='$id_proveedor' where general='$idcaso'";
mysql_db_query($database, "$sSQL");


################################
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Provedor where id = '$id_proveedor'",$db);
$nombre=mysql_result($result,0,"nombre");
$usuario=mysql_result($result,0,"usuario");
$contrasena=mysql_result($result,0,"contrasena");
$calle=mysql_result($result,0,"calle");
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
$mail=mysql_result($result,0,"mail");
$contacto2=mysql_result($result,0,"contacto2");
$tel2=mysql_result($result,0,"tel2");
$fax2=mysql_result($result,0,"fax2");
$cel2=mysql_result($result,0,"cel2");
$nextel2=mysql_result($result,0,"nextel2");
$mail2=mysql_result($result,0,"mail2");
$observaciones=mysql_result($result,0,"observaciones");
################################


}   
?>



 <html><head>

<link href="style_1.css" rel="stylesheet" type="text/css" />
 </head><body>
<table width="100%%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td bgcolor="#CCCCCC"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><strong>Proveedor asignado</strong> </td>
        <td width="200"><b><a href="asigna_proveedor.php?idcaso=<? echo $idcaso; ?>"><font color="#000000">Asignar caso a otro proveedor</font></a></b></td>
      </tr>
    </table>      </td>
  </tr>
  <tr>
    <td><table width="100%%" border="0" cellspacing="3" cellpadding="3">
        <tr>
          <td width="20%"><strong>Proveedor:</strong></td>
          <td width="80%"><? echo $nombre;?></td>
        </tr>
        <tr>
          <td bgcolor="#dddddd"><strong>Especialidad:</strong></td>
          <td bgcolor="#dddddd"><? echo $especialidad;?></td>
        </tr>
        <tr>
          <td><strong>Contacto:</strong></td>
          <td><? echo $contacto;?></td>
        </tr>
        <tr>
          <td bgcolor="#dddddd"><strong>Teléfono:</strong></td>
          <td bgcolor="#dddddd"><? echo $tel;?></td>
        </tr>
		        <tr>
          <td><strong>Fax:</strong></td>
          <td><? echo $fax;?></td>
        </tr>
		        <tr>
          <td bgcolor="#dddddd"><strong>Celular:</strong></td>
          <td bgcolor="#dddddd"><? echo $cel;?></td>
        </tr>
		        <tr>
          <td><strong>Nextel:</strong></td>
          <td><? echo $nextel;?></td>
        </tr>
                <tr>
          <td><strong>Contacto2:</strong></td>
          <td><? echo $contacto2;?></td>
        </tr>
		        <tr>
          <td bgcolor="#dddddd"><strong>Teléfono:</strong></td>
          <td bgcolor="#dddddd"><? echo $tel2;?></td>
        </tr>
		        <tr>
          <td><strong>Fax:</strong></td>
          <td><? echo $fax2;?></td>
        </tr>
		        <tr>
          <td bgcolor="#dddddd"><strong>Celular:</strong></td>
          <td bgcolor="#dddddd"><? echo $cel2;?></td>
        </tr>
		        <tr>
          <td><strong>Nextel:</strong></td> <td><? echo $nextel2;?></td></tr>

      </table>
    </td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
</table>


 
 </body></html>

