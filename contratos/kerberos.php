<?php

#die();

include('conf.php'); 

if($claes=="logout"){

session_start();

session_unregister("valid_user");

session_unregister("valid_userid");

session_unregister("valid_clienteid");

session_destroy();

$mensaje = "Finalizando sesi�n";

$luura="index.php?logout=yes";

$opera="#4C718C"; 

}

else{

$conexion = mysql_connect($host,$username,$pass);

mysql_select_db ("$database", $conexion);

$query = mysql_query("SELECT * FROM `webservice` WHERE `usuario` = '$_POST[user]'");

$array = mysql_fetch_array($query);

$arrayusuario = ($array["usuario"]); 

$arraypassword = ($array["contrasena"]);

$vacontrato1 = ($array["contrato1"]);

$vacontrato2 = ($array["contrato2"]);

$vacontrato3 = ($array["contrato3"]);

$vacontrato4 = ($array["contrato4"]);

$vacontrato5 = ($array["contrato5"]);

$userid = ($array["idusuario"]);

if(mysql_num_rows($query) != 0) {

if ($_POST["user"]=="$arrayusuario" && $_POST["password"]=="$arraypassword"){





session_start();

$valid_user=$_POST[user];

session_register( "valid_user" );

session_register("valid_userid");

session_register("contrato1");

session_register("contrato2");

session_register("contrato3");

session_register("contrato4");

session_register("contrato5");

$valid_userid = $userid;		

$contrato1 = $vacontrato1;

$contrato2 = $vacontrato2;

$contrato3 = $vacontrato3;

$contrato4 = $vacontrato4;

$contrato5 = $vacontrato5;

$mensaje="Usuario Autorizado<p>Redirigiendo<p>";

$luura="mainframe.php";

$opera="#4C718C";




if(isset($remember) && $remember=="yes"){

setcookie("login_data","$_POST[user]---divisor---$_POST[password]",time()+86400*30);

}

else{

setcookie("login_data","",time()-86400*30);

}



} else {

$mensaje = "Error: contrase&ntilde;a incorrecta";

$luura="index.php?errorcode=2";

$opera="#cc0000";

}

} else {

$mensaje = "Error: Usuario Incorrecto";

$luura="index.php?errorcode=1";

$opera="#cc0000";

}

}

?>



<? echo'



<html><head><title>Kerberos</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">



<link href="style_1.css" rel="stylesheet" type="text/css">



</head>



<body text="#000000" link="#000000" vlink="#000000" alink="#000000" scroll=no>



<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">



  <tr>



    <td><div align="center">



<table border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse"



bordercolor="#ffffff" width="450">



          <tr>



            <td bgcolor="'.$opera.'" background="img/bar_1.gif">&nbsp;</td>



          </tr>



          <tr>



            <td bgcolor="#ffffff"><center><b>'.$mensaje.'</b><p><script language="javascript">



var loadedcolor=\'#163058\' ;       // PROGRESS BAR COLOR



var unloadedcolor=\'lightgrey\';     // COLOR OF UNLOADED AREA



var bordercolor=\'navy\';            // COLOR OF THE BORDER



var barheight=15;                  // HEIGHT OF PROGRESS BAR IN PIXELS



var barwidth=200;                  // WIDTH OF THE BAR IN PIXELS



var waitTime=1;                   // NUMBER OF SECONDS FOR PROGRESSBAR







// THE FUNCTION BELOW CONTAINS THE ACTION(S) TAKEN ONCE BAR REACHES 100%.



// IF NO ACTION IS DESIRED, TAKE EVERYTHING OUT FROM BETWEEN THE CURLY BRACES ({})



// BUT LEAVE THE FUNCTION NAME AND CURLY BRACES IN PLACE.



// PRESENTLY, IT IS SET TO DO NOTHING, BUT CAN BE CHANGED EASILY.



// TO CAUSE A REDIRECT TO ANOTHER PAGE, INSERT THE FOLLOWING LINE:



// window.location="http://redirect_page.html";



// JUST CHANGE THE ACTUAL URL OF COURSE :)







var action=function()



{



window.location="'.$luura.'"



}







