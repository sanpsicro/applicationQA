<?
session_start();
if ( session_is_registered( "valid_user" ) && session_is_registered( "valid_modulos" ) && session_is_registered( "valid_permisos" ))
{}
else {
header("Location: index.php?errorcode=3");
}
?>


			<? 

if(isset($tel) && ($extension)) {
				
echo ('
<form method="post" action="http://192.168.1.200/api/actions/call">
<input type="hidden" name="number" value="'.$tel.'">
<input type="hidden" name="extension" value="'.$extension.'">
<input type="submit" value="Llamar">

</form>


');
		
				}

			else{}

			?>

