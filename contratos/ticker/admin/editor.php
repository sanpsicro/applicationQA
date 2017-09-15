<?php

// configuration
$url = 'https://www.plataforma-aa.com/ticker/admin/editor.php';
$file = '../contenido.txt';

// check if form has been submitted
if (isset($_POST['text']))
{
    // save the text contents
    file_put_contents($file, $_POST['text']);

    // redirect to form again
    header(sprintf('Location: %s', $url));
    // printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
    exit();
}

// read the textfile
$text = file_get_contents($file);

?>
<html>
<head>
<title>Administrador de Ticker</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<style type="text/css">
h1 {
	font-family: Tahoma;
	}
div {
	width: 600px;
	}
li
{
	text-align: justify;
	}
</style>
</head>
<body>
<div align="center">
<div>
<h1>Administrador de Ticker</h1>

<!-- HTML form -->
<form action="" method="post">
<textarea name="text" cols="45" rows="15"><?php echo htmlspecialchars($text) ?></textarea><br /><br />
<input type="submit" />
<input type="reset" />
</form>
<p style="text-align: justify">
  <strong>INSTRUCCIONES:</strong>
  <ul>
<li>NO SE PERMITE USAR COMILLAS DOBLES Y/O SIMPLES ( &quot; ) ( ' )
<li>Para generar saltos de l&iacute;nea escriba: <strong>&lt;br /&gt;</strong></li>
<li>Para generar enlaces escriba: <strong>&lt;a href=http://www.sitio.com/enlace /&gt;<font color="#FF0000">texto</font>&lt;/a&gt;</strong> (Importante no agregar comillas)</li>
<li>Este Ticker permite cualquier etiqueta HTML, sin embargo cualquier error altera el funcionamiento del ticker, sin afecatr el funcionamiento de</li>
</ul>
</p> 
</div>
</div>