<?
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Mon,26 Jul 1997 05:00:00 GMT");
header('Content-Type: text/html; charset=iso-8859-1');

include('conf.php');

if(is_array($seleccionados)){}
else{echo'<b><font size=4 face=arial color=#dddddd>Error: No ha seleccionado registros para exportar</font></b>'; die();}

if($export_as=="print"){echo'<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><title>OPCYON</title>
<script language="Javascript1.2">
 function printpage() {
window.print();  
}
</script>
<style type="text/css">
<!--
body, td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
</head>
<body bgcolor="#ffffff" text="#000000" onLoad="printpage()">';
}


if($modulo=="Empleado" && $export_as=="excel"){
#set_time_limit(10);

require_once "clases/class.writeexcel_workbook.inc.php";
require_once "clases/class.writeexcel_worksheet.inc.php";

$fname = tempnam("/tmp", "reporte.xls");
$workbook = &new writeexcel_workbook($fname);
$worksheet = &$workbook->addworksheet();

$header =& $workbook->addformat();
$header->set_bold();
$header->set_size(10);


$serebro = Array();
foreach($seleccionados as $idis){
$serebro[] = "Empleado.idEmpleado='$idis'";
}
$elegidos=implode(" or ",$serebro);

$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT Empleado.idEmpleado, Empleado.usuario, Empleado.nombre, Empleado.cargo, Empleado.direccion, Empleado.telefonoCasa, Empleado.telefonoCelular, Empleado.nextel, Empleado.idnextel, Empleado.email, Empleado.activo, Departamento.nombre as depa, Colonia.NombreColonia, Municipio.NombreMunicipio, Estado.NombreEstado from Empleado left join Departamento on (Empleado.idDepartamento = Departamento.idDepartamento) left join Colonia on (Empleado.colonia = Colonia.idColonia) left join Municipio on (Empleado.municipio = Municipio.idMunicipio) left join Estado on (Empleado.estado = Estado.idEstado) Where $elegidos order by $ordena $updown", $link); 
if (mysql_num_rows($result)){ 

$campos=explode(",",$columnas);
$cuenta_columnas=0;
$checa_array1=array_search("nombre",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Nombre", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; } 
$checa_array1=array_search("usuario",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Usuario", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 20); $cuenta_columnas++; }
$checa_array1=array_search("cargo",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Cargo", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("departamento",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Departamento", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 25); $cuenta_columnas++; }
$checa_array1=array_search("activo",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Activo", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 10); $cuenta_columnas++; }
$checa_array1=array_search("direccion",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Direcci&oacute;n", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 60); $cuenta_columnas++; }
$checa_array1=array_search("colonia",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Colonia", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 50); $cuenta_columnas++; }
$checa_array1=array_search("municipio",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Municipio", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("estado",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Estado", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 30); $cuenta_columnas++; }
$checa_array1=array_search("tel",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "tel&eacute;fono", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 20); $cuenta_columnas++; }
$checa_array1=array_search("cel",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Celular", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 20); $cuenta_columnas++; }
$checa_array1=array_search("nextel",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Nextel", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 20); $cuenta_columnas++; }
$checa_array1=array_search("idnextel",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "ID Nextel", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 20); $cuenta_columnas++; }
$checa_array1=array_search("mail",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Email", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }

$cuenta_columnas=0;
$cuenta_filas=1;

while ($row = @mysql_fetch_array($result)) {
if($row["activo"]=="1"){$row["activo"]="activo";}
else{$row["activo"]="inactivo";}

$checa_array1=array_search("nombre",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["nombre"]); $cuenta_columnas++;} 
$checa_array1=array_search("usuario",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["usuario"]); $cuenta_columnas++;}

$checa_array1=array_search("cargo",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["cargo"]); $cuenta_columnas++;}
$checa_array1=array_search("departamento",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["depa"]); $cuenta_columnas++;}
$checa_array1=array_search("activo",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["activo"]); $cuenta_columnas++;}
$checa_array1=array_search("direccion",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["direccion"]); $cuenta_columnas++;}
$checa_array1=array_search("colonia",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["NombreColonia"]); $cuenta_columnas++;}
$checa_array1=array_search("municipio",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["NombreMunicipio"]); $cuenta_columnas++;}
$checa_array1=array_search("estado",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["NombreEstado"]); $cuenta_columnas++;}
$checa_array1=array_search("tel",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["telefonoCasa"], $format1); $cuenta_columnas++;}
$checa_array1=array_search("cel",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["telefonoCelular"], $format1); $cuenta_columnas++;}
$checa_array1=array_search("nextel",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["nextel"], $format1); $cuenta_columnas++;}
$checa_array1=array_search("idnextel",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["idnextel"], $format1); $cuenta_columnas++;}
$checa_array1=array_search("mail",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["email"]); $cuenta_columnas++;}
$cuenta_columnas=0;  
$cuenta_filas++;
 }

}
$workbook->close();

header("Content-Type: application/x-msexcel; name=\"reporte.xls\"");
header("Content-Disposition: inline; filename=\"reporte.xls\"");
$fh=fopen($fname, "rb");
fpassthru($fh);
unlink($fname);

}
###########################################################################################$$$$$$$$$$$$$$$$$$$$$

