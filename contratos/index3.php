<html>

<head>

<title>:: ACCESO A USUARIOS ::</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


<link href="login_style.css" rel="stylesheet" type="text/css">

<link href="css/style.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
</script>

</head>

<body scroll="no">



<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="kerberos.php?do=login" method="post">

	<!--HEADER-->
    <div class="header">
<div align="center">
   <img src="logohd.png" /><br>

    <!--TITLE--><h1>Acceso a Usuarios</h1><!--END TITLE-->

    </div>
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	<!--USERNAME--><input name="user" type="text" class="input username" value="Usuario" onFocus="this.value=''" /><!--END USERNAME-->
    <!--PASSWORD--><input name="password" type="password" class="input password" value="Password" onFocus="this.value=''" /><!--END PASSWORD-->
    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
    <div class="footer">
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="Entrar" class="button" />
    <!--END LOGIN BUTTON-->
    <!--REGISTER BUTTON--><!--END REGISTER BUTTON-->
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM--><br>
<div align="center">
              
	<? 

if(isset($errorcode) && $errorcode=="1"){echo'<p><b><font size=2>Usuario incorrecto</font></b>';} 

if(isset($errorcode) && $errorcode=="2"){echo'<p><b><font size=2>Contraseña incorrecta</font></b>';} 

if(isset($errorcode) && $errorcode=="3"){echo'<p><b><font size=2>Acceso Denegado</font></b>';} 

if(isset($errorcode) && $errorcode=="4"){echo'<p><b><font size=2>Usuario no activo</font></b>';} 

if(isset($logout) && $logout=="yes"){echo'<p><b><font size=2>Sesión Finalizada</font></b>';} 


?>		  

</div>
</div>
<!--END WRAPPER-->


</body>

</html>
