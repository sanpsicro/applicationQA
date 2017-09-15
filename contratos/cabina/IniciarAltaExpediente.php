<?
   include("ConsultasCabina.php");
  if(isset($SEL["idPoliza"])){
     echo "<form action=\"AltaExpediente.php\" method=\"GET\">";
     echo "<table class=NoBody><tr><td>Servicio:</td>";
     echo "<td>";
     echo "<input type=\"hidden\" name=\"idPoliza\" value=\"$SEL[idPoliza]\">";
     echo "<select size=4 name=\"idProducto\">";
     $PRORES = mysql_query($SQLCABINA["ObtenerProductos"]);
     echo "<!-- $SQLCABINA[ObtenerProductos] -->";
     while($DATA = mysql_fetch_assoc($PRORES)){
         echo "<option value=\"$DATA[idProducto]\">$DATA[Nombre]</option>";
     }
     echo "</select>";
     echo "</td></tr>";
     echo "<tr><td colspan=2><input type=\"submit\" name=\"Iniciar\" value=\"Iniciar\"></td></tr></table>";
     echo "</form>";
  }
?>
