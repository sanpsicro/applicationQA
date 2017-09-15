<?
session_start();
if ( session_is_registered( "valid_user" ) && session_is_registered( "valid_modulos" ) && session_is_registered( "valid_permisos" ))
{}
else {
header("Location: index.php?errorcode=3");
}
 if($accela=="edit" && isset($id)){
  include 'conf.php';
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Beneficiario where id = '$id'",$db);
$nombre=mysql_result($result,0,"nombre");
$edad=mysql_result($result,0,"edad");
$parentesco=mysql_result($result,0,"parentesco");
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

echo'<form name="frm" method="post" action="process.php?module=beneficiarios&accela='.$accela.'&idPoliza='.$idPoliza.'&tmpid='.$tmpid.'&id='.$id.'&tipocliente='.$tipocliente.'">';

?>    

  <tr>

    <td colspan="6" bgcolor="#bbbbbb"><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td><strong>Beneficiarios</strong></td>

        <td width="150" align="center" class="blacklinks">[ <a href="beneficiarios.php?tmpid=<? echo $tmpid; ?>&idPoliza=<? echo $idPoliza; ?>&tipocliente=<? echo $tipocliente; ?>">Lista de beneficiarios</a> ]</td>
      </tr>
    </table>      </td>
  </tr>
   <tr>

    <td align="right" bgcolor="#bbbbbb"><strong>Nombre</strong><strong>:</strong><strong></strong></td>

    <td align="left" bgcolor="#bbbbbb"><input name="nombre" type="text" id="nombre" size="30" value="<? echo $nombre; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>

    <td align="right" bgcolor="#bbbbbb"><strong>Edad:</strong></td>

    <td align="left" bgcolor="#bbbbbb"><input name="edad" type="text" id="edad" size="30" value="<? echo $edad; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>


     <td align="right" bgcolor="#bbbbbb"><strong>Parentesco:</strong></td>

     <td align="left" bgcolor="#bbbbbb"><input name="parentesco" type="text" id="parentesco" size="30" value="<? echo $parentesco; ?>" onattrmodified="g(this)" onpropertychange="g(this)" onKeyDown="f(this)" onKeyUp="f(this)" onBlur="f(this)" onClick="f(this)"></td>

   </tr>

   <tr>

     <td align="center" bgcolor="#bbbbbb" colspan=6>
<input type="submit" name="Submit" value="Agregar Beneficiario" onClick="return confirm(
  'Se dará de alta el vehículo con los siguientes datos:\n \n Marca: ' + document.frm.marca.value + ' \n Modelo: ' + document.frm.modelo.value + '\n Tipo: ' + document.frm.tipo.value + '\n Color: ' + document.frm.color.value + '\n Placas: ' + document.frm.placas.value + '\n Serie: ' + document.frm.serie.value + '\n  \n \n ¿Desea continuar?');"> 
&nbsp; <input type="reset" name="Submit2" value="Reestablecer"></td>
   </tr></form>
 </table></body></html>