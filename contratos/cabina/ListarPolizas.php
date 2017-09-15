<?
 if(!isset($BUSRES)||(@mysql_num_rows($BUSRES) <= 1)){
     if(isset($_GET["BtnBuscar"])&&(@mysql_num_rows($BUSRES) <= 0)){
         echo "No existen registros con los datos Seleccionados";
     }
 }
 else{
     echo "<table class=DataTable><tr class=DataHead><td>Nombre</td><td>NumPoliza</td><td>ID</td>";
     if(@mysql_data_seek($BUSRES,0)){
        while($DATA = mysql_fetch_assoc($BUSRES)){
           echo "<tr><td>$DATA[nombre]</td><td><a href=\"?sNumPoliza=$DATA[numPoliza]\">$DATA[numPoliza]</a></td><td><a href=\"?sNumPoliza=$DATA[numPoliza]&sId=$DATA[idUsuarioFinal]\">$DATA[idUsuarioFinal]</a></td></tr>";
        }
     }
    echo "</table>";
 }
?>
