 <?
$db = mysqli_connect($host,$username,$pass);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from general where id = '$id'",$db);
if (mysql_num_rows($result)){ 
$aseguradora=mysql_result($result,0,"aseguradora");
$ajustador=mysql_result($result,0,"ajustador");
$telid=mysql_result($result,0,"telid");
$aseg_poliza=mysql_result($result,0,"aseg_poliza");
$aseg_inciso=mysql_result($result,0,"aseg_inciso");
$aseg_inicio=mysql_result($result,0,"aseg_vigencia_inicio");
$aseg_termino=mysql_result($result,0,"aseg_vigencia_termino");
$aseg_cobertura=mysql_result($result,0,"aseg_cobertura");
$aseg_monto=mysql_result($result,0,"aseg_monto");
$aseg_asegurado=mysql_result($result,0,"asegurado");
$asegurado_y_o=mysql_result($result,0,"asegurado_y_o");
$aseg_tel1=mysql_result($result,0,"aseg_tel1");
$aseg_tel2=mysql_result($result,0,"aseg_tel2");
$aseg_calle=mysql_result($result,0,"aseg_domicilio");
$aseg_cp=mysql_result($result,0,"aseg_cp");
$aseg_estado=mysql_result($result,0,"aseg_estado");
$aseg_municipio=mysql_result($result,0,"aseg_municipio");
$aseg_colonia=mysql_result($result,0,"aseg_colonia");
$aseg_ciudad=mysql_result($result,0,"aseg_ciudad");
$aseg_conductor=mysql_result($result,0,"aseg_conductor");
$aseg_conductor_tel1=mysql_result($result,0,"aseg_conductor_tel1");
$aseg_conductor_tel2=mysql_result($result,0,"aseg_conductor_tel2");
}

$db = mysqli_connect($host,$username,$pass);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Estado where idEstado = '$aseg_estado'",$db);
if (mysql_num_rows($result)){ 
$aseg_estado=mysql_result($result,0,"NombreEstado");
}
$db = mysqli_connect($host,$username,$pass);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Municipio where idMunicipio = '$aseg_municipio'",$db);
if (mysql_num_rows($result)){ 
$aseg_municipio=mysql_result($result,0,"NombreMunicipio");
}
$db = mysqli_connect($host,$username,$pass);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from Colonia where idColonia = '$aseg_colonia'",$db);
if (mysql_num_rows($result)){ 
$aseg_colonia=mysql_result($result,0,"NombreColonia");
}

	  ?>
 <table width="100%" border="0" cellspacing="3" cellpadding="3">
        <tr>
          <td bgcolor="#FFFFFF"><strong>Aseguradora:</strong> <? echo $aseguradora;?></td>
          <td bgcolor="#FFFFFF"><strong>Ajustador:</strong> <? echo $ajustador;?></td>
                    <td bgcolor="#FFFFFF"><strong>Tel/ID:</strong> <? echo $telid;?></td>

        </tr>
        <tr>
                  <td bgcolor="#FFFFFF"><strong>P&oacute;liza:</strong> <? echo $aseg_poliza;?> &nbsp;&nbsp; <strong>Inciso:</strong> <? echo $aseg_inciso;?></td>
          <td bgcolor="#FFFFFF"><strong>Vigencia inicio:</strong> <? echo $aseg_inicio;?></td>
          <td bgcolor="#FFFFFF"><strong>Vigencia t&eacute;rmino:</strong> <? echo $aseg_termino;?></td>

        </tr>
        <tr>
<!--           <td bgcolor="#FFFFFF"><strong>Monto RC: </strong> $<? echo $aseg_monto;?></td> -->
          <td bgcolor="#FFFFFF"><strong>Cobertura:</strong> <? echo $aseg_cobertura;?></td>
                    <td bgcolor="#FFFFFF"><strong>Conductor:</strong> <? echo $aseg_conductor;?></td>
                              <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono conductor1:</strong> <? echo $aseg_conductor_tel1;?></td>


        </tr>
        <tr>
                  <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono conductor2:</strong> <? echo $aseg_conductor_tel2;?></td>
<td bgcolor="#FFFFFF"><strong>Asegurado:</strong> <? echo $aseg_asegurado;?></td>
      <td bgcolor="#FFFFFF"><strong>Y/O:</strong> <? echo $asegurado_y_o;?></td>


        </tr>
        <tr>
                  <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono1:</strong> <? echo $aseg_tel1;?></td>
                  <td bgcolor="#FFFFFF"><strong>Tel&eacute;fono2:</strong> <? echo $aseg_tel2;?></td>
          <td bgcolor="#FFFFFF"><strong>Calle y n&uacute;mero:</strong> <? echo $aseg_calle;?></td>

        </tr>
        <tr>
                  <td bgcolor="#FFFFFF"><strong>Colonia:</strong> <? echo $aseg_colonia;?></td>
          <td bgcolor="#FFFFFF"><strong>C.P.</strong> <? echo $aseg_cp;?></td>
          <td bgcolor="#FFFFFF"><strong>Estado:</strong> <? echo $aseg_estado;?></td>


        </tr>
        <tr>
                  <td bgcolor="#FFFFFF"><strong>Ciudad:</strong> <? echo $aseg_ciudad;?></td>
          <td bgcolor="#FFFFFF"><strong>Municipio:</strong> <? echo $aseg_municipio;?></td>
		<? if(empty($NO_EDITAR)):?>
          <td align="right" bgcolor="#FFFFFF"><strong>
           
          
          [ <a href="javascript:FAjax('edita_infopoliza.php?id=<? echo $id;?>&flim-flam=new Date().getTime()','infopoliza','','get');">Editar</a> ]</strong></td>
          
           
          
		  <? endif; ?>
        </tr>
      </table>