<?
$checa_arrayx=array_search("contratos",$explota_modulos);
if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{}
if(empty($show)){$show=10;}
if(empty($sort)){$sort="numPoliza";}
?>
<table border=0 width=100% cellpadding=0 cellspacing=0>
 <tr> 
      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr><td><span class="maintitle">Pago a Proveedores</span></td><td width=150 class="blacklinks"><?
$checa_array1=array_search("4_a",$explota_permisos);
if($checa_array1===FALSE){} else{echo'[ <a href="?module=pagos&accela=new">Nuevo Pago</a> ]';} ?></td></tr></table></td></tr>
 <tr> 
      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <form name="form1" method="post" action="bridge.php?module=contratos<? if($quest!=""){echo"&quest=$quest";}?>">
            <td width="400"> 
              <select name="show" id="mostrar">
                <option value="10" <? if($show=="10"){echo"selected";}?>>10 por p&aacute;gina</option>
                <option value="20"  <? if($show=="20"){echo"selected";}?>>20 por p&aacute;gina</option>
                <option value="30"  <? if($show=="30"){echo"selected";}?>>30 por p&aacute;gina</option>
                <option value="50"  <? if($show=="50"){echo"selected";}?>>50 por p&aacute;gina</option>
                <option value="100"  <? if($show=="100"){echo"selected";}?>>100 por p&aacute;gina</option>
                <option value="200"  <? if($show=="200"){echo"selected";}?>>200 por p&aacute;gina</option>
              </select>
              <select name="sort" id="ordenar">
                <option value="numPoliza" <? if($sort=="numPoliza"){echo"selected";}?>>Ordenar por N&uacute;mero de contrato</option>
                <option value="fechaCaptura" <? if($sort=="fechaCaptura"){echo"selected";}?>>Ordenar por fecha de captura</option>                
<!--                 <option value="Poliza.status" <? if($sort=="Poliza.status"){echo"selected";}?>>Ordenar por status</option>				-->
              </select>
              <input type="submit" name="Submit2" value="Mostrar"> </td>
          </form>
            <td>&nbsp;</td>
<!--
            <form name="form1" method="post" action="bridge.php?module=contratos"><td align="right" class="questtitle">b&uacute;squeda: 
              <input name="quest" type="text" id="quest2" size="15" onattrmodified="g(this)" onpropertychange="g(this)" onkeydown="f(this)" onkeyup="f(this)" onblur="f(this)" onclick="f(this)"> <input type="submit" name="Submit" value="Buscar">
            </td></form>
          </tr>
-->
        </table>
      </td>
  </tr>
<tr><td>
<?
if(isset($code) && $code=="1"){echo'<br><b><div class="xplik">Nuevo Contrato Registrado</div></b><p>';}
if(isset($code) && $code=="2"){echo'<br><b><div class="xplik">Datos del Contrato actualizados</div></b><p>';}
if(isset($code) && $code=="3"){echo'<br><b><div class="xplik">Contrato eliminado</div></b><p>';}
if(isset($code) && $code=="4"){echo'<br><b><div class="xplik">Error: El Contrato ya existe</div></b><p>';}
if($valid_tipo=="vendedor"){$subcondicion1=" AND Poliza.idEmpleado='$valid_userid'"; 
$subcondicion2="Where Poliza.idEmpleado='$valid_userid'";}
else{$subcondicion1=""; 
$subcondicion2="";}


if(isset($quest) && $quest!=""){



echo'<br><b><div class="xplik">Resultados de la b&uacute;squeda:</div></b><p>';



$condicion="where (Cliente.nombre like '%$quest%' OR numPoliza like '%$quest%') $subcondicion1";



}



else{$condicion=$subcondicion2;}



$link = mysql_connect($host, $username, $pass); 

mysql_select_db($database, $link); 

if (isset($_GET['pag'])){} else{$_GET['pag']=1;}

$pag = ($_GET['pag']); 

if (!isset($pag)) $pag = 1;

$result = mysql_query("SELECT COUNT(*) from Poliza left join 

Cliente on (Cliente.idCliente = Poliza.idCliente) $condicion", $link); 



list($total) = mysql_fetch_row($result);



$tampag = $show;



$reg1 = ($pag-1) * $tampag;



$result = mysql_query("SELECT idPoliza,Cliente.nombre,numPoliza,fechaCaptura,productos,Poliza.status as polstatus from Poliza left join 



Cliente on (Cliente.idCliente = Poliza.idCliente) $condicion order by $sort  



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



  $texto = "<table border=0 cellpadding=0 cellspacing=0 width=100% height=28><form name=jumpto method=get><tr><td width=15>&nbsp;</td><td width=80><font color=#000000>Ir a la p&aacute;gina</font></td><td width=5>&nbsp;</td><td width=30><select name=\"url\" onchange=\"return jump(this);\">";







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



  echo paginar($pag, $total, $tampag, "mainframe.php?module=contratos&quest=$quest&sort=$sort&show=$show&pag=");



#











if (mysql_num_rows($result)){ 



echo'<table width="100%" border="0" cellspacing="3" cellpadding="3">



                    <tr> 



                     <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Proveedor</b></td>				  	                     <td bgcolor="#BBBBBB" align=middle class="dataclass" width="200"><b>Concepto</b></td>
                     <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Monto</b></td>
                     <td bgcolor="#BBBBBB" align=middle class="dataclass"><b>Status</b></td></tr>';

$bgcolor="#cccccc";



  while ($row = @mysql_fetch_array($result)) { 

if($bgcolor=="#cccccc"){$bgcolor="#DCDCDC";} else{$bgcolor="#cccccc";}


$cvx=$row["fechaCaptura"];
$capdat=explode(" ",$cvx);

$fechaex=explode("-",$capdat[0]);

$producto=$row["productos"];

$dbv = mysql_connect($host,$username,$pass);
mysql_select_db($database,$dbv);
$resultv = mysql_query("SELECT * from productos where id = '$producto'",$dbv);
$producto=mysql_result($resultv,0,"producto");




  echo'                <tr> 

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["nombre"].'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$row["numPoliza"].'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass" align=middle>'.$fechaex[2].'/'.$fechaex[1].'/'.$fechaex[0].'</td>

<td bgcolor="'.$bgcolor.'" class="dataclass"><center>No Pagado</center></td></tr> 

';


  }  



echo'</table>';



  }



else{echo'<center><b>No hay resultados</b></center>';}



  echo paginar($pag, $total, $tampag, "mainframe.php?module=contratos&quest=$quest&sort=$sort&show=$show&pag=");







?>



</td></tr></table>