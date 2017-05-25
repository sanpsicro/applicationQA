<?

$checa_arrayx=array_search("servicios",$explota_modulos);

if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';

die();} else{}

?>



<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Servicios</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>



 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            



            <td width="400">&nbsp; 

 </td>



   



            <td>&nbsp;</td>



            <form name="form1" method="post" action="bridge.php?module=servicios"><td align="right" class="questtitle">Búsqueda: 



              <input name="quest" type="text" id="quest2" size="15"> <input type="submit" name="Submit" value="Buscar">



            </td></form>



          </tr>



        </table>



      </td>



  </tr>







<tr><td>

<?
$db = mysqli_connect($host,$username,$pass);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from servicios where id = '$id'",$db);
$servicio=mysql_result($result,0,"servicio");
$tipo=mysql_result($result,0,"tipo");
$campos=mysql_result($result,0,"campos");
$campos=explode(",",$campos);
?>

<table width="100%%" border="0" cellspacing="3" cellpadding="3">

  <tr>

    <td align="center" bgcolor="#bbbbbb"><b>Detalles del Servicio: <? echo ''.$servicio.'';?></b></td>
    </tr>
      <tr>

    <td align="center" bgcolor="#bbbbbb"><b>Tipo: <? echo ''.$tipo.'';?></b></td>
    </tr>

  <tr>

    <td width="50%" bgcolor="#eeeeee"><strong>Campos:</strong><p>
<table width=100% cellpadding=3 cellspacing=3>	
	<?
	$cuenta=0;
	foreach($campos as $micampo){
	if($cuenta=="0"){echo'<tr>';}
	echo'<td><li>'.$micampo.'</td>';
	$cuenta=$cuenta+1;
	if($cuenta=="3"){echo'</tr>'; $cuenta=0;}
	}
	?>
	</table>
	
	</td>
    </tr>

</table>





</td></tr></table>