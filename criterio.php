<?
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');
include('conf.php'); 

if(isset($_POST['id']) && $_POST['id'] != ""){
$crt_ajustador=utf8_decode($crt_ajustador); 
$crt_abogado=utf8_decode($crt_abogado); 
$crt_perito=utf8_decode($crt_perito); 
$crt_consignado=utf8_decode($crt_consignado); 
$juzgado=utf8_decode($juzgado); 
$causa_penal=utf8_decode($causa_penal); 


mysqli_connect("$host","$username","$pass");
$result=mysqli_query("$database","select * from seguimiento_juridico where general = '$id'");
$cuantosson=mysqli_num_rows($result);
mysql_free_result($result);
if ($cuantosson>0) {
#actualizar registro
mysqli_connect($host,$username,$pass,$database);
$sSQL="UPDATE seguimiento_juridico SET resp_ajustador='$crt_ajustador', resp_abogado='$crt_abogado', resp_perito='$crt_perito', resp_consignado='$crt_consignado', juzgado='$juzgado', causa_penal='$causa_penal', procesado='$procesado' where general='$id'";
mysqli_query($database, "$sSQL");

}
else{
#crear registro
mysqli_connect($host,$username,$pass,$database);
mysqli_query($database,"INSERT INTO `seguimiento_juridico` (`resp_ajustador`, `resp_abogado`, `resp_perito`, `resp_consignado`, `juzgado`, `causa_penal`, `procesado`) VALUES ('$crt_ajustador', '$crt_abogado', '$crt_perito', '$crt_consignado', '$juzgado', '$causa_penal', '$procesado')"); 
}
}
$db = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from seguimiento_juridico where general = '$id'",$db);
if (mysqli_num_rows($result)){ 
$resp_ajustador=mysql_result($result,0,"resp_ajustador");
$resp_abogado=mysql_result($result,0,"resp_abogado");
$resp_perito=mysql_result($result,0,"resp_perito");
$resp_consignado=mysql_result($result,0,"resp_consignado");
$juzgado=mysql_result($result,0,"juzgado");
$causa_penal=mysql_result($result,0,"causa_penal");
$procesado=mysql_result($result,0,"procesado");
}	  
?>	   
	    <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td width="25%" bgcolor="#ffffff"><strong>Ajustador:</strong> <? echo $resp_ajustador; ?></td>
      <td width="25%" bgcolor="#ffffff"><strong>Abogado:</strong> <? echo $resp_abogado; ?></td>
      <td width="25%" bgcolor="#ffffff"><strong>Perito:</strong> <? echo $resp_perito; ?></td>
      <td width="25%" bgcolor="#ffffff"><strong>Consignado:</strong> <? echo $resp_consignado; ?></td>
    </tr>
    <tr>
      <td colspan="4" bgcolor="#ffffff"><strong>Juzgado:</strong> <? echo $juzgado; ?></td>
      </tr>
    <tr>
      <td colspan="4" bgcolor="#ffffff"><strong>Causa penal: </strong> <? echo $causa_penal; ?></td>
      </tr>
    <tr>
      <td bgcolor="#ffffff"><strong>Procesado:</strong> <? echo $procesado; ?></td>
      <td bgcolor="#ffffff">&nbsp;</td>
      <td bgcolor="#ffffff">&nbsp;</td>
      <td align="right" bgcolor="#ffffff"><strong>[ <a href="javascript:FAjax('editar_criterio.php?id=<? echo $id;?>&flim-flam=new Date().getTime()','criterio','','get');">Editar</a> ]</strong></td>
    </tr>
  </table>