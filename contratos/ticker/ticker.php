<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<LINK href="style.css" rel="stylesheet" type="text/css">
<title>ticker</title>
<base target="_blank" />
</head>
<body topmargin="4">
<div id="news_ticker">
<marquee onmouseover="stop()" onmouseout="start()" scrollamount="1" scrolldelay="200" direction="up" height="50" width="650">
<p>
<?php include("contenido.txt"); ?>
</p>
</marquee>
</div>

</body>
</html>
