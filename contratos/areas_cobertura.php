<?
session_start();
if(isset($accela) && $accela=="elimina"){
$areas_exp=explode(",",$_SESSION['coberturas']);
$remover=array($racoon);
$remover_blank=array("");
$areas_nuevas = array_diff ($areas_exp, $remover);
$areas_nuevas = array_diff ($areas_nuevas, $remover_blank);
$areas_nuevas = array_unique($areas_nuevas);
$areas_nuevas=implode(",",$areas_nuevas);
$_SESSION['coberturas'] = $areas_nuevas;
}
if(isset($accela) && $accela=="cambia"){
$areas_exp=explode(",",$_SESSION['coberturas']);
$remover=array($racoon);
$remover_blank=array("");
$areas_nuevas = array_diff ($areas_exp, $remover);
$areas_nuevas = array_diff ($areas_nuevas, $remover_blank);
$areas_nuevas = array_unique($areas_nuevas);
$areas_nuevas=implode(",",$areas_nuevas);
$_SESSION['coberturas'] = $areas_nuevas;
$areas_exp=explode(",",$_SESSION['coberturas']);
$remover_blank=array("");
$areas_puras = array_diff ($areas_exp, $remover_blank);
$nueva_area="".$estado."-".$municipio."-".$prioridad."";
$areas_puras[]=$nueva_area;
$areas_exp= array_unique($areas_puras);
$areas_imp=implode(",",$areas_exp);
$_SESSION['coberturas'] = $areas_imp;
}
if(isset($estado) && isset($municipio)){
$areas_exp=explode(",",$_SESSION['coberturas']);
$remover_blank=array("");
$areas_puras = array_diff ($areas_exp, $remover_blank);
$nueva_area="".$estado."-".$municipio."-".$prioridad."";
$areas_puras[]=$nueva_area;
$areas_exp= array_unique($areas_puras);
$areas_imp=implode(",",$areas_exp);
$_SESSION['coberturas'] = $areas_imp;
} 
include('conf.php');
if($accela=="edit" && empty($estado) && empty($municipio) && empty($racoon) && isset($id)){
$_SESSION['coberturas']="";
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Provedor where id = '$id'",$db);
$cobertura=mysql_result($result,0,"cobertura");
$_SESSION['coberturas']=$cobertura;
}
?>
<html><head><title>Opcyon</title>
<link href="style_1.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><style type="text/css">
<!--
body {
	background-color: #eeeeee;
}
.style3 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<script type="text/javascript" src="subcombo_corto.js"></script>
</head><body>
<form id="form1x" name="form1x" method="post" action="areas_cobertura.php?accela=<? echo $accela; ?>">
  <table width="100%%" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td bgcolor="#CCCCCC"><select name="estado" id="estado" onchange='cargaContenido(this.id)'>
                                  <option value='0'>Seleccione un Estado</option>
                                  <?

$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT * FROM Estado order by NombreEstado", $link); 
if (mysql_num_rows($result)){ 
  while ($row = @mysql_fetch_array($result)) { 
  echo'<option value="'.$row["idEstado"].'">'.$row["NombreEstado"].'</option>';
  }}

			  ?>
      </select></td>
      <td bgcolor="#CCCCCC"><?
						  
echo'<select disabled="disabled" name="municipio" id="municipio">
						<option value="0">Seleccione un Estado</option>
					</select>';
						  ?></td>
                          <td bgcolor="#CCCCCC">
                          <select name="prioridad" id="prioridad">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                          <option value="E">E</option>
                          <option value="F">F</option>
                          <option value="G">G</option>
                          <option value="H">H</option>
                          <option value="I">I</option>
                          <option value="J">J</option>
                          <option value="K">K</option>
                          <option value="L">L</option>
                          <option value="M">M</option>
                          <option value="N">N</option>
                          <option value="O">O</option>
                          <option value="P">P</option>
                          <option value="Q">Q</option>
                          <option value="R">R</option>
                          <option value="S">S</option>
                          <option value="T">T</option>
                          <option value="U">U</option>
                          <option value="V">V</option>
                          <option value="W">W</option>
                          <option value="X">X</option>
                          <option value="Y">Y</option>
                          <option value="Z" selected>Z</option>
                          </select>
                          </td>
      <td bgcolor="#CCCCCC"><input type="submit" name="Submit" value="Agregar Area" /></form></td>
    </tr>
    <tr>
      <td width="25%" bgcolor="#666666"><span class="style3">Estado</span></td>
      <td width="25%" bgcolor="#666666"><span class="style3">Municipio</span></td>
      <td width="15%" bgcolor="#666666"><span class="style3">Prioridad</span></td>
      <td width="35%" bgcolor="#666666"><span class="style3">Operaciones</span></td>
    </tr>
	
<?
if(session_is_registered("coberturas") && $_SESSION["coberturas"]!=""){
$areas_desglosadas=explode(",",$_SESSION[coberturas]);
sort($areas_desglosadas);
array_unique($areas_desglosadas);
foreach($areas_desglosadas as $mikarea){
if($mikarea!="" && $mikarea!=" "){
$apart=explode("-",$mikarea);
$db = mysql_connect($host,$username,$pass);
mysql_select_db($database,$db);
$result = mysql_query("SELECT * from Estado where idEstado = '$apart[0]'",$db);
$estado=mysql_result($result,0,"NombreEstado");
$result = mysql_query("SELECT * from Municipio where idMunicipio = '$apart[1]'",$db);
$municipio=mysql_result($result,0,"NombreMunicipio");
$prioridad = $apart[2];
echo'<tr><td>'.$estado.'</td><td>'.$municipio.'</td><td>'.$prioridad.'</td><td> <form  method="post" action="?accela=cambia&racoon='.$mikarea.'&estado='.$apart[0].'&municipio='.$apart[1].'"><a href="?accela=elimina&racoon='.$mikarea.'"><font color=black>Eliminar</a> | Prioridad: <select name="prioridad" id="prioridad">
						  <option value="'.$apart[2].'">'.$apart[2].'</option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                          <option value="E">E</option>
                          <option value="F">F</option>
                          <option value="G">G</option>
                          <option value="H">H</option>
                          <option value="I">I</option>
                          <option value="J">J</option>
                          <option value="K">K</option>
                          <option value="L">L</option>
                          <option value="M">M</option>
                          <option value="N">N</option>
                          <option value="O">O</option>
                          <option value="P">P</option>
                          <option value="Q">Q</option>
                          <option value="R">R</option>
                          <option value="S">S</option>
                          <option value="T">T</option>
                          <option value="U">U</option>
                          <option value="V">V</option>
                          <option value="W">W</option>
                          <option value="X">X</option>
                          <option value="Y">Y</option>
                          <option value="Z">Z</option>
                          </select><input type="submit" value="Cambiar"> </form></td></tr>';
}
}
}

?>
  </table>

</body></html>