<?
function consulta_mysql($query)
{
  include "conf.php";
  mysql_connect($host,$username,$pass);
  mysql_select_db($database);
  
  $result=mysql_query($query) or die (mysql_error()."<br><b>Consulta:</b> $query");
  
  return $result;
}

function select($datos,$tabla,$condiciones="")
{
  $query="SELECT $datos FROM $tabla";
  if($condiciones!="")
  {
    $query.=" $condiciones";
  }
  $result=consulta_mysql($query);
  return $result;
}

function getDato($dato,$tabla,$condicion)
{
	$result=consulta_mysql("SELECT $dato FROM $tabla $condicion");
	if(mysql_num_rows($result)!=0)
		return mysql_result($result,0,$dato);
	else
		return "";
}
?>