if($modulo=="Empleado" && $export_as=="print"){

$serebro = Array();
foreach($seleccionados as $idis){
$serebro[] = "Empleado.idEmpleado='$idis'";
}
$elegidos=implode(" or ",$serebro);

$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT Empleado.idEmpleado, Empleado.usuario, Empleado.nombre, Empleado.cargo, Empleado.direccion, Empleado.telefonoCasa, Empleado.telefonoCelular, Empleado.nextel, Empleado.idnextel, Empleado.email, Empleado.activo, Departamento.nombre as depa, Colonia.NombreColonia, Municipio.NombreMunicipio, Estado.NombreEstado from Empleado left join Departamento on (Empleado.idDepartamento = Departamento.idDepartamento) left join Colonia on (Empleado.colonia = Colonia.idColonia) left join Municipio on (Empleado.municipio = Municipio.idMunicipio) left join Estado on (Empleado.estado = Estado.idEstado) Where $elegidos order by $ordena $updown", $link); 
if (mysql_num_rows($result)){ 

$campos=explode(",",$columnas);


echo'<table width="100%" border="0" cellspacing="3" cellpadding="3"><tr>';

$checa_array1=array_search("nombre",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Nombre</strong></td>';} 
$checa_array1=array_search("usuario",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Usuario</strong></td>';} 				$checa_array1=array_search("cargo",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Cargo</strong></td>';}
$checa_array1=array_search("departamento",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Departamento</strong></td>';}
$checa_array1=array_search("activo",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Activo</strong></td>';}
$checa_array1=array_search("direccion",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Direcci&oacute;n</strong></td>';}
$checa_array1=array_search("colonia",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Colonia</strong></td>';}
$checa_array1=array_search("municipio",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Municipio</strong></td>';}
$checa_array1=array_search("estado",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Estado</strong></td>';}
$checa_array1=array_search("tel",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Tel&eacute;fono</strong></td>';}
$checa_array1=array_search("cel",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Celular</strong></td>';}
$checa_array1=array_search("nextel",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Nextel</strong></td>';}
$checa_array1=array_search("idnextel",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>ID Nextel</strong></td>';}
$checa_array1=array_search("mail",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Email</strong></td>';}

echo'</tr>';

$bgcolor="#eeeeee";
while ($row = @mysql_fetch_array($result)) { 
if($bgcolor=="#eeeeee"){$bgcolor="#dedede";} else{$bgcolor="#eeeeee";}

if($row["activo"]=="1"){$row["activo"]="activo";}
else{$row["activo"]="inactivo";}

  echo'<tr>';
  
$checa_array1=array_search("nombre",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>';} 
$checa_array1=array_search("usuario",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["usuario"].'</td>';} 				$checa_array1=array_search("cargo",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["cargo"].'</td>';}
$checa_array1=array_search("departamento",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["depa"].'</td>';}
$checa_array1=array_search("activo",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["activo"].'</td>';}
$checa_array1=array_search("direccion",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["direccion"].'</td>';}
$checa_array1=array_search("colonia",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["NombreColonia"].'</td>';}
$checa_array1=array_search("municipio",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["NombreMunicipio"].'</td>';}
$checa_array1=array_search("estado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["NombreEstado"].'</td>';}
$checa_array1=array_search("tel",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telefonoCasa"].'</td>';}
$checa_array1=array_search("cel",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telefonoCelular"].'</td>';}
$checa_array1=array_search("nextel",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nextel"].'</td>';}
$checa_array1=array_search("idnextel",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["idnextel"].'</td>';}
$checa_array1=array_search("mail",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["email"].'</td>';}
  

echo'</tr>';
  }  

echo'</table>';
}
}
#////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($modulo=="Cliente" && $export_as=="excel"){
#set_time_limit(10);

require_once "clases/class.writeexcel_workbook.inc.php";
require_once "clases/class.writeexcel_worksheet.inc.php";

$fname = tempnam("/tmp", "reporte.xls");
$workbook = &new writeexcel_workbook($fname);
$worksheet = &$workbook->addworksheet();

$header =& $workbook->addformat();
$header->set_bold();
$header->set_size(10);


$serebro = Array();
foreach($seleccionados as $idis){
$serebro[] = "Cliente.idCliente='$idis'";
}
$elegidos=implode(" or ",$serebro);

$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT Cliente.idCliente, Cliente.usuario, Cliente.nombre, Cliente.rfc, Cliente.contacto, Cliente.fisCalle, Cliente.fisNumero, Cliente.fisCiudad,  Cliente.calle, Cliente.numero, Cliente.ciudad, Cliente.telefonoCasa, Cliente.telefonoOficina, Cliente.fax, Cliente.extension, Cliente.telefonoCelular, Cliente.nextel, Cliente.TelNextel, Cliente.email, Cliente.status, Cliente.tipocliente, Empleado.nombre as vendedor, Colonia.NombreColonia as colonia, Municipio.NombreMunicipio as municipio, Estado.NombreEstado as estado, TipoCliente.nombre as tipo, colfiscal.NombreColonia as fiscolonia, munifiscal.NombreMunicipio as fismunicipio, estadfiscal.NombreEstado as fisestado from Cliente left join Empleado on (Cliente.idEmpleado = Empleado.idEmpleado) left join Colonia on (Cliente.colonia = Colonia.idColonia) left join Municipio on (Cliente.municipio = Municipio.idMunicipio) left join Estado on (Cliente.estado = Estado.idEstado)  left join TipoCliente on (Cliente.tipocliente = TipoCliente.idTipoCliente) left join Colonia as colfiscal on (Cliente.fisColonia = colfiscal.idColonia)  left join Municipio as munifiscal on (Cliente.fisMunicipio = munifiscal.idMunicipio) left join Estado as estadfiscal on (Cliente.fisEstado = estadfiscal.idEstado) Where $elegidos order by $ordena $updown", $link); 
if (mysql_num_rows($result)){ 

$campos=explode(",",$columnas);
$cuenta_columnas=0;
#------------------------------------------------------------------------xxxxxxxxxxxxxxxxxxxxxxx

$checa_array1=array_search("nombre",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Nombre", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++;} 
$checa_array1=array_search("usuario",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Usuario", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 20); $cuenta_columnas++;}
$checa_array1=array_search("vendedor",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Vendedor", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++;}
$checa_array1=array_search("status",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Status", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 25); $cuenta_columnas++;}
$checa_array1=array_search("rfc",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "RFC", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 25); $cuenta_columnas++;}
$checa_array1=array_search("contacto",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Contacto", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++;}
$checa_array1=array_search("direccion",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Direccion", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 50); $cuenta_columnas++;}
$checa_array1=array_search("colonia",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Colonia", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 30); $cuenta_columnas++;}
$checa_array1=array_search("ciudad",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Ciudad", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 30); $cuenta_columnas++;}
$checa_array1=array_search("municipio",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Municipio", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++;}
$checa_array1=array_search("estado",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Estado", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 30); $cuenta_columnas++;}
$checa_array1=array_search("tel",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Telefono", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 30); $cuenta_columnas++;}
$checa_array1=array_search("cel",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Celular", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 30); $cuenta_columnas++;}
$checa_array1=array_search("oficina",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Telefono oficina", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 30); $cuenta_columnas++;}
$checa_array1=array_search("fax",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Fax", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 30); $cuenta_columnas++;}
$checa_array1=array_search("nextel",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Nextel", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 30); $cuenta_columnas++;}
$checa_array1=array_search("idnextel",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "ID Nextel", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 30); $cuenta_columnas++;}
$checa_array1=array_search("mail",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Email", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 30); $cuenta_columnas++;}
$checa_array1=array_search("domfiscal",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Domicilio fiscal", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++;}
$checa_array1=array_search("colfiscal",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Colonia fiscal", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++;}
$checa_array1=array_search("ciudadfiscal",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Ciudad fiscal", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 30); $cuenta_columnas++;}
$checa_array1=array_search("municipiofiscal",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Municipio fiscal", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++;}
$checa_array1=array_search("estadofiscal",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Estado fiscal", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 30); $cuenta_columnas++;}
$checa_array1=array_search("tipocliente",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Tipo de cliente", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 20); $cuenta_columnas++;}

#------------------------------------------------------------------------xxxxxxxxxxxxxxxxxxxxxxx
$cuenta_columnas=0;
$cuenta_filas=1;

while ($row = @mysql_fetch_array($result)) {



$checa_array1=array_search("nombre",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["nombre"]); $cuenta_columnas++;}$checa_array1=array_search("usuario",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["usuario"]); $cuenta_columnas++;}
$checa_array1=array_search("vendedor",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["vendedor"]); $cuenta_columnas++;}
$checa_array1=array_search("status",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["status"]); $cuenta_columnas++;}
$checa_array1=array_search("rfc",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["rfc"]); $cuenta_columnas++;}
$checa_array1=array_search("contacto",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["contacto"]); $cuenta_columnas++;}
$checa_array1=array_search("direccion",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, "".$row["calle"]." ".$row["numero"].""); $cuenta_columnas++;}
$checa_array1=array_search("colonia",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["colonia"]); $cuenta_columnas++;}
$checa_array1=array_search("ciudad",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["ciudad"]); $cuenta_columnas++;}
$checa_array1=array_search("municipio",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["municipio"]); $cuenta_columnas++;}
$checa_array1=array_search("estado",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["estado"]); $cuenta_columnas++;}
$checa_array1=array_search("tel",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["telefonoCasa"]); $cuenta_columnas++;}
$checa_array1=array_search("cel",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["telefonoCelular"]); $cuenta_columnas++;}
$checa_array1=array_search("oficina",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, "".$row["telefonoOficina"]." Ext. ".$row["extension"].""); $cuenta_columnas++;}
$checa_array1=array_search("fax",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["fax"]); $cuenta_columnas++;}
$checa_array1=array_search("nextel",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["nextel"]); $cuenta_columnas++;}
$checa_array1=array_search("idnextel",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["TelNextel"]); $cuenta_columnas++;}
$checa_array1=array_search("mail",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["email"]); $cuenta_columnas++;}
$checa_array1=array_search("domfiscal",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, "".$row["fisCalle"]." ".$row["fisNumero"].""); $cuenta_columnas++;}
$checa_array1=array_search("colfiscal",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["fiscolonia"]); $cuenta_columnas++;}
$checa_array1=array_search("ciudadfiscal",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["fisCiudad"]); $cuenta_columnas++;}
$checa_array1=array_search("municipiofiscal",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["fismunicipio"]); $cuenta_columnas++;}
$checa_array1=array_search("estadofiscal",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["fisestado"]); $cuenta_columnas++;}
$checa_array1=array_search("tipocliente",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["tipo"]); $cuenta_columnas++;}

$cuenta_columnas=0;  
$cuenta_filas++;
 }

}
$workbook->close();

header("Content-Type: application/x-msexcel; name=\"reporte.xls\"");
header("Content-Disposition: inline; filename=\"reporte.xls\"");
$fh=fopen($fname, "rb");
fpassthru($fh);
unlink($fname);

}
###########################################################################################$$$$$$$$$$$$$$$$$$$$$




if($modulo=="Cliente" && $export_as=="print"){

$serebro = Array();
foreach($seleccionados as $idis){
$serebro[] = "Cliente.idCliente='$idis'";
}
$elegidos=implode(" or ",$serebro);

$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT Cliente.idCliente, Cliente.usuario, Cliente.nombre, Cliente.rfc, Cliente.contacto, Cliente.fisCalle, Cliente.fisNumero, Cliente.fisCiudad,  Cliente.calle, Cliente.numero, Cliente.ciudad, Cliente.telefonoCasa, Cliente.telefonoOficina, Cliente.fax, Cliente.extension, Cliente.telefonoCelular, Cliente.nextel, Cliente.TelNextel, Cliente.email, Cliente.status, Cliente.tipocliente, Empleado.nombre as vendedor, Colonia.NombreColonia as colonia, Municipio.NombreMunicipio as municipio, Estado.NombreEstado as estado, TipoCliente.nombre as tipo, colfiscal.NombreColonia as fiscolonia, munifiscal.NombreMunicipio as fismunicipio, estadfiscal.NombreEstado as fisestado from Cliente left join Empleado on (Cliente.idEmpleado = Empleado.idEmpleado) left join Colonia on (Cliente.colonia = Colonia.idColonia) left join Municipio on (Cliente.municipio = Municipio.idMunicipio) left join Estado on (Cliente.estado = Estado.idEstado)  left join TipoCliente on (Cliente.tipocliente = TipoCliente.idTipoCliente) left join Colonia as colfiscal on (Cliente.fisColonia = colfiscal.idColonia)  left join Municipio as munifiscal on (Cliente.fisMunicipio = munifiscal.idMunicipio) left join Estado as estadfiscal on (Cliente.fisEstado = estadfiscal.idEstado) Where $elegidos order by $ordena $updown", $link); 
if (mysql_num_rows($result)){ 

$campos=explode(",",$columnas);


echo'<table width="100%" border="0" cellspacing="3" cellpadding="3"><tr>';



$checa_array1=array_search("nombre",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Nombre</strong></td>';} 
$checa_array1=array_search("usuario",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Usuario</strong></td>';} 				$checa_array1=array_search("vendedor",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Vendedor</strong></td>';}
$checa_array1=array_search("status",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Status</strong></td>';}
$checa_array1=array_search("rfc",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>RFC</strong></td>';}
$checa_array1=array_search("contacto",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Contacto</strong></td>';}
$checa_array1=array_search("direccion",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Direcci&oacute;n</strong></td>';}
$checa_array1=array_search("colonia",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Colonia</strong></td>';}
$checa_array1=array_search("ciudad",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Ciudad</strong></td>';}
$checa_array1=array_search("municipio",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Municipio</strong></td>';}
$checa_array1=array_search("estado",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Estado</strong></td>';}
$checa_array1=array_search("tel",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>tel&eacute;fono</strong></td>';}
$checa_array1=array_search("cel",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Celular</strong></td>';}
$checa_array1=array_search("oficina",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>tel&eacute;fono de oficina</strong></td>';}
$checa_array1=array_search("fax",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Fax</strong></td>';}
$checa_array1=array_search("nextel",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Nextel</strong></td>';}
$checa_array1=array_search("idnextel",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>ID Nextel</strong></td>';}
$checa_array1=array_search("mail",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Email</strong></td>';}
$checa_array1=array_search("domfiscal",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Domicilio Fiscal</strong></td>';}
$checa_array1=array_search("colfiscal",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Colonia Fiscal</strong></td>';}
$checa_array1=array_search("ciudadfiscal",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Ciudad Fiscal</strong></td>';}
$checa_array1=array_search("municipiofiscal",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Municipio Fiscal</strong></td>';}
$checa_array1=array_search("estadofiscal",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Estado Fiscal</strong></td>';}
$checa_array1=array_search("tipocliente",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Tipo de cliente</strong></td>';}


echo'</tr>';

$bgcolor="#eeeeee";
while ($row = @mysql_fetch_array($result)) { 
if($bgcolor=="#eeeeee"){$bgcolor="#dedede";} else{$bgcolor="#eeeeee";}


  echo'<tr>';
  

$checa_array1=array_search("nombre",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>';}$checa_array1=array_search("usuario",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["usuario"].'</td>';} 				
$checa_array1=array_search("vendedor",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["vendedor"].'</td>';}
$checa_array1=array_search("status",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["status"].'</td>';}
$checa_array1=array_search("rfc",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["rfc"].'</td>';}
$checa_array1=array_search("contacto",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["contacto"].'</td>';}
$checa_array1=array_search("direccion",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["calle"].' '.$row["numero"].'</td>';}
$checa_array1=array_search("colonia",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["colonia"].'</td>';}
$checa_array1=array_search("ciudad",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["ciudad"].'</td>';}
$checa_array1=array_search("municipio",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["municipio"].'</td>';}
$checa_array1=array_search("estado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["estado"].'</td>';}
$checa_array1=array_search("tel",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telefonoCasa"].'</td>';}
$checa_array1=array_search("cel",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telefonoCelular"].'</td>';}
$checa_array1=array_search("oficina",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["telefonoOficina"].''; if($row["extension"]!=""){echo' Ext. '.$row["extension"].'';} echo'</td>';}
$checa_array1=array_search("fax",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fax"].'</td>';}
$checa_array1=array_search("nextel",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nextel"].'</td>';}
$checa_array1=array_search("idnextel",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["TelNextel"].'</td>';}
$checa_array1=array_search("mail",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["email"].'</td>';}
$checa_array1=array_search("domfiscal",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fisCalle"].' '.$row["fisNumero"].'</td>';}
$checa_array1=array_search("colfiscal",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fiscolonia"].'</td>';}
$checa_array1=array_search("ciudadfiscal",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fisCiudad"].'</td>';}
$checa_array1=array_search("municipiofiscal",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fismunicipio"].'</td>';}
$checa_array1=array_search("estadofiscal",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["fisestado"].'</td>';}
$checa_array1=array_search("tipocliente",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["tipo"].'</td>';}

echo'</tr>';
  }  

echo'</table>';
}
}
#------------------------------------------------------------------------------------------------------------------------------------------------------------------
if($modulo=="general" && $export_as=="excel"){
#set_time_limit(10);

require_once "clases/class.writeexcel_workbook.inc.php";
require_once "clases/class.writeexcel_worksheet.inc.php";

$fname = tempnam("/tmp", "reporte.xls");
$workbook = &new writeexcel_workbook($fname);
$worksheet = &$workbook->addworksheet();

$header =& $workbook->addformat();
$header->set_bold();
$header->set_size(10);
# Create a format for the stock price
$f_price =& $workbook->addformat();
$f_price->set_align('right');
$f_price->set_num_format('$0.00');


$serebro = Array();
foreach($seleccionados as $idis){
$serebro[] = "general.id='$idis'";
}
$elegidos=implode(" or ",$serebro);

$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT general.id, general.contrato, general.fecha_recepcion, general.fecha_suceso, general.apertura_expediente, general.asignacion_proveedor, general.contacto, general.arribo, general.reporta, general.tel_reporta, general.num_contrato, general.convenio, general.expediente, general.num_cliente, general.num_siniestro, general.ajustador, general.aseguradora, general.aseg_poliza, general.aseg_inciso, general.aseg_vigencia_inicio, general.aseg_vigencia_termino, general.aseg_cobertura, general.aseg_monto, general.asegurado, general.asegurado_y_o, general.aseg_tel1, general.aseg_tel2, general.aseg_domicilio, general.aseg_cp, general.aseg_ciudad, general.aseg_conductor, general.aseg_conductor_tel1, general.aseg_conductor_tel2, general.usuario, general.reporte_cliente, general.tecnico_solicitado, general.motivo_servicio, general.auto_marca, general.auto_tipo, general.auto_modelo, general.auto_color, general.auto_placas, general.tipo_asistencia_vial, general.tipo_asistencia_medica, general.domicilio_cliente, general.domicilio_sustituto, general.ubicacion_requiere, general.ubicacion_ciudad, general.destino_servicio, general.destino_ciudad, general.formato_carta, general.instructivo, general.costo, general.observaciones, general.status, general.banderazo, general.blindaje, general.maniobras, general.espera, general.otro, Empleado.nombre as empleado, servicios.servicio, Cliente.nombre as cliente, Estado.NombreEstado as ubica_estado, Municipio.NombreMunicipio as ubica_municipio, Colonia.NombreColonia as ubica_colonia, estaddestino.NombreEstado as dest_estado, munidestino.NombreMunicipio as dest_municipio, coldestino.NombreColonia as dest_colonia, Provedor.nombre as proveedor, colaseg.NombreColonia as asegur_colonia, muniaseg.NombreMunicipio as asegur_municipio, estadaseg.NombreEstado as asegur_estado, seguimiento_juridico.situacion_juridica, seguimiento_juridico.detencion, seguimiento_juridico.liberacion, seguimiento_juridico.fianzas_conductor, seguimiento_juridico.situacion_vehiculo, seguimiento_juridico.detencion_vehiculo, seguimiento_juridico.liberacion_vehiculo, seguimiento_juridico.fianzas_vehiculo, seguimiento_juridico.conductor as conductor_juridico, seguimiento_juridico.telconductor, seguimiento_juridico.telconductor2, seguimiento_juridico.siniestro as siniestro_juridico, seguimiento_juridico.averiguacion, seguimiento_juridico.autoridad, seguimiento_juridico.fecha_accidente, seguimiento_juridico.numlesionados, seguimiento_juridico.numhomicidios, seguimiento_juridico.delitos, seguimiento_juridico.danos, seguimiento_juridico.lesiones, seguimiento_juridico.homicidios, seguimiento_juridico.ataques, seguimiento_juridico.robo, seguimiento_juridico.descripcion, seguimiento_juridico.lugar_hechos, seguimiento_juridico.referencias, seguimiento_juridico.ciudad, seguimiento_juridico.ajustador as ajustador_juridico, seguimiento_juridico.telajustador, seguimiento_juridico.telajustador2, seguimiento_juridico.monto_danos, seguimiento_juridico.monto_deducible, seguimiento_juridico.resp_ajustador, seguimiento_juridico.resp_abogado, seguimiento_juridico.resp_perito, seguimiento_juridico.resp_consignado, seguimiento_juridico.juzgado, seguimiento_juridico.causa_penal, seguimiento_juridico.procesado, seguimiento_juridico.final_forma_pago, seguimiento_juridico.final_comentario, seguimiento_juridico.final_monto, seguimiento_juridico.final_estado, coljur.NombreColonia as jurid_colonia, munijur.NombreMunicipio as jurid_municipio, estadjur.NombreEstado as jurid_estado, pagos.monto
 from general left join Empleado on (general.idEmpleado = Empleado.idEmpleado) left join servicios on (general.servicio = servicios.id) left join Cliente on (general.idCliente = Cliente.idCliente) left join Estado on (general.ubicacion_estado = Estado.idEstado) left join Municipio on (general.ubicacion_municipio = Municipio.idMunicipio) left join Colonia on (general.ubicacion_colonia = Colonia.idColonia) left join Estado as estaddestino on (general.destino_estado = estaddestino.idEstado) left join Municipio as munidestino on (general.destino_municipio = munidestino.idMunicipio) left join Colonia as coldestino on (general.destino_colonia = coldestino.idColonia) left join Provedor on (general.proveedor = Provedor.id) left join Colonia as colaseg on (general.aseg_colonia = colaseg.idColonia)  left join Municipio as muniaseg on (general.aseg_municipio = muniaseg.idMunicipio) left join Estado as estadaseg on (general.aseg_estado = estadaseg.idEstado) left join seguimiento_juridico on (general.id = seguimiento_juridico.general) left join Colonia as coljur on (seguimiento_juridico.colonia = coljur.idColonia)  left join Municipio as munijur on (seguimiento_juridico.municipio = munijur.idMunicipio) left join Estado as estadjur on (seguimiento_juridico.estado = estadjur.idEstado) left join pagos on (general.expediente = pagos.expediente) Where $elegidos order by $ordena $updown", $link); 
if (mysql_num_rows($result)){ 

$campos=explode(",",$columnas);
$cuenta_columnas=0;

/*
$checa_array1=array_search("autoridad",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Autoridad</strong></td>';}
$checa_array1=array_search("fecha_accidente",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Fecha Accidente</strong></td>';}
$checa_array1=array_search("numlesionados",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Num. Lesionados</strong></td>';}
$checa_array1=array_search("numhomicidios",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Num. Homicidios</strong></td>';}
$checa_array1=array_search("delitos",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Delitos</strong></td>';}
$checa_array1=array_search("danos",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Da&ntilde;os</strong></td>';}
$checa_array1=array_search("lesiones",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Lesiones</strong></td>';}
$checa_array1=array_search("homicidios",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Homicidios</strong></td>';}
$checa_array1=array_search("ataques",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Ataques</strong></td>';}
$checa_array1=array_search("robo",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Robo</strong></td>';}
$checa_array1=array_search("descripcion",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Descripcion</strong></td>';}
$checa_array1=array_search("lugar_hechos",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Lugar de los Hechos</strong></td>';}
$checa_array1=array_search("referencias",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Referencias</strong></td>';}
$checa_array1=array_search("estado_jurid",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Estado</strong></td>';}
$checa_array1=array_search("municipio_jurid",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Municipio</strong></td>';}
$checa_array1=array_search("colonia_jurid",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Colonia</strong></td>';}
$checa_array1=array_search("ciudad_jurid",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Ciudad</strong></td>';}
$checa_array1=array_search("ajustador_jurid",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Ajustador</strong></td>';}
$checa_array1=array_search("telajustador",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Ajustador Telefono</strong></td>';}
$checa_array1=array_search("telajustador2",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Ajustador Telefono 2</strong></td>';}
$checa_array1=array_search("monto_danos",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Monto Da&ntilde;os</strong></td>';}
$checa_array1=array_search("monto_deducible",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Monto Deducible</strong></td>';}
$checa_array1=array_search("resp_ajustador",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Responsabilidad Ajustador</strong></td>';}
$checa_array1=array_search("resp_abogado",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Responsabilidad Abogado</strong></td>';}
$checa_array1=array_search("resp_perito",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Responsabilidad Perito</strong></td>';}
$checa_array1=array_search("resp_consignado",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Responsabilidad Consignado</strong></td>';}
$checa_array1=array_search("juzgado",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Juzgado</strong></td>';}
$checa_array1=array_search("causa_penal",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Causa Penal</strong></td>';}
$checa_array1=array_search("procesado",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Procesado</strong></td>';}
$checa_array1=array_search("final_forma_pago",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Forma de Pago</strong></td>';}
$checa_array1=array_search("final_comentario",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Comentario</strong></td>';}
$checa_array1=array_search("final_monto",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Monto</strong></td>';}
$checa_array1=array_search("final_estado",$campos); if($checa_array1===FALSE){} else{echo'<td align="center" bgcolor="#bbbbbb"><strong>Estado</strong></td>';}
*/




$checa_array1=array_search("servicio",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Servicio", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; } 
$checa_array1=array_search("contrato",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Contrato", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("empleado",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Empleado", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("cliente",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Cliente", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 60); $cuenta_columnas++; }
$checa_array1=array_search("fecha_recepcion",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Fecha de Recepcion", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("fecha_suceso",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Fecha del suceso", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("fecha_apertura",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Fecha de apertura", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("fecha_asignacion",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Fecha de asignacion", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("fecha_contacto",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Fecha de contacto", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("fecha_arribo",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Fecha de arribo", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("reporta",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Reporta", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("tel_reporta",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Tel. de quien reporta", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("num_contrato",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Contrato", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("convenio",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Convenio", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("expediente",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Expediente", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("num_cliente",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Nombre cliente", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 60); $cuenta_columnas++; }
$checa_array1=array_search("num_siniestro",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Num. Siniestro", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("usuario",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Usuario", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 60); $cuenta_columnas++; }
$checa_array1=array_search("reporte_cliente",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Reporte cliente", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("tecnico_solicitado",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Tecnico solicitado", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("motivo_servicio",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Motivo del servicio", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 60); $cuenta_columnas++; }
$checa_array1=array_search("tipo_vial",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Tipo asist. vial", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("tipo_medica",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Tipo asist. medica", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("domicilio_cliente",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Domicilio cliente", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 60); $cuenta_columnas++; }
$checa_array1=array_search("domicilio_sustituto",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Domicilio sustituto", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 60); $cuenta_columnas++; }
$checa_array1=array_search("ubicacion_requiere",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Ubicacion donde requiere el servicio", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 60); $cuenta_columnas++; }
$checa_array1=array_search("ubicacion_estado",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Ubicacion Estado", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("ubicacion_municipio",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Ubicacion Municipio", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("ubicacion_colonia",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Ubicacion Colonia", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("ubicacion_ciudad",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Ubicacion Ciudad", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("destino_servicio",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Destino", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("destino_estado",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Destino Estado", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("destino_municipio",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Destino Municipio", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("destino_colonia",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Destino Colonia", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("destino_ciudad",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Destino Ciudad", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("formato_carta",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Formato Carta", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("instructivo",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Instructivo", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("proveedor",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Proveedor", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("costo",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Costo", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 20); $cuenta_columnas++; }
$checa_array1=array_search("observaciones",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Observaciones", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 60); $cuenta_columnas++; }
$checa_array1=array_search("status",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Status", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("auto_marca",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Marca auto", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("auto_tipo",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Tipo auto", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("auto_modelo",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Modelo auto", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("auto_color",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Color auto", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("auto_placas",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Placas auto", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("aseguradora",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Aseguradora", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("ajustador",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Ajustador", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("aseg_poliza",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Poliza", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 20); $cuenta_columnas++; }
$checa_array1=array_search("aseg_inciso",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Inciso", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 10); $cuenta_columnas++; }
$checa_array1=array_search("aseg_vigencia_inicio",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Vigencia inicio", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("aseg_vigencia_termino",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Vigencia termino", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("aseg_cobertura",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Vigencia cobertura", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("aseg_monto",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Monto", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("asegurado",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Asegurado", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("asegurado_y_o",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Y/O", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("aseg_tel1",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Tel. 1", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("aseg_tel2",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Tel. 2", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("aseg_domicilio",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Domicilio", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("aseg_cp",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "C.P.", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("aseg_estado",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Estado", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("aseg_municipio",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Municipio", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("aseg_colonia",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Colonia", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("aseg_ciudad",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Ciudad", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("aseg_conductor",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Conductor", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("aseg_conductor_tel1",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Tel. 1", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("aseg_conductor_tel2",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Tel. 2", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("situacion_juridica",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Situacion juridica", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("detencion",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Detencion", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("liberacion",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Liberacion", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("fianzas_conductor",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Fianzas", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("situacion_vehiculo",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Situacion vehiculo", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("detencion_vehiculo",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Detencion vehiculo", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("liberacion_vehiculo",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Liberacion vehiculo", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("fianzas_vehiculo",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Fianzas vehiculo", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("conductor_jurid",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Conductor vehiculo", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("telconductor",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Tel. Conductor", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("telconductor2",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Tel. Conductor 2", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("siniestro",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Siniestro", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("averiguacion",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Averiguacion", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("autoridad",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Autoridad", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("fecha_accidente",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Fecha Accidente", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("numlesionados",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Num. Lesionados", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("numhomicidios",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Num. Homicidios", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("delitos",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Delitos", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("danos",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Da�os", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("lesiones",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Lesiones", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("homicidios",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Homicidio", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("ataques",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Ataques", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("robo",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Robo", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("descripcion",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Descripcion", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("lugar_hechos",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Lugar de los hechos", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 140); $cuenta_columnas++; }
$checa_array1=array_search("referencias",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Referencias", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 140); $cuenta_columnas++; }
$checa_array1=array_search("estado_jurid",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Estado", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("municipio_jurid",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Municipio", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("colonia_jurid",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Colonia", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("ciudad_jurid",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Ciudad", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("ajustador_jurid",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Ajustador", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("telajustador",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Ajustador telefono", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("telajustador2",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Ajustador telefono 2", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("monto_danos",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Monto da�os", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("monto_deducible",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Monto deducible", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("resp_ajustador",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Responsabilidad Ajustador", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("resp_abogado",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Responsabilidad Abogado", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("resp_perito",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Responsabilidad Perito", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("resp_consignado",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Responsabilidad Consignado", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("juzgado",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Juzgado", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("causa_penal",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Causa Penal", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("procesado",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Procesado", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("final_forma_pago",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Forma de Pago", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("final_comentario",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Comentario", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("final_monto",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Monto", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("final_estado",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Estado", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("banderazo",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Banderazo", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("blindaje",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Blindaje", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("maniobras",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Maniobras", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("espera",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Espera", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("otro",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Otro", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }
$checa_array1=array_search("total",$campos); if($checa_array1===FALSE){} else{$worksheet->write(0, $cuenta_columnas, "Total", $header); $worksheet->set_column($cuenta_columnas, $cuenta_columnas, 40); $cuenta_columnas++; }

/*
*/



$cuenta_columnas=0;
$cuenta_filas=1;

while ($row = @mysql_fetch_array($result)) {




if($row["activo"]=="1"){$row["activo"]="activo";}
else{$row["activo"]="inactivo";}




$checa_array1=array_search("servicio",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["servicio"]); $cuenta_columnas++;} 
$checa_array1=array_search("contrato",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["contrato"]); $cuenta_columnas++;}

$checa_array1=array_search("empleado",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["empleado"]); $cuenta_columnas++;}
$checa_array1=array_search("cliente",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["cliente"]); $cuenta_columnas++;}
$checa_array1=array_search("fecha_recepcion",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["fecha_recepcion"]); $cuenta_columnas++;}
$checa_array1=array_search("fecha_suceso",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["fecha_suceso"]); $cuenta_columnas++;}
$checa_array1=array_search("fecha_apertura",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["apertura_expediente"]); $cuenta_columnas++;}
$checa_array1=array_search("fecha_asignacion",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["asignacion_proveedor"]); $cuenta_columnas++;}
$checa_array1=array_search("fecha_contacto",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["contacto"]); $cuenta_columnas++;}
$checa_array1=array_search("fecha_arribo",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["arribo"], $format1); $cuenta_columnas++;}
$checa_array1=array_search("reporta",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["reporta"], $format1); $cuenta_columnas++;}
$checa_array1=array_search("tel_reporta",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["tel_reporta"], $format1); $cuenta_columnas++;}
$checa_array1=array_search("num_contrato",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["num_contrato"], $format1); $cuenta_columnas++;}
$checa_array1=array_search("convenio",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["convenio"]); $cuenta_columnas++;}
$checa_array1=array_search("expediente",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["expediente"]); $cuenta_columnas++;}
$checa_array1=array_search("num_cliente",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["num_cliente"]); $cuenta_columnas++;}
$checa_array1=array_search("num_siniestro",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["num_siniestro"]); $cuenta_columnas++;}
$checa_array1=array_search("usuario",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["usuario"]); $cuenta_columnas++;}
$checa_array1=array_search("reporte_cliente",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["reporte_cliente"]); $cuenta_columnas++;}
$checa_array1=array_search("tecnico_solicitado",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["tecnico_solicitado"]); $cuenta_columnas++;}
$checa_array1=array_search("motivo_servicio",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["motivo_servicio"]); $cuenta_columnas++;}
$checa_array1=array_search("tipo_vial",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["tipo_asistencia_vial"]); $cuenta_columnas++;}
$checa_array1=array_search("tipo_medica",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["tipo_asistencia_medica"]); $cuenta_columnas++;}
$checa_array1=array_search("domicilio_cliente",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["domicilio_cliente"]); $cuenta_columnas++;}
$checa_array1=array_search("domicilio_sustituto",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["domicilio_sustituto"]); $cuenta_columnas++;}
$checa_array1=array_search("ubicacion_requiere",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["ubicacion_requiere"]); $cuenta_columnas++;}
$checa_array1=array_search("ubicacion_estado",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["ubica_estado"]); $cuenta_columnas++;}
$checa_array1=array_search("ubicacion_municipio",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["ubica_municipio"]); $cuenta_columnas++;}
$checa_array1=array_search("ubicacion_colonia",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["ubica_colonia"]); $cuenta_columnas++;}
$checa_array1=array_search("ubicacion_ciudad",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["ubicacion_ciudad"]); $cuenta_columnas++;}
$checa_array1=array_search("destino_servicio",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["destino_servicio"]); $cuenta_columnas++;}
$checa_array1=array_search("destino_estado",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["dest_estado"]); $cuenta_columnas++;}
$checa_array1=array_search("destino_municipio",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["dest_municipio"]); $cuenta_columnas++;}
$checa_array1=array_search("destino_colonia",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["dest_colonia"]); $cuenta_columnas++;}
$checa_array1=array_search("destino_ciudad",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["destino_ciudad"]); $cuenta_columnas++;}
$checa_array1=array_search("formato_carta",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["formato_carta"]); $cuenta_columnas++;}
$checa_array1=array_search("instructivo",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["instructivo"]); $cuenta_columnas++;}
$checa_array1=array_search("proveedor",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["proveedor"]); $cuenta_columnas++;}
$checa_array1=array_search("costo",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, number_format($row["monto"],2), $f_price); $cuenta_columnas++;}
$checa_array1=array_search("observaciones",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["observaciones"]); $cuenta_columnas++;}
$checa_array1=array_search("status",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["status"]); $cuenta_columnas++;}
$checa_array1=array_search("auto_marca",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["auto_marca"]); $cuenta_columnas++;}
$checa_array1=array_search("auto_tipo",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["auto_tipo"]); $cuenta_columnas++;}
$checa_array1=array_search("auto_modelo",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["auto_modelo"]); $cuenta_columnas++;}
$checa_array1=array_search("auto_color",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["auto_color"]); $cuenta_columnas++;}
$checa_array1=array_search("auto_placas",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["auto_placas"]); $cuenta_columnas++;}
$checa_array1=array_search("observaciones",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["observaciones"]); $cuenta_columnas++;}
$checa_array1=array_search("aseguradora",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["aseguradora"]); $cuenta_columnas++;}
$checa_array1=array_search("ajustador",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["ajustador"]); $cuenta_columnas++;}
$checa_array1=array_search("aseg_poliza",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["aseg_poliza"]); $cuenta_columnas++;}
$checa_array1=array_search("aseg_inciso",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["aseg_inciso"]); $cuenta_columnas++;}
$checa_array1=array_search("aseg_vigencia_inicio",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["aseg_vigencia_inicio"]); $cuenta_columnas++;}
$checa_array1=array_search("aseg_vigencia_termino",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["aseg_vigencia_termino"]); $cuenta_columnas++;}
$checa_array1=array_search("aseg_cobertura",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["aseg_cobertura"]); $cuenta_columnas++;}
$checa_array1=array_search("aseg_monto",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["aseg_monto"], $f_price); $cuenta_columnas++;}
$checa_array1=array_search("asegurado",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["asegurado"]); $cuenta_columnas++;}
$checa_array1=array_search("asegurado_y_o",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["asegurado_y_o"]); $cuenta_columnas++;}
$checa_array1=array_search("aseg_tel1",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["aseg_tel1"]); $cuenta_columnas++;}
$checa_array1=array_search("aseg_tel2",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["aseg_tel2"]); $cuenta_columnas++;}
$checa_array1=array_search("aseg_domicilio",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["aseg_domicilio"]); $cuenta_columnas++;}
$checa_array1=array_search("aseg_cp",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["aseg_cp"]); $cuenta_columnas++;}
$checa_array1=array_search("aseg_estado",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["asegur_estado"]); $cuenta_columnas++;}
$checa_array1=array_search("aseg_municipio",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["asegur_municipio"]); $cuenta_columnas++;}
$checa_array1=array_search("aseg_colonia",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["asegur_colonia"]); $cuenta_columnas++;}
$checa_array1=array_search("aseg_ciudad",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["aseg_ciudad"]); $cuenta_columnas++;}
$checa_array1=array_search("aseg_conductor",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["aseg_conductor"]); $cuenta_columnas++;}
$checa_array1=array_search("aseg_conductor_tel1",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["aseg_conductor_tel1"]); $cuenta_columnas++;}
$checa_array1=array_search("aseg_conductor_tel2",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["aseg_conductor_tel2"]); $cuenta_columnas++;}
$checa_array1=array_search("situacion_juridica",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["situacion_juridica"]); $cuenta_columnas++;}

$checa_array1=array_search("detencion",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["detencion"]); $cuenta_columnas++;}

$checa_array1=array_search("liberacion",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["liberacion"]); $cuenta_columnas++;}
$checa_array1=array_search("fianzas_conductor",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["fianzas"]); $cuenta_columnas++;}
$checa_array1=array_search("situacion_vehiculo",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["situacion_vehiculo"]); $cuenta_columnas++;}
$checa_array1=array_search("detencion_vehiculo",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["detencion_vehiculo"]); $cuenta_columnas++;}
$checa_array1=array_search("liberacion_vehiculo",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["liberacion_vehiculo"]); $cuenta_columnas++;}
$checa_array1=array_search("fianzas_vehiculo",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["fianzas_vehiculo"]); $cuenta_columnas++;}

$checa_array1=array_search("conductor_jurid",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["conductor_juridico"]); $cuenta_columnas++;}
$checa_array1=array_search("telconductor",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["telconductor"]); $cuenta_columnas++;}
$checa_array1=array_search("telconductor2",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["telconductor2"]); $cuenta_columnas++;}
$checa_array1=array_search("siniestro",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["siniestro_juridico"]); $cuenta_columnas++;}
$checa_array1=array_search("averiguacion",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["averiguacion"]); $cuenta_columnas++;}
$checa_array1=array_search("autoridad",$campos); if($checa_array1===FALSE){} else{$worksheet->write_string($cuenta_filas, $cuenta_columnas, $row["autoridad"]); $cuenta_columnas++;}
$checa_array1=array_search("fecha_accidente",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["fecha_accidente"]); $cuenta_columnas++;}
$checa_array1=array_search("numlesionados",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["numlesionados"]); $cuenta_columnas++;}
$checa_array1=array_search("numhomicidios",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["numhomicidios"]); $cuenta_columnas++;}
$checa_array1=array_search("delitos",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["delitos"]); $cuenta_columnas++;}
$checa_array1=array_search("danos",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["danos"]); $cuenta_columnas++;}
$checa_array1=array_search("lesiones",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["lesiones"]); $cuenta_columnas++;}
$checa_array1=array_search("homicidios",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["homicidios"]); $cuenta_columnas++;}
$checa_array1=array_search("ataques",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["ataques"]); $cuenta_columnas++;}
$checa_array1=array_search("robo",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["robo"]); $cuenta_columnas++;}

$checa_array1=array_search("descripcion",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["descripcion"]); $cuenta_columnas++;}
$checa_array1=array_search("lugar_hechos",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["lugar_hechos"]); $cuenta_columnas++;}
$checa_array1=array_search("referencias",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["referencias"]); $cuenta_columnas++;}
$checa_array1=array_search("estado_jurid",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["jurid_estado"]); $cuenta_columnas++;}
$checa_array1=array_search("municipio_jurid",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["jurid_municipio"]); $cuenta_columnas++;}

$checa_array1=array_search("colonia_jurid",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["colonia_estado"]); $cuenta_columnas++;}
$checa_array1=array_search("ciudad_jurid",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["ciudad"]); $cuenta_columnas++;}
$checa_array1=array_search("ajustador_jurid",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["ajustador_juridico"]); $cuenta_columnas++;}
$checa_array1=array_search("telajustador",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["telajustador"]); $cuenta_columnas++;}
$checa_array1=array_search("telajustador2",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, $row["telajustador2"]); $cuenta_columnas++;}
$checa_array1=array_search("monto_danos",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, number_format($row["monto_danos"],2), $f_price); $cuenta_columnas++;}
$checa_array1=array_search("monto_deducible",$campos); if($checa_array1===FALSE){} else{$worksheet->write($cuenta_filas, $cuenta_columnas, number_format($row["monto_deducible"],2), $f_price); $cuenta_columnas++;}



/*

$checa_array1=array_search("monto_danos",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.number_format($row["monto_danos"],2).'</td>';}
$checa_array1=array_search("monto_deducible",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.number_format($row["monto_deducible"],2).'</td>';}

$checa_array1=array_search("resp_ajustador",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["resp_ajustador"].'</td>';}
$checa_array1=array_search("resp_abogado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["resp_abogado"].'</td>';}
$checa_array1=array_search("resp_perito",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["resp_perito"].'</td>';}
$checa_array1=array_search("resp_consignado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["resp_consignado"].'</td>';}
$checa_array1=array_search("juzgado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["juzgado"].'</td>';}
$checa_array1=array_search("causa_penal",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["causa_penal"].'</td>';}
$checa_array1=array_search("procesado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["procesado"].'</td>';}

$checa_array1=array_search("final_forma_pago",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["final_forma_pago"].'</td>';}

$checa_array1=array_search("final_comentario",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["final_comentario"].'</td>';}
$checa_array1=array_search("final_monto",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.number_format($row["final_monto"],2).'</td>';}
$checa_array1=array_search("final_estado",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["final_estado"].'</td>';}

$checa_array1=array_search("banderazo",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.$row["banderazo"].'</td>';}
$checa_array1=array_search("blindaje",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.$row["blindaje"].'</td>';}
$checa_array1=array_search("maniobras",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.$row["maniobras"].'</td>';}
$checa_array1=array_search("espera",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.$row["espera"].'</td>';}
$checa_array1=array_search("otro",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.$row["otro"].'</td>';}

$total_lastop=$row["banderazo"]+$row["blindaje"]+$row["maniobras"]+$row["espera"]+$row["otro"];

$total_lastop=number_format($total_lastop,2);

$checa_array1=array_search("total",$campos); if($checa_array1===FALSE){} else{echo'<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>$'.$total_lastop.'</td>';}


*/


$cuenta_columnas=0;  
$cuenta_filas++;
 }

}
$workbook->close();

header("Content-Type: application/x-msexcel; name=\"reporte.xls\"");
header("Content-Disposition: inline; filename=\"reporte.xls\"");
$fh=fopen($fname, "rb");
fpassthru($fh);
unlink($fname);

}
###########################################################################################$$$$$$$$$$$$$$$$$$$$$
#------------------------------------------------------------------------------------------------------------------------------------------------------------------

if($export_as=="print"){echo'</body></html>';}
?>