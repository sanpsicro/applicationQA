<?
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');
include('conf.php'); 

$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from general where id = '$id'",$db);
if (mysql_num_rows($result)){ 
$status=mysql_result($result,0,"status");
}
echo'<form method="post" onsubmit="FAjax(\'statuscaso.php?&flim-flam=new Date().getTime()\',\'statuscaso\',\'id='.$_GET['id'].'&caso='.$_GET['caso'].'&status=\'+document.getElementById(\'status\').value,\'POST\'); return false" action="#">';
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td bgcolor="#ffffff"><strong>Status: </strong></td>
            <td bgcolor="#ffffff"><select name="status" id="status">'; 
			
echo'<option value="abierto"'; 
if($status=="abierto"){echo' selected ';}
echo'>Abierto</option>';

echo'<option value="en tramite"'; 
if($status=="en tramite"){echo' selected ';}
echo'>En tramite</option>';


echo'<option value="concluido"'; 
if($status=="concluido"){echo' selected ';}
echo'>Concluido</option>';


echo'<option value="cancelado posterior"'; 
if($status=="cancelado posterior"){echo' selected ';}
echo'>Cancelado posterior</option>';

echo'<option value="cancelado al momento"'; 
if($status=="cancelado al momento"){echo' selected ';}
echo'>Cancelado al momento</option>';
			
						echo'</select></td></tr>
			
					<tr>
            <td colspan=2 align="center" bgcolor="#ffffff"><input name="Enviar" type="submit" value="Guardar" /> 
            &nbsp;&nbsp;
            <input type="button" name="Button" value="Cancelar" onclick="javascript:FAjax(\'statuscaso.php?id='.$_GET[id].'&caso='.$_GET[caso].'&flim-flam=new Date().getTime()\',\'statuscaso\',\'\',\'get\');"/></td>
          </tr>
        </table>
</form>';
?>

