<?php

header( 'Server: Centos' ) ;
header( 'X-Build: 15.6' ) ;
?><html>
<head>
<title>Server</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<div id="datos"></div>
</body>
<script>
function actualiza()
{
	url = "/api" ;
	params = {} ;
	$.post( url , params , function( data ) {
		html = "" ;
		obj = jQuery.parseJSON( data ) ; 
		html += "<h3>PADRE</h3>";
		html += "ID: " + obj.Padre.ID + "<br/>";
		html += "Transform: <br/><ul><li> X:" + obj.Padre.Transform.X + "</li>";
		html += "<li>Y:" + obj.Padre.Transform.Y + "</li>";
		html += "<li>Z:" + obj.Padre.Transform.Z + "</li></ul>";
		html += "<h3>HIJOS</h3>";
		html += "<ul>";
		$.each( obj.Hijos , function( index, value ) {
			html += "<li><h4>" + value.ID + "</h4>";
			html += "Transform: <br/><ul><li> X:" + value.Transform.X + "</li>";
			html += "<li>Y:" + value.Transform.Y + "</li>";
			html += "<li>Z:" + value.Transform.Z + "</li></ul>";
			html += "Movil: " + value.Movil + "<br/>";
			html += "Animacion: " + value.Animacion + "<br/>";
			
		});
		html += "</ul>";
		$( "#datos" ).html( html ) ;
	});
}
window.setInterval(function(){
	actualiza() ;
}, 500);
</script>
</html>