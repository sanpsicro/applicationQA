<?php
   include_once("../conf.php");
   include("ConsultasCabina.php");
   conectar();
   if($BUSRES = mysql_query($SQLCABINA["Buscar"])){
       $BUSQUEDA = mysql_fetch_assoc($BUSRES);
       if(mysql_num_rows($BUSRES) == 1){
           $SEL = $BUSQUEDA;
       }
       echo "<!-- $SQLCABINA[Buscar] -->";
   }else{
         echo $SQLCABINA["Buscar"];
   }
?>
<form action="" method="GET">
<table>
<tr>
<td>Num. Poliza: </td>
<td>
<input type="text" name="sNumPoliza" value="<?php echo $_GET["sNumPoliza"]; ?>">
</td>

<td>Nombre:</td>
<td>
<input type="text" name="sNombre" value="<?php echo $_GET["sNombre"]; ?>">
</td>

<td>ID:</td>
<td>
<input type="text" name="sId" value="<?php echo $_GET["sId"]; ?>">
</td>

<td>
<input type="submit" name="BtnBuscar" value="Buscar">
</td>

</tr>
<tr>
<td colspan="7"><?php echo $SEL["nombre"]; ?> - <?php echo $SEL["numPoliza"]; ?> (<? echo $SEL["idUsuarioFinal"]; ?>)</td>
</tr>
</table>
</form>
