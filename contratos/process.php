<? include('conf.php'); 
#----------------
if($module=="usuarios"){ 
if(count($modules_auth)!="0" && $modules_auth!=" " && $modules_auth!=""){$modulos_enlatados=implode(",",$modules_auth);}
else{$modulos_enlatados="";}
if(count($permi)!="0" && $permi!=" " && $permi!=""){$permisos_enlatados=implode(",",$permi);}
else{$permisos_enlatados="";}

if($accela=="new" OR $accela=="edit"){

$usuario=htmlspecialchars($usuario);

$usuario=stripslashes($usuario);

$usuario=strtr($usuario,"'","´");

}



if(isset($accela) && $accela=="new"){



##startcomprobacion

mysql_connect("$host","$username","$pass");

$result=mysql_db_query("$database","select * from Empleado where usuario = '$usuario'");

$cuantosson=mysql_num_rows($result);

mysql_free_result($result);

if ($cuantosson>0) {

header("Location: mainframe.php?module=$module&code=4");

die();

}

##endcomprobacion



mysql_connect($host,$username,$pass);

mysql_db_query($database,"INSERT INTO `Empleado` ( `usuario`, `contrasena`, `nombre`, `cargo`, `idDepartamento`, `direccion`, `estado`, `municipio`, `colonia`, `extension`, `telefonoCasa`, `telefonoCelular`, `nextel`, `idnextel`, `email`, `tipo`, `modules`, `permisos`, `activo`) 

VALUES ('$usuario', '$contrasena', '$nombre', '$cargo', '$departamento', '$direccion', '$estado', '$municipio', '$colonia', '$extension', '$telefonocasa', '$telefonocelular', '$nextel', '$idnextel', '$email', '$tipo', '$modulos_enlatados', '$permisos_enlatados', '$activo')"); 

header("Location: mainframe.php?module=$module&code=1");

}

#=====



if(isset($accela) && $accela=="edit"){



##startcomprobacion

mysql_connect("$host","$username","$pass");

$result=mysql_db_query("$database","select * from Empleado where usuario = '$usuario' AND idEmpleado!='$idEmpleado'");

$cuantosson=mysql_num_rows($result);

mysql_free_result($result);

if ($cuantosson>0) {

header("Location: mainframe.php?module=$module&code=4");

die();

}

##endcomprobacion



mysql_connect($host,$username,$pass);

$sSQL="UPDATE Empleado SET usuario='$usuario', contrasena='$contrasena', nombre='$nombre', cargo='$cargo', idDepartamento='$departamento', direccion='$direccion', estado='$estado', municipio='$municipio', colonia='$colonia', extension='$extension', telefonoCasa='$telefonocasa', telefonoCelular='$telefonocelular', nextel='$nextel', idnextel='$idnextel', email='$email', tipo='$tipo', modules='$modulos_enlatados', permisos='$permisos_enlatados', activo='$activo' where idEmpleado='$idEmpleado'";

mysql_db_query($database, "$sSQL");

header("Location: mainframe.php?module=$module&code=2");

}



#=====

if(isset($accela) && $accela=="delete"){

mysql_connect($host,$username,$pass);

$sSQL="Delete From Empleado Where idEmpleado ='$idEmpleado'";

mysql_db_query("$database",$sSQL);

header("Location: mainframe.php?module=$module&code=3");

}

}

################################################################################





if($module=="clientes"){ 



if($accela=="new" OR $accela=="edit"){

$usuario=htmlspecialchars($usuario);

$usuario=stripslashes($usuario);

$usuario=strtr($usuario,"'","´");

}



if(isset($accela) && $accela=="new"){

/*

##startcomprobacion

mysql_connect("$host","$username","$pass");

$result=mysql_db_query("$database","select * from Cliente where usuario = '$usuario'");

$cuantosson=mysql_num_rows($result);

mysql_free_result($result);

if ($cuantosson>0) {

header("Location: mainframe.php?module=$module&code=4");

die();

}

##endcomprobacion
*/

if($idem=="si"){

$calle2=$calle;

$numero2=$numero;

$colonia2=$colonia;

$ciudad2=$ciudad;

$municipio2=$municipio;

$estado2=$estado;

}



mysql_connect($host,$username,$pass);

mysql_db_query($database,"INSERT INTO `Cliente` ( `idEmpleado`, `usuario`, `contrasena`, `nombre`, `rfc`, `contacto`, `fisCalle`, `fisNumero`, `fisColonia`, `fisCiudad`, `fisMunicipio`, `fisEstado`, `calle`, `numero`, `colonia`, `ciudad`, `municipio`, `estado`, `telefonoCasa`, `telefonoOficina`, `fax`, `extension`, `telefonoCelular`, `nextel`, `TelNextel`, `email`, `status`, `tipocliente`) 

VALUES ('$vendedor', '$usuario', '$contrasena', '$nombre', '$rfc', '$contacto', '$calle2', '$numero2', '$colonia2', '$ciudad2', '$municipio2', '$estado2', '$calle', '$numero', '$colonia', '$ciudad', '$municipio', '$estado', '$telefonocasa', '$telefonooficina', '$fax', '$extension', '$telefonocelular', '$nextel', '$telnextel', '$email', 'no validado', '$tipocliente')");



$idCliente=mysql_insert_id();  



header("Location: mainframe.php?module=clientes_alta&idCliente=$idCliente&code=1");



}

#=====



if(isset($accela) && $accela=="edit"){


/*
##startcomprobacion

mysql_connect("$host","$username","$pass");

$result=mysql_db_query("$database","select * from Cliente where usuario = '$usuario' AND idCliente!='$idCliente'");

$cuantosson=mysql_num_rows($result);

mysql_free_result($result);

if ($cuantosson>0) {

header("Location: mainframe.php?module=$module&code=4");

die();

}

##endcomprobacion

*/

mysql_connect($host,$username,$pass);

$sSQL="UPDATE Cliente SET idEmpleado='$vendedor', usuario='$usuario', contrasena='$contrasena', nombre='$nombre', rfc='$rfc', contacto='$contacto', fisCalle='$calle2', fisNumero='$numero2', fisColonia='$colonia2', fisCiudad='$ciudad2', fisMunicipio='$municipio2', fisEstado='$estado2', calle='$calle', numero='$numero', colonia='$colonia', ciudad='$ciudad', municipio='$municipio', estado='$estado', telefonoCasa='$telefonocasa', telefonoOficina='$telefonooficina', fax='$fax', extension='$extension', telefonoCelular='$telefonocelular', nextel='$nextel', TelNextel='$telnextel', email='$email', tipocliente='$tipocliente' where idCliente='$idCliente'";

mysql_db_query($database, "$sSQL");

header("Location: mainframe.php?module=$module&code=2");

}



#=====

if(isset($accela) && $accela=="delete"){

mysql_connect($host,$username,$pass);

$sSQL="Delete From Cliente Where idCliente ='$idCliente'";

mysql_db_query("$database",$sSQL);

header("Location: mainframe.php?module=$module&code=3");

}





if($accela=="update"){

mysql_connect($host,$username,$pass);

$sSQL="UPDATE Cliente SET status='validado' where idCliente='$idCliente'";

mysql_db_query($database, "$sSQL");

header("Location: mainframe.php?module=$module&code=2");

}

}









################################################################################
if($module=="usuarios_contrato"){ 


if($accela=="new" or $accela=="edit"){
$fecha1expre=explode(" ",$fecha_inicio);
$fecha1ex=explode("-",$fecha1expre[0]);
$fecha2expre=explode(" ",$fecha_vencimiento);
$fecha2ex=explode("-",$fecha2expre[0]);

$ingreso=($monto-$comision);
}


if(isset($accela) && $accela=="new"){
/*
if(isset($idPoliza) && $idPoliza!="" && $idPoliza!="0"){$tmpid="";
$condicion="where idPoliza = '$idPoliza'";
}
else{$condicion="where tmpid='$tmpid'";}
*/

if($tipocliente=="1"){
##startcomprobacion
mysql_connect("$host","$username","$pass");
$result=mysql_db_query("$database","select * from usuarios_contrato where contrato='$numcontrato'");
$cuantosson=mysql_num_rows($result);
mysql_free_result($result);
if ($cuantosson>0) {
#header("Location: mainframe.php?module=$module&code=4");
header("Location: usuarios_contrato.php?idPoliza=$idPoliza&tmpid=$tmpid&numcontrato=$numcontrato&code=5&tipocliente=$tipocliente&idCliente=$idCliente");
die();
}
##endcomprobacion
}


##startcomprobacion_subnumero
// mysql_connect("$host","$username","$pass");
// $result=mysql_db_query("$database","select * from usuarios_contrato where contrato='$numcontrato'");
// $numusers=mysql_num_rows($result);
// mysql_free_result($result);
// $inciso=$numusers+1;

//
// Reparacion consecutivo incisos
//
mysql_connect("$host","$username","$pass");
$numero=mysql_db_query("$database","SELECT inciso as maximoInciso FROM usuarios_contrato WHERE contrato='$numcontrato' ORDER BY inciso DESC LIMIT 1");
if(mysql_num_rows($numero))
{
	$incisoAnterior=mysql_result($numero,0,"maximoInciso");
	$inciso = $incisoAnterior + 1;
}
else
	$inciso = 1;
##endcomprobacion_subnumero

$clave="".$numcontrato."_".$inciso."";
$password="".$fecha_d."".$fecha_m."".$fecha_a."";

mysql_connect($host,$username,$pass);
mysql_db_query($database,"INSERT INTO `usuarios_contrato` ( `contrato`, `inciso`, `idPoliza`, `tipo_venta`, `fecha_inicio`, `fecha_vencimiento`, `marca`, `modelo`, `tipo`, `color`, `placas`, `serie`, `servicio`, `nombre`, `fecha_nacimiento`, `domicilio`, `colonia`, `ciudad`, `municipio`, `estado`, `tel`, `cel`, `nextel`, `mail`, `clave`, `password`, `status`, `monto`, `comision`, `ingreso`) 
VALUES ('$numcontrato', '$inciso', '$idPoliza', '$tipoventa', '$fecha1ex[2]-$fecha1ex[1]-$fecha1ex[0] $fecha1expre[1]', '$fecha2ex[2]-$fecha2ex[1]-$fecha2ex[0] $fecha2expre[1]', '$marca', '$modelo', '$tipo', '$color', '$placas', '$serie', '$servicio', '$nombre', '$fecha_a-$fecha_m-$fecha_d',  '$domicilio', '$colonia', '$ciudad', '$municipio', '$estado', '$tel', '$cel', '$nextel', '$mail', '$clave', '$password', 'no validado', '$monto', '$comision', '$ingreso')");
header("Location: usuarios_contrato.php?idPoliza=$idPoliza&tmpid=$tmpid&numcontrato=$numcontrato&code=1&tipocliente=$tipocliente&idCliente=$idCliente");
}
#=====
if(isset($accela) && $accela=="edit"){
if(isset($idPoliza) && $idPoliza!="" && $idPoliza!="0"){$tmpid="";}
mysql_connect($host,$username,$pass);
$sSQL="UPDATE usuarios_contrato SET idPoliza='$idPoliza', tipo_venta='$tipoventa', fecha_inicio='$fecha1ex[2]-$fecha1ex[1]-$fecha1ex[0] $fecha1expre[1]', fecha_vencimiento='$fecha2ex[2]-$fecha2ex[1]-$fecha2ex[0] $fecha2expre[1]', marca='$marca', modelo='$modelo', tipo='$tipo', color='$color', placas='$placas', serie='$serie', servicio='$servicio', nombre='$nombre', fecha_nacimiento='$fecha_a-$fecha_m-$fecha_d', domicilio='$domicilio', colonia='$colonia', ciudad='$ciudad', municipio='$municipio', estado='$estado', tel='$tel', cel='$cel', nextel='$nextel', mail='$mail', monto='$monto', comision='$comision', ingreso='$ingreso' where id='$id'";
mysql_db_query($database, "$sSQL");
header("Location: usuarios_contrato.php?idPoliza=$idPoliza&tmpid=$tmpid&numcontrato=$numcontrato&code=2&tipocliente=$tipocliente&idCliente=$idCliente");
}

#=====
if(isset($accela) && $accela=="delete"){
mysql_connect($host,$username,$pass);
$sSQL="Delete From usuarios_contrato Where id ='$id'";
mysql_db_query("$database",$sSQL);
header("Location: usuarios_contrato.php?idPoliza=$idPoliza&tmpid=$tmpid&numcontrato=$numcontrato&code=3&tipocliente=$tipocliente&idCliente=$idCliente");
}



#=====
if(isset($accela) && $accela=="cancel"){
if(isset($idPoliza) && $idPoliza!="" && $idPoliza!="0"){$tmpid="";}
mysql_connect($host,$username,$pass);
$sSQL="UPDATE usuarios_contrato SET status='cancelado posterior' where id='$id'";
mysql_db_query($database, "$sSQL");
header("Location: usuarios_contrato.php?idPoliza=$idPoliza&tmpid=$tmpid&numcontrato=$numcontrato&code=2&tipocliente=$tipocliente&idCliente=$idCliente");
}

#=====

}
################################################################################

if($module=="beneficiarios"){ 
if(isset($accela) && $accela=="new"){
if(isset($idPoliza) && $idPoliza!="" && $idPoliza!="0"){$tmpid="";
$condicion="where idPoliza = '$idPoliza'";
}
else{$condicion="where tmpid='$tmpid'";}

mysql_connect($host,$username,$pass);
mysql_db_query($database,"INSERT INTO `Beneficiario` ( `idPoliza`, `nombre`, `edad`, `parentesco`, `tmpid`) 
VALUES ('$idPoliza', '$nombre', '$edad', '$parentesco', '$tmpid')");
header("Location: beneficiarios.php?idPoliza=$idPoliza&tmpid=$tmpid&code=1&tipocliente=$tipocliente");
}
#=====
if(isset($accela) && $accela=="edit"){
if(isset($idPoliza) && $idPoliza!="" && $idPoliza!="0"){$tmpid="";}
mysql_connect($host,$username,$pass);
$sSQL="UPDATE Beneficiario SET idPoliza='$idPoliza', nombre='$nombre', edad='$edad', parentesco='$parentesco', tmpid='$tmpid' where id='$id'";
mysql_db_query($database, "$sSQL");
header("Location: beneficiarios.php?idPoliza=$idPoliza&tmpid=$tmpid&code=2&tipocliente=$tipocliente");
}

#=====
if(isset($accela) && $accela=="delete"){
mysql_connect($host,$username,$pass);
$sSQL="Delete From Beneficiario Where id ='$id'";
mysql_db_query("$database",$sSQL);
header("Location: beneficiarios.php?idPoliza=$idPoliza&tmpid=$tmpid&code=3&tipocliente=$tipocliente");
}
}
################################################################################




if($module=="contratos"){ 


if($accela=="cancela"){

mysql_connect($host,$username,$pass);

$sSQL="UPDATE Poliza SET status='cancelado' where idPoliza='$idPoliza'";
mysql_db_query($database, "$sSQL");

/*
mysql_connect($host,$username,$pass);
$sSQL="UPDATE usuarios_contrato SET idPoliza='$idPoliza', productos='$producto' where contrato='$numcontrato'";
mysql_db_query($database, "$sSQL");
*/

header("Location: mainframe.php?module=$module&code=2");
}

if($accela=="new" or $accela=="edit"){
if($factura=="1"){} else{$factura="0";}
$ingreso=($monto-$comision);
}

if(isset($accela) && $accela=="new"){
mysql_connect($host,$username,$pass);
mysql_db_query($database,"INSERT INTO `Poliza` ( `idCliente`, `idEmpleado`, `fechaCaptura`, `numPoliza`, `tipoCliente`, `tipoVenta`, `factura`, `monto`, `comision`, `ingreso`, `productos`, `status`, `usuario`, `password`) 
VALUES ('$cliente', '$vendedor', now(), '$numcontrato', '$tipocliente', '$tipoventa', '$factura', '$monto', '$comision', '$ingreso', '$producto', 'no validado', '$numcontrato', '$rfc')");
$idPoliza=mysql_insert_id();  
mysql_connect($host,$username,$pass);
$sSQL="UPDATE usuarios_contrato SET idPoliza='$idPoliza', productos='$producto' where contrato='$numcontrato'";
mysql_db_query($database, "$sSQL");

$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$resultz = mysql_query("SELECT * from Empleado where idEmpleado = '$vendedor'",$db);
$consecutivo=mysql_result($resultz,0,"indexPoliza");
$consecutivo=($consecutivo+1);

mysql_connect($host,$username,$pass);
$sSQL="UPDATE Empleado SET indexPoliza='$consecutivo' where idEmpleado='$vendedor'";
mysql_db_query($database, "$sSQL");

header("Location: mainframe.php?module=contratos_alta&idPoliza=$idPoliza");
}

#=====



if(isset($accela) && $accela=="edit"){

/*
foreach($productos as $idpro){
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from productos where id = '$idpro'",$db);
$servicios=mysql_result($result,0,"servicios");
$serviciosx=explode(",",$servicios);
$numeventos=mysql_result($result,0,"numeventos");
$numeventosx=explode(",",$numeventos);
mysql_connect($host,$username,$pass);
mysql_db_query($database,"INSERT INTO `siniestros` ( `contrato`, `producto`, `servicios`, `eventos` ) 
VALUES ('$numcontrato', '$idpro', '$servicios', '$numeventos')");
}
*/


mysql_connect($host,$username,$pass);

$sSQL="UPDATE Poliza SET tipoCliente='$tipocliente', tipoVenta='$tipoventa', factura='$factura', monto='$monto', comision='$comision', ingreso='$ingreso', productos='$producto' where idPoliza='$idPoliza'";
mysql_db_query($database, "$sSQL");

mysql_connect($host,$username,$pass);
$sSQL="UPDATE usuarios_contrato SET idPoliza='$idPoliza', productos='$producto' where contrato='$numcontrato'";
mysql_db_query($database, "$sSQL");


header("Location: mainframe.php?module=$module&code=2");

}



#=====

if(isset($accela) && $accela=="delete"){


mysql_connect($host,$username,$pass);
$sSQL="Delete From Poliza Where idPoliza ='$idPoliza'";
mysql_db_query("$database",$sSQL);

mysql_connect($host,$username,$pass);
$sSQL="SELECT clave From usuarios_contrato Where idPoliza ='$idPoliza'";
$result=mysql_db_query("$database",$sSQL);
while($row=mysql_fetch_array($result))
{
	$query="DELETE FROM validaciones WHERE clave_usuario='$row[clave]'";
	mysql_db_query("$database",$query);
}

$sSQL="Delete From usuarios_contrato Where idPoliza ='$idPoliza'";
mysql_db_query("$database",$sSQL);

header("Location: mainframe.php?module=$module&code=3");
}



#########



if($accela=="update"){

mysql_connect($host,$username,$pass);

$sSQL="UPDATE Poliza SET status='validado' where idPoliza='$idPoliza'";

mysql_db_query($database, "$sSQL");

header("Location: mainframe.php?module=$module&code=2");

}



}

################################################################################
if($module=="servicios"){ 


if(($accela=="new" or $accela=="edit") && is_array($servicios)){$servicios_enlatados=implode(",",$servicios);}

if(isset($accela) && $accela=="new"){
mysql_connect($host,$username,$pass);
mysql_db_query($database,"INSERT INTO `servicios` ( `servicio`, `tipo`, `campos`) 
VALUES ('$servicio', '$tipo', '$servicios_enlatados')");
header("Location: mainframe.php?module=$module&code=1");
}
#=====

if(isset($accela) && $accela=="edit"){
mysql_connect($host,$username,$pass);
$sSQL="UPDATE servicios SET servicio='$servicio', tipo='$tipo', campos='$servicios_enlatados' where id='$id'";
mysql_db_query($database, "$sSQL");
header("Location: mainframe.php?module=$module&code=2");
}
#=====
if(isset($accela) && $accela=="delete"){
mysql_connect($host,$username,$pass);
$sSQL="Delete From servicios Where id ='$id'";
mysql_db_query("$database",$sSQL);
header("Location: mainframe.php?module=$module&code=3");
}

}

################################################################################
if($module=="productos"){ 

if($accela=="new" or $accela=="edit"){
if(is_array($servicios)){$servicios_enlatados=implode(",",$servicios);}
if(is_array($numeventos)){$numeventos_enlatados=implode(",",$numeventos);}
}

if(isset($accela) && $accela=="new"){
mysql_connect($host,$username,$pass);
mysql_db_query($database,"INSERT INTO `productos` ( `producto`, `servicios`, `numeventos`, `terminos`) 
VALUES ('$producto', '$servicios_enlatados', '$numeventos_enlatados', '$terminos')");
header("Location: mainframe.php?module=$module&code=1");
}
#=====

if(isset($accela) && $accela=="edit"){
mysql_connect($host,$username,$pass);
$sSQL="UPDATE productos SET producto='$producto', servicios='$servicios_enlatados', numeventos='$numeventos_enlatados', terminos='$terminos' where id='$id'";
mysql_db_query($database, "$sSQL");
header("Location: mainframe.php?module=$module&code=2");
}
#=====
if(isset($accela) && $accela=="delete"){
mysql_connect($host,$username,$pass);
$sSQL="Delete From productos Where id ='$id'";
mysql_db_query("$database",$sSQL);
header("Location: mainframe.php?module=$module&code=3");
}

}

if($module=="cabina_d"){
if(isset($accela) && $accela=="new"){
mysql_connect($host,$username,$pass);
$sSQL="UPDATE general SET observaciones='$observaciones' where id='$idcaso'";
mysql_db_query($database, "$sSQL");
header("Location: mainframe.php?module=cabina&code=1");
}

if(isset($accela) && $accela=="cancelar"){
mysql_connect($host,$username,$pass);
$sSQL="UPDATE general SET status='cancelado al momento' where id='$idcaso'";
mysql_db_query($database, "$sSQL");
header("Location: mainframe.php?module=cabina&code=2");
}
}




################################################################################
if($module=="proveedores"){ 

if($accela=="new" or $accela=="edit"){
if(is_array($servicios)){$servicios_enlatados=implode(",",$servicios);}
session_start();
$cobertura=$_SESSION['coberturas'];
session_unregister("coberturas");
}

if(isset($accela) && $accela=="new"){
mysql_connect($host,$username,$pass);
mysql_db_query($database,"INSERT INTO `Provedor` ( `nombre`, `usuario`, `contrasena`, `calle`, `colonia`, `cp`, `estado`, `municipio`, `especialidad`, `trabajos`, `cobertura`, `horario`, `precios`, `sucursales`, `contacto`, `tel`, `fax`, `cel`, `nextel`, `nextelid`, `nextelid2`, `telcasa`, `telcasa2`, `mail`, `contacto2`, `tel2`, `fax2`, `cel2`, `nextel2`, `mail2`, `banco`, `numcuenta`, `clabe`, `observaciones`, `status`) 
VALUES ('$nombre', '$usuario', '$contrasena', '$calle', '$colonia', '$cp', '$estado', '$municipio', '$especialidad', '$servicios_enlatados', '$cobertura', '$horario', '$precios', '$sucursales', '$contacto', '$tel', '$fax', '$cel', '$nextel', '$nextelid', '$nextelid2', '$telcasa', '$telcasa2', '$mail', '$contacto2', '$tel2', '$fax2', '$cel2', '$nextel2', '$mail2', '$banco', '$numcuenta', '$clabe', '$observaciones', '$status')");
header("Location: mainframe.php?module=$module&code=1");
}
#=====

if(isset($accela) && $accela=="edit"){
mysql_connect($host,$username,$pass);
$sSQL="UPDATE Provedor SET nombre='$nombre', usuario='$usuario', contrasena='$contrasena', calle='$calle', colonia='$colonia', cp='$cp', estado='$estado', municipio='$municipio', especialidad='$especialidad', trabajos='$servicios_enlatados', cobertura='$cobertura', horario='$horario', precios='$precios', sucursales='$sucursales', contacto='$contacto', tel='$tel', fax='$fax', cel='$cel', nextel='$nextel', nextelid='$nextelid', nextelid2='$nextelid2', telcasa='$telcasa', telcasa2='$telcasa2', mail='$mail', contacto2='$contacto2', tel2='$tel2', fax2='$fax2', cel2='$cel2', nextel2='$nextel2', mail2='$mail2', banco='$banco', numcuenta='$numcuenta', clabe='$clabe', observaciones='$observaciones', status='$status' where id='$id'";
mysql_db_query($database, "$sSQL");
header("Location: mainframe.php?module=$module&code=2");
}
#=====
if(isset($accela) && $accela=="delete"){
mysql_connect($host,$username,$pass);
$sSQL="Delete From Provedor Where id ='$id'";
mysql_db_query("$database",$sSQL);
header("Location: mainframe.php?module=$module&code=3");
}

}

################################################################################
if($module=="evaluaciones"){ 

$promedio=($cortesia+$puntualidad+$presentacion+$atencion+$solucion)/5;

mysql_connect($host,$username,$pass);
mysql_db_query($database,"INSERT INTO `evaluaciones` ( `general`, `fecha`, `nombre`, `relacion`, `cortesia`, `puntualidad`, `presentacion`, `atencion`, `solucion`, `observaciones`, `encuestador`, `promedio`) 
VALUES ('$id', now(), '$nombre', '$relacion', '$cortesia', '$puntualidad', '$presentacion', '$atencion', '$solucion', '$observaciones', '$encuestador', '$promedio')");

mysql_connect($host,$username,$pass);
$sSQL="UPDATE general SET evaluado='evaluado' where id='$id'";
mysql_db_query($database, "$sSQL");


header("Location: mainframe.php?module=$module&code=1");
}


################################################################################
if($module=="facturacion"){ 

$iva=$monto*0.15;
$total=$iva+$monto;

if(isset($accela) && $accela=="new"){
mysql_connect($host,$username,$pass);
mysql_db_query($database,"INSERT INTO `facturas` ( `cliente`, `factura`, `fecha`, `orden`, `cantidad`, `descripcion`, `precio`, `subtotal`, `iva`, `total`, `status`) 
VALUES ('$idCliente', '$factura', now(), '$orden', '1', '$descripcion', '$monto', '$monto', '$iva', '$total', 'no pagada')");
header("Location: imprime_factura.php?idCliente=$idCliente&factura=$factura&orden=$orden&monto=$monto&descripcion=$descripcion");
}
#=====

if(isset($accela) && $accela=="edit"){
mysql_connect($host,$username,$pass);
$sSQL="UPDATE facturas SET factura='$factura', orden='$orden', descripcion='$descripcion', precio='$monto', subtotal='$monto', iva='$iva', total='$total', status='$status' where id='$id'";
mysql_db_query($database, "$sSQL");
header("Location: mainframe.php?module=$module&code=2");
}
#=====
if(isset($accela) && $accela=="delete"){
mysql_connect($host,$username,$pass);
$sSQL="Delete From facturas Where id ='$id'";
mysql_db_query("$database",$sSQL);
header("Location: mainframe.php?module=$module&code=3");
}

}


if($module=="validaciones"){ 
/*
if(isset($accela) && $accela=="validar"){
if(is_array($elegidos)){
foreach($elegidos as $choosed){
mysql_connect($host,$username,$pass);
$sSQL="UPDATE usuarios_contrato SET status='validado' where id='$choosed'";
mysql_db_query($database, "$sSQL");
}
}
header("Location: mainframe.php?module=$module&display=validados");
}
*/

if(isset($accela) && $accela=="new"){
mysql_connect($host,$username,$pass);
$sSQL="UPDATE usuarios_contrato SET status='validado' where id='$id'";
mysql_db_query($database, "$sSQL");

mysql_connect($host,$username,$pass);
mysql_db_query($database,"INSERT INTO `validaciones` ( `clave_usuario`, `tipo_pago`, `fecha_pago`, `cuenta_ingreso`, `observaciones`, `comision_vendedor`, `fecha_pago_comision`) 
VALUES ('$clave', '$tipo_pago', '$pago_ano-$pago_mes-$pago_dia', '$cuenta_ingreso', '$observaciones', '$comision', '$pago_comision_ano-$pago_comision_mes-$pago_comision_dia')");
header("Location: mainframe.php?module=$module&code=1");
}
if(isset($accela) && $accela=="edit"){
mysql_connect($host,$username,$pass);
$sSQL="UPDATE validaciones SET tipo_pago='$tipo_pago', fecha_pago='$pago_ano-$pago_mes-$pago_dia', cuenta_ingreso='$cuenta_ingreso', observaciones='$observaciones', comision_vendedor='$comision', fecha_pago_comision='$pago_comision_ano-$pago_comision_mes-$pago_comision_dia' where id='$idval'";
mysql_db_query($database, "$sSQL");
header("Location: mainframe.php?module=$module&code=2");
}

}



if($module=="pagos"){ 

$iva=$monto*0.15;
$total=$iva+$monto;

if(isset($accela) && $accela=="new"){
mysql_connect($host,$username,$pass);
mysql_db_query($database,"INSERT INTO `pagos` ( `proveedor`, `concepto`, `monto`,`status`,`expediente`,`fecha_corte`) 
VALUES ('$proveedor', '$conceptor', '$monto', '0','$expediente',NOW())");
header("Location: mainframe.php?module=$module&code=1");
}
#=====

if(isset($accela) && $accela=="edit"){
mysql_connect($host,$username,$pass);
$sSQL="UPDATE pagos SET concepto='$conceptor', monto='$monto', status='$status' where id='$id'";
mysql_db_query($database, "$sSQL");
header("Location: mainframe.php?module=$module&code=2");
}

if(isset($accela) && $accela=="pagar"){
mysql_connect($host,$username,$pass);
$sSQL="UPDATE pagos SET fecha_pago=NOW(), status='1' where id='$id'";
mysql_db_query($database, "$sSQL");
header("Location: mainframe.php?module=$module&code=2");
}

#=====
if(isset($accela) && $accela=="delete"){
mysql_connect($host,$username,$pass);
$sSQL="Delete From pagos Where id ='$id'";
mysql_db_query("$database",$sSQL);
header("Location: mainframe.php?module=$module&code=3");
}

}

if($module=="comisiones_vendedores"){
##startcomprobacion
mysql_connect("$host","$username","$pass");
$result=mysql_db_query("$database","select * from comisiones_contratos where contrato = '$contrato'");
$cuantosson=mysql_num_rows($result);
mysql_free_result($result);
if ($cuantosson>0) {
#actualizar registro
mysql_connect($host,$username,$pass);
$sSQL="UPDATE comisiones_contratos SET status='$status' where contrato='$contrato'";
mysql_db_query($database, "$sSQL");
}
else{
#crear registro
mysql_connect($host,$username,$pass);
mysql_db_query($database,"INSERT INTO `comisiones_contratos` (`contrato`, `status`) VALUES ('$contrato', '$status')"); 
}
##endcomprobacion
header("Location: mainframe.php?module=$module&code=2");
}
#_________________________________________________________________
if($module=="detail_seguimiento"){
mysql_connect($host,$username,$pass);
$motivo_servicio=strtoupper($motivo_servicio);
$ubicacion_requiere=strtoupper($ubicacion_requiere);
$observaciones=strtoupper($observaciones);
$sSQL="UPDATE general SET tecnico_solicitado='$tecnico_solicitado', motivo_servicio='$motivo_servicio', tipo_asistencia_vial='$tipo_asistencia_vial', tipo_asistencia_medica='$tipo_asistencia_medica', domicilio_cliente='$domicilio_cliente', domicilio_sustituto='$domicilio_sustituto', ubicacion_requiere='$ubicacion_requiere', ubicacion_estado='$estado', ubicacion_municipio='$municipio', ubicacion_colonia='$colonia', ubicacion_ciudad='$ciudad', destino_servicio='$destino_servicio', destino_estado='$estado2', destino_municipio='$municipio2', destino_colonia='$colonia2', destino_ciudad='$ciudad2', observaciones='$observaciones' where id='$id'";
mysql_db_query($database, "$sSQL");
header("Location: mainframe.php?module=$module&id=$id");
}

if($module=="usuariox"){
$num_cliente=strtoupper($num_cliente);
$num_siniestro=strtoupper($num_siniestro);
$usuario=strtoupper($usuario);
$reporte_cliente=strtoupper($reporte_cliente);
$tel_reporta=strtoupper($tel_reporta);
$ejecutivo=strtoupper($ejecutivo);
$cobertura=strtoupper($cobertura);
mysql_connect($host,$username,$pass);
$sSQL="UPDATE general SET num_cliente='$num_cliente', num_siniestro='$num_siniestro', usuario='$usuario', reporte_cliente='$reporte_cliente', tel_reporta='$tel_reporta', ejecutivo='$ejecutivo', cobertura='$cobertura' where id='$id'";
mysql_db_query($database, "$sSQL");
header("Location: mainframe.php?module=detail_seguimiento&id=$id");
}

?>