<? 
#Database
$host="localhost"; 
$username="plataforma2017_Q"; 
$pass="XwF3!7kuW+hS"; 
$database="opcyons_opcyon";
#misc
$unixid = time(); 
#ajax & misc
if(!function_exists('conectar')):
	function conectar()
	{
		mysqli_connect("localhost","plataforma2017_Q","XwF3!7kuW+hS","opcyons_opcyon");
		////mysql_select_db("opcyons_opcyon");
	}
endif;
if(!function_exists('conectar')):
function desconectar()
{
	mysqli_close();
}	    
endif;
?>