<?php
   include_once("../conf.php");
   include("ConsultasCabina.php");
?>
<HTML>
<HEAD>
 <TITLE>Cabina</TITLE>
</HEAD>
<BODY>
<table width=600 border=1>
<tr>
<td colspan= 3>
<?php include("busqueda.php"); ?>
</td>
</tr>
<tr>
<td height=200 width=30%>
<?php include("Mensajes.php"); ?>
</td>
<td width=60%>
<?php include("IniciarAltaExpediente.php"); ?>
</td>
<td width=10%>&nbsp;
</td>
</tr>
<tr>
<td colspan= 3>
<?php include("ListarPolizas.php"); ?>
</td>
</tr>
</table>

</BODY>
</HTML>
