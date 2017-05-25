<?
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header('Content-Type: text/xml; charset=ISO-8859-1');
include('conf.php'); 

if(empty($fecha[2])){$fecha[2]=date("d");}
if(empty($fecha[1])){$fecha[1]=date("m");}
if(empty($fecha[0])){$fecha[0]=date("Y");}

if($_GET['caso'] == "editar")
{
##
$db = mysqli_connect($host,$username,$pass);
//mysql_select_db($database,$db);
$result = mysqli_query("SELECT * from notas_legal where general='$_GET[id]' AND  id= '$_GET[idnota]'",$db);
if (mysql_num_rows($result)){ 
$fecha=mysql_result($result,0,"fecha");
$fecha=explode("-",$fecha);
$etapa=mysql_result($result,0,"etapa");
$tipo=mysql_result($result,0,"tipo");
$comentario=mysql_result($result,0,"comentario");
$adjunto1=mysql_result($result,0,"adjunto1");
$adjunto2=mysql_result($result,0,"adjunto2");
$adjunto3=mysql_result($result,0,"adjunto3");
$adjunto4=mysql_result($result,0,"adjunto4");
}
##
}
?>
<form method="post" enctype="multipart/form-data" action="upnotes.php?id=<? echo $id; ?>&caso=<? echo $caso; ?>&idnota=<? echo $idnota; ?>">

<table width="100%" border="0" cellspacing="3" cellpadding="3">
		<tr>
		  <td width="33%" bgcolor="#FFFFFF"><strong>Fecha:</strong> <?
		echo'  <select name="fecha_d" id="fecha_d">';			
for($contador=1;$contador<=31;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$fecha[2]){echo' selected';}
echo'>'.$cuenta.'</option>';
}          echo' </select>
            /
            <select name="fecha_m" id="fecha_m">';
			
			for($contador=1;$contador<=12;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$fecha[1]){echo' selected';}
echo'>'.$cuenta.'</option>';
}			

			
			
echo'                        </select>
            /
            <select name="fecha_a" id="fecha_a">';

			for($contador=2007;$contador<=2017;$contador++){
if(strlen($contador)==1){$cuenta="0".$contador."";} 
else{$cuenta=$contador;}
echo'<option value="'.$cuenta.'"';  
if($cuenta==$fecha[0]){echo' selected';}
echo'>'.$cuenta.'</option>';
}			

                        echo'</select>';
		  
		  ?></td>
		  <td width="33%" bgcolor="#FFFFFF"><strong>Etapa:
		    <select name="etapa" id="etapa">
		      <option value="Arreglo extrajudicial" <? if($etapa=="Arreglo extrajudicial"){echo' selected ';}?>>Arreglo extrajudicial</option>
		      <option value="Averiguacion previa" <? if($etapa=="Averiguacion previa"){echo' selected ';}?>>Averiguacion previa</option>              
		      <option value="Juzgado" <? if($etapa=="Juzgado"){echo' selected ';}?>>Juzgado</option>              
		      <option value="Apelacion" <? if($etapa=="Apelacion"){echo' selected ';}?>>Apelacion</option>              
		      <option value="Amparo" <? if($etapa=="Amparo"){echo' selected ';}?>>Amparo</option>              
		      <option value="Cierre" <? if($etapa=="Cierre"){echo' selected ';}?>>Cierre</option>
			  <option value="Otro" <? if($etapa=="Otro"){echo' selected ';}?>>Otro</option>
	          </select>
		  </strong></td>
		  <td width="33%" bgcolor="#FFFFFF"><strong>Tipo:
		    <select name="tipo" id="tipo">
		      <option value="Comentario" <? if($tipo=="Comentario"){echo' selected ';}?>>Comentario</option>
		      <option value="Actuacion" <? if($tipo=="Actuacion"){echo' selected ';}?>>Actuaci&oacute;n</option>
	          </select>
		  </strong></td>
		</tr>
		<tr>
		  <td colspan="3" bgcolor="#FFFFFF"><p><strong>Comentario:<br />
		  </strong><strong>
          <textarea name="comentario" cols="90" rows="6" id="comentario"><? echo $comentario;?></textarea>
          </strong></p>
	      </td>
  </tr>
		<tr>
		  <td colspan="3" bgcolor="#FFFFFF"><strong>Archivos adjuntos:<br />
		  </strong>
		    <table width="100%" border="0" cellspacing="3" cellpadding="3">
              <tr>
                <td width="100"><input name="file1" type="file" size="50"/></td>
                <td><? if($adjunto1!="" && $adjunto1!=" "){echo'<a href="adjuntos/'.$adjunto1.'" target="_blank">'.$adjunto1.'</a> [Deje en blanco si no desea sustituir este archivo]';} ?></td>
              </tr>
              <tr>
                <td><input name="file2" type="file" size="50"/></td>
                <td><? if($adjunto2!="" && $adjunto2!=" "){echo'<a href="adjuntos/'.$adjunto2.'" target="_blank">'.$adjunto2.'</a> [Deje en blanco si no desea sustituir este archivo]';} ?></td>
              </tr>
              <tr>
                <td><input name="file3" type="file" size="50"/></td>
                <td><? if($adjunto3!="" && $adjunto3!=" "){echo'<a href="adjuntos/'.$adjunto3.'" target="_blank">'.$adjunto3.'</a> [Deje en blanco si no desea sustituir este archivo]';} ?></td>
              </tr>
              <tr>
                <td><input name="file4" type="file" size="50"/></td>
                <td><? if($adjunto4!="" && $adjunto4!=" "){echo'<a href="adjuntos/'.$adjunto4.'" target="_blank">'.$adjunto4.'</a> [Deje en blanco si no desea sustituir este archivo]';} ?></td>
              </tr>
            </table>
		    <br>
		    <br>
		    <br>		    <br>		 </td>
  </tr>
		<tr>
		  <td colspan="3" align="center" bgcolor="#FFFFFF">
<input name="Enviar" type="submit" value="Enviar" /> 
            &nbsp;&nbsp;
            <input type="button" name="Button" value="Cancelar" onClick="location.href='?module=seguimiento_caso&id=<? echo $id;?>'"/>		  
		  </td>
  </tr>
</table></form>