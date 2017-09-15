<?php
include("ConsultasCabina.php");
if(isset($SEL["idPoliza"])&&$SEL["idPoliza"]>0){
       echo "<!-- $SQLCABINA[EnGracia] -->";
   $MSGRES = @mysql_query($SQLCABINA["EnGracia"]);
   $MSGVAL = @mysql_fetch_assoc($MSGRES);
   if($MSGVAL["VALUE"]){
      GetMessage("Usuario en Periodo de Gracia",0,0);
   }
       echo "<!-- $SQLCABINA[SinDerecho] -->";
   $MSGRES = @mysql_query($SQLCABINA["SinDerecho"]);
   $MSGVAL = @mysql_fetch_assoc($MSGRES);
   if($MSGVAL["VALUE"]){
      GetMessage("La poliza a caducado o esta cancelada",1,0);
   }
       echo "<!-- $SQLCABINA[Libre] -->";
   $MSGRES = @mysql_query($SQLCABINA["Libre"]);
   $MSGVAL = @mysql_fetch_assoc($MSGRES);
   if($MSGVAL["VALUE"]){
      GetMessage("Poliza Vigente",0,1);
   }
}

if(isset($_GET["idProducto"])){
       echo "<!-- $SQLCABINA[ObtenerIncidentes] -->";
   $MSGRES = @mysql_query($SQLCABINA["ObtenerIncidentes"]);
   $MSGVAL = @mysql_fetch_assoc($MSGRES);
   if(!$MSGVAL["MENOR"]){
      GetMessage("Numero de Eventos excedidos",0,1);
   }else{
      echo "<script language=JavaScript> document.location = 'AltaExpediente.php'; </script>";
   }
}
function GetMessage($VALUE,$URGENTE,$SIMPLE){
if($URGENTE)
 $class = "MensajeUrgente";
else if ($SIMPLE)
 $class = "MensajeSimple";
else
 $class = "MensajeIntermedio";
?>
<table border=1 class="<?php echo $class; ?>">
<tr>
<td>
<?php echo $VALUE; ?>
</td>
</tr>
</table>

<?php
}
?>
