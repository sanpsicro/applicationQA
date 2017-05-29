<?  


$checa_array1=array_search("cap_a",$explota_permisos);

if($checa_array1===FALSE){echo'Acceso no autorizado a este modulo';
die();} else{} ?>

<table border=0 width=100% cellpadding=0 cellspacing=0>




 <tr> 



      <td height="47" align="left"><table width="100%" border="0" cellspacing="3" cellpadding="3">



          <tr>



            



            <td width="400" 			class="questtitle"> 

			<? 

			if($accela=="new"){echo'Nueva Carpeta';}

			else{echo'Editar Carpeta';



			}

			?>



</td>







            <td>&nbsp;</td>



            <td align="right" class="questtitle">



            </td>



          </tr>



        </table>



      </td>



  </tr>







<tr><td bgcolor="#eeeeee">



<table border=0 width=100% cellpadding=0 cellspacing=0>

  <tr> 

    <td valign="top" bgcolor="#eeeeee"><table width="100%" border="0" cellspacing="5" cellpadding="5">

        <tr> 

          <td><table width="100%" height=100% border="1" cellpadding="6" cellspacing="0" bordercolor="#000000" bgcolor="#FFFFFF" class="contentarea1">

              <tr> 

                <td valign="top"> <div align="center">



<? if($accela=="edit" && isset($capid)){

$db = mysqli_connect($host,$username,$pass,$database);

//mysql_select_db($database,$db);

$result = mysqli_query("SELECT * from modcap where cid = '$capid'",$db);
$idpermi=mysql_result($result,0,"idpermi");
$nombre=mysql_result($result,0,"nombre");
$icon=mysql_result($result,0,"ico");
$activo=mysql_result($result,0,"activo");


}



echo'<form name="frm" method="post" action="process.php?module=capacitacion&accela='.$accela.'&capid='.$capid.'&parent='.$parent.'">';    





?>

<table width="100%%" border="0">

  <tr>

    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                  
      <tr>
        
        <td width="100" align="right" bgcolor="#cccccc"><strong>Nombre:</strong></td>
        
        <td width="200" bgcolor="#cccccc"><input name="nombre" type="text" id="nombre" size="50" value="<? echo"$nombre";?>" /> <input name="idpermi" type="hidden" id="idpermi" size="50" value="dir" /></td>
        
        </tr>
    
      
      <tr>
        
        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Folder:</strong></td>
        
               <td bgcolor="#FFFFFF" width="200" valign="top">
               
               <table border="0" cellspacing="0" cellpadding="5">
               <tr>
               <td><input type="radio" name="icon" value="azul.png" <? if($icon=="azul.png"){echo' checked';} ?> <? if (empty($icon)) { echo ' checked';} ?> /></td>
               <td><img src="icon/azul.png"  /></td>
               <td width="30"></td>
               <td><input type="radio" name="icon" value="aluminio.png" <? if($icon=="aluminio.png"){echo' checked';} ?> /></td>
               <td><img src="icon/aluminio.png"  /></td>
               <td width="30"></td>
               <td><input type="radio" name="icon" value="crema.png" <? if($icon=="crema.png"){echo' checked';} ?> /></td>
               <td><img src="icon/crema.png"  /></td>
               </tr>              
               <tr>
               <td><input type="radio" name="icon" value="gris.png" <? if($icon=="gris.png"){echo' checked';} ?> /></td>
               <td><img src="icon/gris.png"  /></td>
				<td width="30"></td>
               <td><input type="radio" name="icon" value="naranja.png" <? if($icon=="naranja.png"){echo' checked';} ?> /></td>
               <td><img src="icon/naranja.png"  /></td>
				<td width="30"></td>
               <td><input type="radio" name="icon" value="rojo.png" <? if($icon=="rojo.png"){echo' checked';} ?> /></td>
               <td><img src="icon/rojo.png"  /></td>
               </tr>
               
               <tr>
               <td><input type="radio" name="icon" value="rosa.png" <? if($icon=="rosa.png"){echo' checked';} ?> /></td>
               <td><img src="icon/rosa.png"  /></td>
               <td width="30"></td>
               <td><input type="radio" name="icon" value="verde.png" <? if($icon=="verde.png"){echo' checked';} ?> /></td>
               <td><img src="icon/verde.png"  /></td>
               <td width="30"></td>
               <td></td>
               <td></td>
               </tr>
              
               </table>
     </td>
        </tr>
      
          <tr>
        
        <td width="100" align="right" valign="top" bgcolor="#cccccc"><strong>Activo:</strong></td>
        
               <td bgcolor="#FFFFFF" width="200" valign="top">
               
               <select name="activo" id="activo">

          <option value="1" <? if($activo=="1"){echo' selected';} ?>>Si</option>

          <option value="0" <? if($activo=="0"){echo' selected';} ?>>No</option>

        </select>   
                             
               
     </td>
        </tr>
      
      
      </table>
      
    </td>

    </tr>

</table>

<input type="submit" name="Submit" value="Guardar"/> 
&nbsp; 

                      <input type="reset" name="Submit2" value="Reestablecer" />                      </form>

                </div>

                </td>

              </tr>

            </table></td>

        </tr>

      </table></td>

  </tr>

</table>





</td></tr></table>