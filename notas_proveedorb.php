<?php  
include("conf.php");
?>
<?php  
$linka = mysqli_connect($host, $username, $pass); 
//mysql_select_db($database, $linka); 
$resultar = mysqli_query("SELECT * FROM Provedor where id='$id' LIMIT 1", $linka); 
if (mysqli_num_rows($resultar)){ 
  while ($row = @mysqli_fetch_array($resultar)) { 
  

$nombrep=$row["nombre"];
  }
}

?>
<html>
<head>
<title>Notas Proveedor <?php  echo $nombrep;?> </title>
</head>
<body topmargin="10" leftmargin="10">
<link href="style_1.css" rel="stylesheet" type="text/css" />
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="questtitle">Notas / Proveedor <?php  echo $nombrep;?> </span></td>
      <td width=200 align="right" class="blacklinks">&nbsp;</td>

      </tr></table></td></tr>

<tr>

  <td>
  
	 
  <table width="100%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td colspan="3" bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><strong>Notas</strong></td>
          <td align="right"><b>[ <a href="editar_notasp.php?id=<?php  echo $id; ?>&caso=nuevo">Agregar Nota</a> ]</b></td>
        </tr>
      </table></td>
      </tr></table>
	  <div id="notas">
<?php  
$link = mysqli_connect($host, $username, $pass); 
//mysql_select_db($database, $link); 
$result = mysqli_query("SELECT * FROM notasprov where general='$id' order by fecha desc", $link); 
if (mysqli_num_rows($result)){ 
  while ($row = @mysqli_fetch_array($result)) { 
  
$fexar=$row["fecha"];
$fexaz=explode(" ",$fexar);
$fexa=explode("-",$fexaz[0]);

$userx=$row["usuario"];

$dbl = mysqli_connect($host,$username,$pass,$database);
//mysql_select_db($database,$dbl);
$resultl = mysqli_query("SELECT * from Empleado where idEmpleado='$userx'",$dbl);
if (mysqli_num_rows($resultl)){ 
$eluserx=mysql_result($resultl,0,"nombre");
}

echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">
		<tr>
		  <td bgcolor="#cccccc"><table width=100% cellpadding=0 cellspacing=0 border=0><tr><td><strong>Fecha:</strong> '.$fexa[2].'/'.$fexa[1].'/'.$fexa[0].' '.$fexaz[1].'</td><td align=right><b>'.$eluserx.'</b></td></tr></table></td>
		</tr>
		<tr>
		  <td bgcolor="#ffffff"><strong>Comentario:</strong><br>'.nl2br($row["comentario"]).'</td>
		  </tr>

		</table>';  
		$eluserx="";
}}
?>
</div>
    </td></tr></table>
    </body>
    </html>