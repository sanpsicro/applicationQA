<?
include("conf.php");

mysql_connect($host,$username,$pass);
mysql_select_db($database);

$id=$_POST['id'];
$tabla=$_POST['obj'];
$status=$_POST['status'];

$query="UPDATE $tabla SET status='$status' WHERE id='$id' LIMIT 1";
mysql_query($query)or die(mysql_error());

header("Location: mainframe.php?module=control_$tabla&code=2");
?>