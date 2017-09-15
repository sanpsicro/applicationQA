<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>:: ACCESO A USUARIOS ::</title>




<link href="login_styleQA.css" rel="stylesheet" type="text/css">

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



<div style="width:0px; margin-right:500px; margin-left:auto; margin-top:150px;" >



<!--LOGIN FORM-->

<form name="login-form" class="" action="kerberos.php?do=login" method="post">

	<!--HEADER-->
    <div class="header" style="margin-bottom: 5px; "  >
    <div align="center"  >
    <!--TITLE-->
    <h1>Acceso  Usuarios</h1>
    <!--END TITLE-->
    </div>
    </div>
    <!--END HEADER-->
  
    
	
	<!--CONTENT-->
    <div class="content" align="center"   >
            <div style="margin-bottom:50px; " >
			<!--USERNAME-->
			<input name="user" type="text" class="input" value="USUARIO" onfocus="this.value=''" style="margin-top:80px; ">
			<!--END USERNAME-->
	    </div>
			
	    <div style="margin-bottom:40px;">
		    <!--PASSWORD-->
		    <input height="69px" name="password" type="password" class="input" value="CONTRASEÑA" onfocus="this.value=''">
		    <!--END PASSWORD-->
            </div>
		    <!--END CONTENT-->
		    
		    <!--FOOTER-->
		   
		    <!--LOGIN BUTTON--><input type="submit" name="submit" value="ENTRAR" class="button">
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
