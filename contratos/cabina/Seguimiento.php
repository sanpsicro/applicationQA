<?
include_once("../conf.php");
include("ConsultasCabina.php");
conectar();
?>
<html>
<head>
 <title>Expedientes Pendientes</title>
</head>
<body>
<table class="TableData">
<tr class="TableHeader">
<td>Nombre del Cliente</td><td>Numero de Poliza</td><td>ID</td><td>Bitacora</td><td>Estado (Status)</td><td>Usuario</td>
</tr>
<?php
echo "<!-- $SQLCABINA[Seguimiento] -->";
$SEGRES = mysql_query($SQLCABINA["Seguimiento"]);
while($DATA = mysql_fetch_assoc($SEGRES)){
   echo "<tr>";
   echo "<td>$DATA[nmCliente]</td><td><a href=\"AltaSeguimiento.php?idExpediente=$DATA[idExpediente]\">$DATA[numPoliza]</a></td><td>$DATA[idUsuarioFinal]</td><td>$DATA[Bitacora]</td><td>$DATA[Estado]</td><td>$DATA[NombreEmpleado]</td>";
   echo "</tr>";
}
?>

</table>
</body>
</html>
