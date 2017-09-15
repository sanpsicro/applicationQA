<? 
#Database
$host="localhost"; 
$username="opcyons_opcyonet"; 
$pass="perpolas128"; 
$database="opcyons_opcyon";
#misc
$unixid = time(); 
#ajax & misc
if(!function_exists('conectar')):
	function conectar()
	{
		mysql_connect("localhost","opcyons_opcyonet","perpolas128");
		mysql_select_db("opcyons_opcyon");
	}
endif;
if(!function_exists('conectar')):
function desconectar()
{
	mysql_close();
}	    
endif;
?>