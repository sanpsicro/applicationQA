<?
session_start();
if(empty($_SESSION["valid_user"])){die();} 
$unixid = time(); 
include('conf.php'); 

$link = mysqli_connect($host, $username, $pass); 
//mysql_select_db($database, $link); 



################################################################################


#----------------



if(isset($actuar) && $actuar=="new" && $proximos=="recuerdame"){


$privacidad = (isset($_POST['privacidad'])) ? 1 : 0;

mysqli_connect($host,$username,$pass);

mysql_db_query($database,"INSERT INTO `recordatorios` ( `empleado`, `recordatorio`, `general`, `hora`, `visto`, `privacidad`) 

VALUES ('$userid', '$recordatorio', '$expediente', '$recordate', '$visto', '$privacidad')"); 


echo '
<script>
function cierralo() {
parent.jQuery.fancybox.close();
}
cierralo();
</script> 
'; 

}

#=====

#----------------



if(isset($actuar) && $actuar=="new" && $proximos!="recuerdame"){

$hora=date("H");
$minuto=date("i");
$segundo=date("s");
$mes=date("m");
$dia=date("d");
$ano=date("Y");

$newtime=date("Y-m-d H:i:s", mktime($hora,$minuto+$proximos,$segundo,$mes,$dia,$ano));

$privacidad = (isset($_POST['privacidad'])) ? 1 : 0;

mysqli_connect($host,$username,$pass);

mysql_db_query($database,"INSERT INTO `recordatorios` ( `empleado`, `recordatorio`, `general`, `hora`, `visto`, `privacidad`) 

VALUES ('$userid', '$recordatorio', '$expediente', '$newtime', '$visto', '$privacidad')"); 

echo '
<script>
function cierralo() {
parent.jQuery.fancybox.close();
}
cierralo();
</script> 
';

}

#=====


if(isset($actuar) && $actuar=="snooze5"){




$hora=date("H");
$minuto=date("i");
$segundo=date("s");
$mes=date("m");
$dia=date("d");
$ano=date("Y");

$newtime=date("Y-m-d H:i:s", mktime($hora,$minuto+5,$segundo,$mes,$dia,$ano));


mysqli_connect($host,$username,$pass);

$sSQL="UPDATE recordatorios SET hora='$newtime' where id='$id'";

mysql_db_query($database, "$sSQL");

echo '
<script>
function cierralo() {
parent.jQuery.fancybox.close();
}
cierralo();
</script>
';

}



#=====

#=====



if(isset($actuar) && $actuar=="snooze10"){




$hora=date("H");
$minuto=date("i");
$segundo=date("s");
$mes=date("m");
$dia=date("d");
$ano=date("Y");

$newtime=date("Y-m-d H:i:s", mktime($hora,$minuto+10,$segundo,$mes,$dia,$ano));


mysqli_connect($host,$username,$pass);

$sSQL="UPDATE recordatorios SET hora='$newtime' where id='$id'";

mysql_db_query($database, "$sSQL");

echo '
<script>
function cierralo() {
parent.jQuery.fancybox.close();
}
cierralo();
</script>
';

}



#=====

#=====



if(isset($actuar) && $actuar=="snooze15"){




$hora=date("H");
$minuto=date("i");
$segundo=date("s");
$mes=date("m");
$dia=date("d");
$ano=date("Y");

$newtime=date("Y-m-d H:i:s", mktime($hora,$minuto+15,$segundo,$mes,$dia,$ano));


mysqli_connect($host,$username,$pass);

$sSQL="UPDATE recordatorios SET hora='$newtime' where id='$id'";

mysql_db_query($database, "$sSQL");

echo '
<script>
function cierralo() {
parent.jQuery.fancybox.close();
}
cierralo();
</script>
';

}



#=====



if(isset($actuar) && $actuar=="expediente"){




$hora=date("H");
$minuto=date("i");
$segundo=date("s");
$mes=date("m");
$dia=date("d");
$ano=date("Y");

$newtime=date("Y-m-d H:i:s", mktime($hora,$minuto+5,$segundo,$mes,$dia,$ano));


mysqli_connect($host,$username,$pass);

$sSQL="UPDATE recordatorios SET hora='$newtime' where id='$id'";

mysql_db_query($database, "$sSQL");

echo '
<script type="text/javascript">
window.onload = window.parent.location.href = "mainframe.php?module=detail_seguimiento&id='.$general.'";
</script>

';

}



#=====





if(isset($actuar) && $actuar=="olvidar"){




mysqli_connect($host,$username,$pass);

$sSQL="UPDATE recordatorios SET visto=1 where id='$id'";

mysql_db_query($database, "$sSQL");

echo '
<script>
function cierralo() {
parent.jQuery.fancybox.close();
}
cierralo();
</script>
';

}



#=====


if(isset($actuar) && $actuar=="qtiper"){




mysqli_connect($host,$username,$pass);
$sSQL="UPDATE Empleado SET qtip=now() where idEmpleado='$userid'";
mysql_db_query($database, "$sSQL");


mysqli_connect($host,$username,$pass);
$sSQL="UPDATE quicktips SET visto = visto + 1 where id='$id'";
mysql_db_query($database, "$sSQL");


echo '
<script>
function cierralo2() {
parent.jQuery.fancybox.close();
}
cierralo2();
</script>
';

}



#=====


?>