<?php  
if ( session_is_registered( "valid_user" ) && session_is_registered( "valid_modulos" ) && session_is_registered( "valid_permisos" ))
{}
else {
header("Location: index.php?errorcode=3");
}
$checa_arrayx=array_search("webservice",$explota_modulos);

if($checa_arrayx===FALSE){echo'Acceso no autorizado a este modulo';

die();} else{}

?>



<table border=0 width=100% cellpadding=0 cellspacing=0>



 <tr> 



      <td height="44" align="left"><table width=100% cellpadding=0 cellspacing=0><tr>
            <td><span class="maintitle">Usuarios Webservice</span></td><td width=150 class="blacklinks">&nbsp;</td></tr></table></td></tr>



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

<?php  

$db = mysqli_connect($host,$username,$pass,$database);

//mysql_select_db($database,$db);

$result = mysqli_query("SELECT * from webservice where idusuario = '$idusuario'",$db);

$usuario=mysql_result($result,0,"usuario");

$contrasena=mysql_result($result,0,"contrasena");

$nombre=mysql_result($result,0,"nombre");

$email=mysql_result($result,0,"email");

$contrato1=mysql_result($result,0,"contrato1");

$contrato2=mysql_result($result,0,"contrato2");

$contrato3=mysql_result($result,0,"contrato3");

$contrato4=mysql_result($result,0,"contrato4");

$contrato5=mysql_result($result,0,"contrato5");

$activo=mysql_result($result,0,"activo"); 




?>

<table width="100%%" border="0" cellspacing="3" cellpadding="3">

  <tr>

    <td colspan="2" align="center" bgcolor="#bbbbbb"><b>Detalles del usuario: <?php  echo ' '.$usuario.' ';?></b></td>

    </tr>

  <tr>

    <td width="50%" bgcolor="#CCCCCC"><strong>Nombre:</strong> <?php  echo $nombre?></td>



    </tr>

  <tr>

    <td><strong>Usuario:</strong> <?php  echo $usuario?></td>



    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Email:</strong> <?php  echo $email?></td>



    </tr>

  <tr>

    <td><strong>Contrato 1:</strong> <?php  echo $contrato2?></td>

  

    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Contrato 2:</strong> <?php  echo $contrato2?></td>

  

    </tr>

  <tr>

    <td><strong>Contrato 3:</strong> <?php  echo $contrato3?></td>

   

    </tr>

  <tr>

    <td bgcolor="#CCCCCC"><strong>Contrato 4:</strong> <?php  echo $contrato4?></td>



  </tr>
  
    <tr>

    <td bgcolor="#CCCCCC"><strong>Contrato 5:</strong> <?php  echo $contrato5?></td>



  </tr>

</table>





</td></tr></table>