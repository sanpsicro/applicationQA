<?

session_start();



 if($accela=="edit" && isset($idVehiculo)){

  include 'conf.php';

$db = mysql_connect($host,$username,$pass);

mysql_select_db($database,$db);

$result = mysql_query("SELECT * from Vehiculo where idVehiculo = '$idVehiculo'",$db);

$marca=mysql_result($result,0,"marca");

$modelo=mysql_result($result,0,"modelo");

$tipo=mysql_result($result,0,"tipo");

$color=mysql_result($result,0,"color");

$placas=mysql_result($result,0,"placas");

$serie=mysql_result($result,0,"serie");

$servicio=mysql_result($result,0,"servicio");

$pre_idPoliza=mysql_result($result,0,"idPoliza");

$pre_tmpid=mysql_result($result,0,"tmpid");

}







?>

 <html><head>

<link href="style_1.css" rel="stylesheet" type="text/css" />

 <script type="text/javascript">
function f(o){
o.value=o.value.toUpperCase();
}
function g(o){

}
</script>

</head><body>

 <table width="100%%" border="0" cellspacing="3" cellpadding="3">

 <?

echo'<form name="frm" method="post" action="process.php?module=vehiculos&accela='.$accela.'&idPoliza='.$idPoliza.'&tmpid='.$tmpid.'&idVehiculo='.$idVehiculo.'&tipocliente='.$tipocliente.'">';

?>    

  <tr>

    <td colspan="4" bgcolor="#bbbbbb"><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td><strong>Veh&iacute;culos</strong></td>

        <td width="150" align="center" class="blacklinks">[ <a href="vehiculos.php?tmpid=<? echo $tmpid; ?>&idPoliza=<? echo $idPoliza; ?>&tipocliente=<? echo $tipocliente; ?>">Lista de vehículos</a> ]</td>

      </tr>

    </table>      </td>

  </tr>

  

   <tr>

    <td width="25%" align="right" bgcolor="#bbbbbb"><strong>Marca</strong><strong>:</strong><strong></strong></td>

    <td width="25%" align="left" bgcolor="#bbbbbb"><input name="marca" type="text" id="marca" size="30" value="<? echo $marca; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>

    <td width="25%" align="right" bgcolor="#bbbbbb"><strong>Modelo:</strong></td>

    <td width="25%" align="left" bgcolor="#bbbbbb"><input name="modelo" type="text" id="modelo" size="30" value="<? echo $modelo; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>

   </tr>

   <tr>

     <td align="right" bgcolor="#bbbbbb"><strong>Tipo:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><input name="tipo" type="text" id="tipo" size="30" value="<? echo $tipo; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>

     <td align="right" bgcolor="#bbbbbb"><strong>Color:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><input name="color" type="text" id="color" size="30" value="<? echo $color; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>

   </tr>

   <tr>

     <td align="right" bgcolor="#bbbbbb"><strong>Placas:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><input name="placas" type="text" id="placas" size="30" value="<? echo $placas; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>

     <td align="right" bgcolor="#bbbbbb"><strong>Serie:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><input name="serie" type="text" id="serie" size="30" value="<? echo $serie; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>

   </tr>

   <tr>

     <td align="right" bgcolor="#bbbbbb"><strong>Servicio:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><select name="servicio" id="servicio">

       <option value="PARTICULAR" <? if($servicio=="PARTICULAR"){echo' selected';}  ?>>Particular</option>

       <option value="PUBLICO" <? if($servicio=="PUBLICO"){echo' selected';}  ?>>P&uacute;blico</option>

     </select>

     </td>

     <td align="right" bgcolor="#bbbbbb"><input type="submit" name="Submit" value="Agregar Veh&iacute;culo" onClick="return confirm(
  'Se dará de alta el vehículo con los siguientes datos:\n \n Marca: ' + document.frm.marca.value + ' \n Modelo: ' + document.frm.modelo.value + '\n Tipo: ' + document.frm.tipo.value + '\n Color: ' + document.frm.color.value + '\n Placas: ' + document.frm.placas.value + '\n Serie: ' + document.frm.serie.value + '\n  \n \n ¿Desea continuar?');"></td>

     <td align="left" bgcolor="#bbbbbb"><input type="reset" name="Submit2" value="Reestablecer"></td>

   </tr></form>

 </table>



  





 </body></html>

