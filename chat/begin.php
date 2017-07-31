<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="chatstyle.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
</head>
<body>
<?php


require_once "class.Chat.php"; 
$chat = new Chat();
$chat->createChat($_GET['gr'],"bubbledLeft");
?>
</body>
</html>
