<?
if ( session_is_registered( "valid_user" ) && session_is_registered( "valid_modulos" ) && session_is_registered( "valid_permisos" ))
{}
else {
header("Location: index.php?errorcode=3");
}
$checa_arrayx=array_search("accesocl",$explota_modulos);

if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';

die();} else{}

?>



<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr>
            <td><span class="maintitle">Usuarios Acceso a Clientes</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>



 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            



            <td width="400">&nbsp; 

 </td>



   



            <td>&nbsp;</td>





          </tr>



        </table>



      </td>



  </tr>







<tr><td>

<?

$db = mysqli_connect($host,$username,$pass);

//mysql_select_db($database,$db);

$result = mysqli_query("SELECT * from accesocl where idusuario = '$idusuario'",$db);

$usuario=mysql_result($result,0,"usuario");

$contrasena=mysql_result($result,0,"contrasena");

$nombre=mysql_result($result,0,"nombre");

$email=mysql_result($result,0,"email");

$contrato1=mysql_result($result,0,"contrato1");

$contrato2=mysql_result($result,0,"contrato2");

$contrato3=mysql_result($result,0,"contrato3");

$contrato4=mysql_result($result,0,"contrato4");

$contrato5=mysql_result($result,0,"contrato5");

$permicl_enlatados=mysql_result($result,0,"permisos");

$activo=mysql_result($result,0,"activo"); 




?>

<table width="100%%" border="0" cellspacing="3" cellpadding="3">

  <tr>

    <td colspan="2" align="center" bgcolor="#bbbbbb"><b>Detalles del usuario: <? echo ' '.$usuario.' ';?></b></td>

    </tr>

  <tr>

    <td width="50%" bgcolor="#CCCCCC"><strong>Nombre:</strong> <? echo $nombre?></td>



    </tr>

  <tr>

    <td><strong>Usuario:</strong> <? echo $usuario?></td>



    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Email:</strong> <? echo $email?></td>



    </tr>

  <tr>

    <td><strong>Contrato 1:</strong> <? echo $contrato2?></td>

  

    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Contrato 2:</strong> <? echo $contrato2?></td>

  

    </tr>

  <tr>

    <td><strong>Contrato 3:</strong> <? echo $contrato3?></td>

   

    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Contrato 4:</strong> <? echo $contrato4?></td>



  </tr>
  
    <tr>

    <td bgcolor="#CCCCCC"><strong>Contrato 5:</strong> <? echo $contrato5?></td>



  </tr>
  
  <tr>
  
 
  
 

</table>





</td></tr></table>