//*****************************************************//



//**********  DO NOT EDIT BEYOND THIS POINT  **********//



//*****************************************************//







var ns4=(document.layers)?true:false;



var ie4=(document.all)?true:false;



var blocksize=(barwidth-2)/waitTime/10;



var loaded=0;



var PBouter;



var PBdone;



var PBbckgnd;



var Pid=0;



var txt=\'\';



if(ns4){



txt+=\'<table border=0 cellpadding=0 cellspacing=0><tr><td>\';



txt+=\'<ilayer name="PBouter" visibility="hide" height="\'+barheight+\'" width="\'+barwidth+\'" onmouseup="hidebar()">\';



txt+=\'<layer width="\'+barwidth+\'" height="\'+barheight+\'" bgcolor="\'+bordercolor+\'" top="0" left="0"></layer>\';



txt+=\'<layer width="\'+(barwidth-2)+\'" height="\'+(barheight-2)+\'" bgcolor="\'+unloadedcolor+\'" top="1" left="1"></layer>\';



txt+=\'<layer name="PBdone" width="\'+(barwidth-2)+\'" height="\'+(barheight-2)+\'" bgcolor="\'+loadedcolor+\'" top="1" left="1"></layer>\';



txt+=\'</ilayer>\';



txt+=\'</td></tr></table>\';



}else{



txt+=\'<div id="PBouter" onmouseup="hidebar()" style="position:relative; visibility:hidden; background-color:\'+bordercolor+\'; width:\'+barwidth+\'px; height:\'+barheight+\'px;">\';



txt+=\'<div style="position:absolute; top:1px; left:1px; width:\'+(barwidth-2)+\'px; height:\'+(barheight-2)+\'px; background-color:\'+unloadedcolor+\'; font-size:1px;"></div>\';



txt+=\'<div id="PBdone" style="position:absolute; top:1px; left:1px; width:0px; height:\'+(barheight-2)+\'px; background-color:\'+loadedcolor+\'; font-size:1px;"></div>\';



txt+=\'</div>\';



}







document.write(txt);







function incrCount(){



window.status="Loading...";



loaded++;



if(loaded<0)loaded=0;



if(loaded>=waitTime*10){



clearInterval(Pid);



loaded=waitTime*10;



setTimeout(\'hidebar()\',100);



}



resizeEl(PBdone, 0, blocksize*loaded, barheight-2, 0);



}







function hidebar(){



clearInterval(Pid);



window.status=\'\';



//if(ns4)PBouter.visibility="hide";



//else PBouter.style.visibility="hidden";



action();



}







//THIS FUNCTION BY MIKE HALL OF BRAINJAR.COM



function findlayer(name,doc){



var i,layer;



for(i=0;i<doc.layers.length;i++){



layer=doc.layers[i];



if(layer.name==name)return layer;



if(layer.document.layers.length>0)



if((layer=findlayer(name,layer.document))!=null)



return layer;



}



return null;



}







function progressBarInit(){



PBouter=(ns4)?findlayer(\'PBouter\',document):(ie4)?document.all[\'PBouter\']:document.getElementById(\'PBouter\');



PBdone=(ns4)?PBouter.document.layers[\'PBdone\']:(ie4)?document.all[\'PBdone\']:document.getElementById(\'PBdone\');



resizeEl(PBdone,0,0,barheight-2,0);



if(ns4)PBouter.visibility="show";



else PBouter.style.visibility="visible";



Pid=setInterval(\'incrCount()\',95);



}







function resizeEl(id,t,r,b,l){



if(ns4){



id.clip.left=l;



id.clip.top=t;



id.clip.right=r;



id.clip.bottom=b;



}else id.style.width=r+\'px\';



}







window.onload=progressBarInit;			



</script><p><a href="'.$luura.'">Si su navegador no lo redirige autom�ticamente, haga click aqu�.</a><br><br></center></td>



          </tr>



          <tr>



            <td bgcolor="'.$opera.'" background="img/bar_1.gif">&nbsp;</td>



          </tr>



        </table>



      </div></td>



  </tr>



</table>



</body></html>



';?>