function confirmUpdate(delUrl,name_cat) { 
if (confirm("Se dar&aacute;de alta el veh&iacute;culo con los siguientes datos:\n Marca: "  + document.frm.marca.value +"¿Est&aacute; seguro de continuar?\n")) { 
document.location = delUrl; 
}
}
