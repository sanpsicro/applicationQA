<?
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');

 echo'<iframe src ="asigna_proveedor.php?idcaso='.$id.'" width="100%" height=200 border=0 frameborder=0 MARGINWIDTH=50 MARGINHEIGHT=50 ALIGN=30 name="window2"></iframe><p align=center>
 <input type="button" name="Button" value="Finalizar y Volver" onclick="javascript:FAjax(\'statuscaso.php?id='.$_GET[id].'&caso='.$_GET[caso].'&flim-flam=new Date().getTime()\',\'statuscaso\',\'\',\'get\');"/>
 ';
 
?>

