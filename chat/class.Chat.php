<?php
/****
File name : class.Chat.php
Description : Class for create simple chat.
Author : Petr Rezac
Date : 12th May 2010
Version : 1.0
Copyright (c) 2010 PR-Software <prezac@pr-software.net>
****/
class Chat{
 var $userName;    // input data
 var $colores;
 function createChat($username,$colores){ 	 
 if ($username=="")  { echo 'Error, direccion incorrecta'; die(); }
  print "<script type=\"text/javascript\"> 
function send(){

    document.getElementById('chatop').value = 'insert';
    ajax();
    document.getElementById('chattext').value = '';
    document.getElementById('chattext').focus();
    document.getElementById('chatbox').scrollTop = 9999999;
}

function ajax() {
  document.getElementById('chatbox').innerHTML = 'Favor de actualizar la pantalla';
  var chat = (window.XMLHttpRequest ? new XMLHttpRequest() : (window.ActiveXObject ? new ActiveXObject(\"Microsoft.XMLHTTP\") : false));
  if(!chat){
    ret='Favor de Actualizar esta pantalla';
  }else{
    chat.open(\"POST\", \"chat.php\", false);
    chat.setRequestHeader(\"Content-Type\", \"application/x-www-form-urlencoded\");
    chat.send(\"color=\"+document.getElementById('chatcolor').value+\"&name=\"+document.getElementById('chatname').value+\"&text=\"+document.getElementById('chattext').value+\"&op=\"+document.getElementById('chatop').value);
    if (chat.readyState == 4){ //has been respond
   	if(chat.status == 200 || chat.status==0){
     ret=chat.responseText;
   	}else{
	   ret=\"Favor de Actualizar esta pantalla\";
  	}
   }
  }
  document.getElementById('chatbox').innerHTML = ret;
  document.getElementById('chatop').value = 'refresh';
  document.getElementById('chatbox').scrollTop = 9999999;
  setTimeout(\"ajax()\", 20000);
}

window.onload=function(){ 
  setTimeout(\"ajax()\", 1000); 
}
</script>";
  print "<div class=\"boty\">
<div class=\"top\"><div class=\"\"></div></div>
"; 
  print "<div class=\"container\" id=\"chatbox\" name=\"chatbox\"></div>";
  print "<input type=\"hidden\" name=\"chatop\" id=\"chatop\" value=\"refresh\">"; 
  print "<input title=\"Name\" type=\"hidden\" name=\"chatname\" id=\"chatname\" value=\"$username\">";
  print "<input type=\"hidden\" name=\"chatcolor\" id=\"chatcolor\" value=\"$colores\">";
  print "<div class=\"sender\"><input class=\"textbox\" type=\"text\" name=\"chattext\" id=\"chattext\" class=\"inpux\"><input class=\"myButton\" title=\"Enviar\" type=\"button\" value=\"Enviar\" onclick=\"send();\"></div></div>";
  }
}
?>
