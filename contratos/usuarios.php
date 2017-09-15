<?
$checa_arrayx=array_search("usuarios",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
if(empty($show)){$show=10;}
if(empty($sort)){$sort="nombre";}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Usuarios</span></td><td width=150 class="blacklinks"><?  $checa_array1=array_search("1_a",$explota_permisos);
if($checa_array1===FALSE){} else{echo'[ <a href="?module=admin_usuarios&accela=new">Nuevo Usuario</a> ]';} ?></td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <form name="form1" method="post" action="bridge.php?module=usuarios<? if($quest!=""){echo"&quest=$quest";}?>">
            <td width="400"> 
              <select name="show" id="mostrar">
                <option value="10" <? if($show=="10"){echo"selected";}?>>10 por página</option>
                <option value="20"  <? if($show=="20"){echo"selected";}?>>20 por página</option>
                <option value="30"  <? if($show=="30"){echo"selected";}?>>30 por página</option>
                <option value="50"  <? if($show=="50"){echo"selected";}?>>50 por página</option>
                <option value="100"  <? if($show=="100"){echo"selected";}?>>100 por página</option>
                <option value="200"  <? if($show=="200"){echo"selected";}?>>200 por página</option>
              </select>
              <select name="sort" id="ordenar">
                <option value="nombre"  <? if($sort=="nombre"){echo"selected";}?>>Ordenar por nombre</option>
                <option value="usuario" <? if($sort=="usuario"){echo"selected";}?>>Ordenar por usuario</option>
                <option value="tipo" <? if($sort=="tipo"){echo"selected";}?>>Ordenar por tipo</option>				
              </select>
              <input type="submit" name="Submit2" value="Mostrar"> </td>
          </form>
            <td>&nbsp;</td>
            <form name="form1" method="post" action="bridge.php?module=usuarios"><td align="right" class="questtitle">Búsqueda: 
              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)" > <input type="submit" name="Submit" value="Buscar">
            </td></form>
          </tr>
        </table>
      </td>
  </tr>
<tr><td>
<?
if(isset($code) && $code=="1"){echo'<br><b><div class="xplik">Nuevo Usuario Registrado</div></b><p>';}
if(isset($code) && $code=="2"){echo'<br><b><div class="xplik">Datos del Usuario actualizados</div></b><p>';}
if(isset($code) && $code=="3"){echo'<br><b><div class="xplik">Usuario eliminado</div></b><p>';}
if(isset($code) && $code=="4"){echo'<br><b><div class="xplik">Error: El Usuario ya existe</div></b><p>';}
if(isset($quest) && $quest!=""){
echo'<br><b><div class="xplik">Resultados de la búsqueda:</div></b><p>';
$condicion="where (nombre like '%$quest%' OR direccion like '%$quest%' OR estado like '%$quest%' OR municipio like '%$quest%' OR email like '%$quest%' OR usuario like '%$quest%')";
}
else{$condicion="";}
$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
if (isset($_GET['pag'])){} else{$_GET['pag']=1;}
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;
$result = mysql_query("SELECT COUNT(*) FROM Empleado $condicion", $link); 
list($total) = mysql_fetch_row($result);
$tampag = $show;
$reg1 = ($pag-1) * $tampag;
$result = mysql_query("SELECT * FROM Empleado $condicion order by $sort  
  LIMIT $reg1, $tampag", $link); 
$_GET["accela"]=$accela;
$_GET["quest"]=$quest;
$_GET["sort"]=$sort;
$_GET["show"]=$show;
  function paginar($actual, $total, $por_pagina, $enlace) {
  $pag = ($_GET['pag']);   
  $total_paginas = ceil($total/$por_pagina);
  $anterior = $actual - 1;
  $posterior = $actual + 1;
  $texto = "<table border=0 cellpadding=0 cellspacing=0 width=100% height=28><form name=jumpto method=get><tr><td width=15>&nbsp;</td><td width=80><font color=#000000>Ir a la página</font></td><td width=5>&nbsp;</td><td width=30><select name=\"url\" onchange=\"return jump(this);\">";
for($isabel=1; $isabel<=$total_paginas; $isabel++)
{ 
if($pag==$isabel){    $texto .= "<option selected value=\"$enlace$isabel\">$isabel</option> ";} else {
    $texto .= "<option $thisis value=\"$enlace$isabel\">$isabel</option> ";}
} 	
$pag = ($_GET['pag']); 
if (!isset($pag)) $pag = 1;
$texto .= "</select></td><td width=5>&nbsp;</td><td width=30><font color=#000000>de ".$total_paginas."</font></td><td>&nbsp;</td></tr></form></table>";
  
  return $texto;
  
}
#
  echo paginar($pag, $total, $tampag, "mainframe.php?module=usuarios&quest=$quest&sort=$sort&show=$show&pag=");
#
if (mysql_num_rows($result)){ 
echo'<table width="100%" border="0" cellspacing="3" cellpadding="3" class="mainTable">
                    <tr> 
                      <th>Nombre</th>
                      <th>Usuario</th>					  
                      <th>Tipo</th>					  				  
                      <th>Teléfono casa</th>
                      <th>Teléfono celular</th>					  
                      <th>Email</th>					  
                      <th>Operación</th></tr>';
$bgcolor="#cccccc";
  while ($row = @mysql_fetch_array($result)) { 
	$class = ($i++%2==0)? "even" : "odd";
  echo'                <tr class="'.$class.'"> 
<td>'.$row["nombre"].'</td>
<td>'.$row["usuario"].'</td>
<td>'.$row["tipo"].'</td>
<td>'.$row["telefonoCasa"].'</td>
<td>'.$row["telefonoCelular"].'</td>
<td><a href="mailto:'.$row["email"].'">'.$row["email"].'</a></td>
<td>';
$checa_array1=array_search("1_d",$explota_permisos);
if($checa_array1===FALSE){} else{echo' <a href="?module=detail_usuarios&idEmpleado='.$row["idEmpleado"].'">Detalle</a> ';}
$checa_array1=array_search("1_c",$explota_permisos);
if($checa_array1===FALSE){} else{echo' <a href="?module=admin_usuarios&accela=edit&idEmpleado='.$row["idEmpleado"].'">Editar</a> ';}
$checa_array1=array_search("1_b",$explota_permisos);
if($checa_array1===FALSE){} else{echo' <a href="javascript:confirmDelete(\'process.php?module=usuarios&accela=delete&idEmpleado='.$row["idEmpleado"].'\',\'al empleado '.$row["nombre"].'\')" onMouseover="window.status=\'\'; return true" onClick="window.status=\'\'; return true">Eliminar</a> ';}
echo'</td></tr>
';
  }  
echo'</table>';
  }
else{echo'<center><b>No hay resultados</b></center>';}
  echo paginar($pag, $total, $tampag, "mainframe.php?module=usuarios&quest=$quest&sort=$sort&show=$show&pag=");
?>
</td></tr></table>