<?
$checa_arrayx=array_search("evaluaciones",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Evaluaciones</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="400">&nbsp; 
 </td>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=evaluaciones"><td align="right" class="questtitle">B�squeda: 
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
$result = mysql_query("SELECT * from evaluaciones where general = '$id'",$db);
$fecha=mysql_result($result,0,"fecha");
$fechax=explode(" ",$fecha);
$fechay=explode("-",$fechax[0]);
$nombre=mysql_result($result,0,"nombre");
$relacion=mysql_result($result,0,"relacion");
$cortesia=mysql_result($result,0,"cortesia");
$puntualidad=mysql_result($result,0,"puntualidad");
$presentacion=mysql_result($result,0,"presentacion");
$atencion=mysql_result($result,0,"atencion");
$solucion=mysql_result($result,0,"solucion");
$observaciones=mysql_result($result,0,"observaciones");
$encuestador=mysql_result($result,0,"encuestador");
$promedio=mysql_result($result,0,"promedio");
?>
<table width="100%%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td colspan="2" align="center" bgcolor="#bbbbbb"><b>Detalles de evaluaci�n</b></td>
    </tr>

  <tr>

    <td width="25%" bgcolor="#eeeeee"><strong>Fecha:</strong></td>
    <td width="25%" bgcolor="#eeeeee"><?
	echo''.$fechay[2].'/'.$fechay[1].'/'.$fechay[0].' '.$fechax[1].'';
	?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>Nombre de la persona que contesta la encuesta:</strong></td>
    <td bgcolor="#FFFFFF"><? echo $nombre; ?></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>&iquest;Qu&eacute; relaci&oacute;n tiene con el usuario? </strong></td>
    <td bgcolor="#eeeeee"><? echo $relacion; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>&iquest;El operador de nuestra cabina le atendi&oacute; con cortes&iacute;a y rapidez?</strong></td>
    <td bgcolor="#FFFFFF"><? echo $cortesia; ?></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>&iquest;El servicio que usted solicit&oacute; lleg&oacute; en el tiempo prometido?</strong></td>
    <td bgcolor="#eeeeee"><? echo $puntualidad; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>&iquest;C&oacute;mo calificar&iacute;a la presentaci&oacute;n de la persona que le dio el servicio?</strong></td>
    <td bgcolor="#FFFFFF"><? echo $presentacion; ?></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>&iquest;Usted se sinti&oacute; apoyado o respaldado por la persona que le atendi&oacute; en el lugar?</strong></td>
    <td bgcolor="#eeeeee"><? echo $atencion; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>&iquest;La soluci&oacute;n final a su problema como la calificar&iacute;a?</strong></td>
    <td bgcolor="#FFFFFF"><? echo $solucion; ?></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Promedio:</strong></td>
    <td bgcolor="#eeeeee"><? echo $promedio; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><strong>Por &uacute;ltimo, &iquest;tiene usted alguna observaci&oacute;n o comentario que nos permita mejorar y brindarle un mejor servicio?</strong></td>
    <td bgcolor="#FFFFFF"><? echo nl2br($observaciones); ?></td>
  </tr>
  <tr>
    <td bgcolor="#eeeeee"><strong>Nombre de la persona que realiz&oacute; la encuesta: </strong></td>
    <td bgcolor="#eeeeee"><? echo $encuestador; ?></td>
  </tr>
</table>





</td></tr></table>