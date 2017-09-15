<? if(empty($_SESSION["valid_user"])){die();} 

$explota_modulos=explode(",",$_SESSION["valid_modulos"]);

?> 
<table width="218" border="0" cellspacing="0" cellpadding="0">
             <tr> 
                <td valign="top">
				<div class="bienvenida">
				Bienvenido <? echo $valid_nombre;?>
				</div>
				<ul class="mainMenu">
					<li><a href="?module=main">Home</a></li>
					<?	
					if(array_search("usuarios",$explota_modulos)!==FALSE){?>
						<li><a href="?module=usuarios">Usuarios</a></li>
					<?}
					if(array_search("clientes",$explota_modulos)!==FALSE){?>
						<li><a href="?module=clientes">Clientes</a></li>
					<?}
					if(array_search("contratos",$explota_modulos)!==FALSE){?>
						<li><a href="?module=contratos">Contratos</a></li>
					<?}
					if(array_search("4_v",$explota_permisos)!==FALSE){?>
						<li><a href="?module=validaciones">Validaciones</a></li>
					<?}
					if(array_search("servicios",$explota_modulos)!==FALSE){?>
						<li><a href="?module=servicios">Servicios</a></li>
						<li><a href="?module=productos">Productos</a></li>
					<?}
					if(array_search("proveedores",$explota_modulos)!==FALSE){?>
						<li><a href="?module=proveedores">Proveedores</a></li>
                        <?}
					if(array_search("proveedores",$explota_modulos)!==FALSE){?>
						<li><a href="?module=buscador_proveedor" target="_blank">Buscador Proveedores</a></li>
					<?}
					if(array_search("ventas",$explota_modulos)!==FALSE){?>
						<li><a href="?module=ventas">Ventas</a></li>
					<?}
					if(array_search("cabina",$explota_modulos)!==FALSE){?>
						<li><a href="?module=cabina">Cabina</a></li>
					<?}
					if(array_search("seguimiento",$explota_modulos)!==FALSE){?>
						<li><a href="?module=seguimiento">Seguimiento</a></li>
					<?}
					if(array_search("pagos",$explota_modulos)!==FALSE){?>
						<li><a href="?module=control_pagos">Control de Pagos</a></li>
						<li><a href="?module=control_cobranza">Control de Cobranza</a></li>
					<?}
					if(array_search("evaluaciones",$explota_modulos)!==FALSE){?>
						<li><a href="?module=evaluaciones">Evaluaciones</a></li>
					<?}
					if(array_search("comisiones_vendedores",$explota_modulos)!==FALSE){?>
						<li><a href="?module=comisiones_vendedores">Comisiones de vendedores</a></li>
					<?}
					if(array_search("facturacion",$explota_modulos)!==FALSE){?>
						<li><a href="?module=facturacion">Facturaci&oacute;n</a></li>
						<li><a href="?module=notasremision">Notas de Remision</a></li>
					<?}
					if(array_search("exportacion",$explota_modulos)!==FALSE){?>
						<li><a href="?module=exportacion">Reportes</a></li>
					<?}
					if(array_search("vencimientos",$explota_modulos)!==FALSE){?>
						<li><a href="?module=vencimientos">Vencimientos</a></li>
					<?}?>
				</ul>
				</td>
              </tr>
<?
$checa_array1=array_search("cabina",$explota_modulos);

if($checa_array1===FALSE){} else{

$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT COUNT(*) FROM general where status='abierto'", $link); 
list($total) = mysql_fetch_row($result);

$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT COUNT(*) FROM general left join seguimiento_juridico on (general.id = seguimiento_juridico.general) where (general.status='abierto' or general.status='en tramite') AND seguimiento_juridico.situacion_juridica='detenido'", $link); 
list($total2) = mysql_fetch_row($result);

$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT COUNT(*) FROM general left join seguimiento_juridico on (general.id = seguimiento_juridico.general) where (general.status='abierto' or general.status='en tramite') AND seguimiento_juridico.situacion_vehiculo='detenido'", $link); 
list($total3) = mysql_fetch_row($result);

$hora=date("H");
$minuto=date("i");
$segundo=date("s");
$mes=date("m");
$dia=date("d");
$ano=date("Y");

$timelimit=date("Y-m-d H:i:s", mktime($hora-1,$minuto-30,$segundo,$mes,$dia,$ano));
#echo $timelimit;
$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
/*
$result = mysql_query("SELECT COUNT(*) FROM general left join bitacora on (general.id = bitacora.general) left join notas_legal on (general.id =  notas_legal.general)  where (general.status='abierto' or general.status='en tramite') AND (notas_legal.fecha<='$timelimit' or bitacora.fecha<='$timelimit')", $link); 

$result = mysql_query("SELECT COUNT(*) FROM general left join bitacora on (general.id = bitacora.general) left join notas_legal on (general.id =  notas_legal.general)  where (general.status='abierto' or general.status='en tramite') AND (notas_legal.fecha<='$timelimit' or bitacora.fecha<='$timelimit')", $link); 
*/

$result = mysql_query("SELECT COUNT(*) FROM general where general.status='abierto' AND general.ultimoseguimiento<='$timelimit'", $link); 

list($total4) = mysql_fetch_row($result);


############

$link = mysql_connect($host, $username, $pass); 
mysql_select_db($database, $link); 
$result = mysql_query("SELECT COUNT(*) FROM general where contacto!='0000-00-00 00:00:00' AND apertura_expediente!='0000-00-00 00:00:00' AND status='abierto' AND (TimeDiff(contacto,apertura_expediente)) >= '00:45:00'", $link); 
list($total5) = mysql_fetch_row($result);


echo '
<tr>
<td>

<div id="alertas">
<div class="alertasTitulo">Alertas</div>
<ul class="alertas">
	<li>
		<a href="?module=seguimiento&display=abierto">
			Existen '.$total.' Servicios en Proceso de Atención
		</a>
	</li>
	<li>
		<a href="?module=seguimiento&display=abierto_tramite&moko=conductor_detenido">
			Existen '.$total2.' usuarios detenidos
		</a>
	</li>
	<li>
		<a href="?module=seguimiento&display=abierto_tramite&moko=vehiculo_detenido">
			Existen '.$total3.'  vehículos detenidos
		</a>
	</li>
	<li>
		<a href="?module=seguimiento&display=abierto&moko=fkrucm">
			Existen '.$total4.' SERVICIOS SIN SEGUIMIENTO EN 1:30 HORAS
		</a>
	</li>
	<li>
		<a href="?module=seguimiento&display=abierto&moko=fkrucmsh">
			Existen '.$total5.' ASUNTOS CON UN TIEMPO MAYOR A 45 MINUTOS DE CONTACTO
		</a>
	</li>
</ul>
</div>
';} ?>
</td>
</tr>
  </table>